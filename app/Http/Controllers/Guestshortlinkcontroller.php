<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use App\Models\GuestRateLimit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GuestShortlinkController extends Controller
{
    const DAILY_LIMIT  = 3;
    const EXPIRED_DAYS = 30;
    const CODE_LENGTH  = 6;

    /**
     * Ambil fingerprint dari request (body atau header).
     * Validasi format hex 64 char.
     */
    private function extractFp(Request $request): ?string
    {
        $fp = $request->input('fingerprint')
           ?: $request->header('X-Fingerprint');

        if ($fp && preg_match('/^[a-f0-9]{64}$/', $fp)) {
            return $fp;
        }
        return null;
    }

    /**
     * Cari atau buat record rate limit dengan prioritas:
     *   1. Fingerprint dulu (spesifik per device/browser)
     *   2. IP saja jika fingerprint tidak ada (fallback)
     *   3. Buat baru jika tidak ada yang cocok
     */
    private function resolveRateLimit(string $ip, ?string $fpHash, string $date): GuestRateLimit
    {
        // 1. Prioritas fingerprint
        if ($fpHash) {
            $byFp = GuestRateLimit::where('fingerprint_hash', $fpHash)
                ->where('date', $date)
                ->first();
            if ($byFp) return $byFp;
        }

        // 2. Fallback IP (hanya untuk record tanpa fingerprint)
        $byIp = GuestRateLimit::where('ip', $ip)
            ->where('fingerprint_hash', '')
            ->where('date', $date)
            ->first();
        if ($byIp) return $byIp;

        // 3. Buat record baru
        return GuestRateLimit::create([
            'ip'               => $ip,
            'fingerprint_hash' => $fpHash ?? '',
            'date'             => $date,
            'count'            => 0,
        ]);
    }

    /**
     * POST /api/guest/shorten
     */
    public function store(Request $request)
    {
        $request->validate([
            'url'         => ['required', 'url', 'max:2048'],
            'fingerprint' => ['nullable', 'string', 'max:64'],
        ]);

        $ip     = $request->ip();
        $date   = now()->toDateString();
        $fpHash = $this->extractFp($request);

        // ── Cek rate limit ──────────────────────────────────────────
        $rateLimit = $this->resolveRateLimit($ip, $fpHash, $date);

        if ($rateLimit->count >= self::DAILY_LIMIT) {
            return response()->json([
                'status'    => 'error',
                'message'   => 'Batas pembuatan shortlink hari ini telah tercapai (maks ' . self::DAILY_LIMIT . '/hari). Coba lagi besok.',
                'limit'     => self::DAILY_LIMIT,
                'used'      => $rateLimit->count,
                'remaining' => 0,
            ], 429);
        }

        // ── Generate kode unik ──────────────────────────────────────
        do {
            $code = Str::lower(Str::random(self::CODE_LENGTH));
        } while (ShortUrl::where('short_url', $code)->exists());

        // ── Simpan shortlink (sertakan guest_fp) ───────────────────
        $shortUrl = ShortUrl::create([
            'original_url' => $request->url,
            'short_url'    => $code,
            'npp'          => null,
            'is_guest'     => true,
            'guest_ip'     => $ip,
            'guest_fp'     => $fpHash,         // <-- simpan fingerprint
            'expired_at'   => now()->addDays(self::EXPIRED_DAYS),
            'visits'       => 0,
            'visits_link'  => 0,
            'visits_qr'    => 0,
        ]);

        // ── Increment kuota ─────────────────────────────────────────
        $rateLimit->increment('count');
        // Update IP terbaru jika user ganti VPN
        if ($fpHash && $rateLimit->ip !== $ip) {
            $rateLimit->update(['ip' => $ip]);
        }

        $used      = $rateLimit->count;
        $remaining = max(0, self::DAILY_LIMIT - $used);

        return response()->json([
            'status'  => 'success',
            'message' => 'ShortLink berhasil dibuat.',
            'data'    => [
                'id'           => $shortUrl->id,
                'original_url' => $shortUrl->original_url,
                'short_url'    => url($code),
                'short_code'   => $code,
                'expired_at'   => $shortUrl->expired_at->format('d/m/Y'),
                'expired_days' => self::EXPIRED_DAYS,
            ],
            'limit'     => self::DAILY_LIMIT,
            'used'      => $used,
            'remaining' => $remaining,
        ]);
    }

    /**
     * GET /api/guest/my-links
     *
     * Query prioritas:
     *   1. Fingerprint ada → ambil semua shortlink dengan guest_fp ini
     *      (tidak peduli IP — tetap muncul meski ganti VPN)
     *   2. Fingerprint tidak ada → fallback ke IP
     *      (untuk browser lama / JS disabled)
     *
     * Ini memastikan:
     *   - Ganti VPN → shortlink tetap muncul
     *   - 2 orang satu WiFi → hanya lihat shortlink sendiri
     */
    public function myLinks(Request $request)
    {
        $ip     = $request->ip();
        $fpHash = $this->extractFp($request);

        $query = ShortUrl::where('is_guest', true)
            ->where(function($q) {
                $q->whereNull('expired_at')
                  ->orWhere('expired_at', '>', now());
            })
            ->orderBy('created_at', 'desc');

        if ($fpHash) {
            // Prioritas: query by fingerprint (akurat, VPN-proof)
            $query->where('guest_fp', $fpHash);
        } else {
            // Fallback: query by IP (untuk record lama tanpa fingerprint)
            $query->where('guest_ip', $ip)
                  ->whereNull('guest_fp');
        }

        $links = $query->get()->map(fn($item) => [
            'id'           => $item->id,
            'original_url' => $item->original_url,
            'short_url'    => url($item->short_url),
            'short_code'   => $item->short_url,
            'visits'       => (int) ($item->visits ?? 0),
            'created_at'   => $item->created_at->format('d/m/Y H:i'),
            'expired_at'   => $item->expired_at?->format('d/m/Y') ?? '-',
            'days_left'    => $item->expired_at
                                ? max(0, (int) now()->diffInDays($item->expired_at, false))
                                : null,
        ]);

        // Sisa kuota hari ini
        $today     = now()->toDateString();
        $rateLimit = $this->resolveRateLimit($ip, $fpHash, $today);
        $used      = $rateLimit->count;
        $remaining = max(0, self::DAILY_LIMIT - $used);

        return response()->json([
            'status' => 'success',
            'data'   => $links,
            'quota'  => [
                'limit'     => self::DAILY_LIMIT,
                'used'      => $used,
                'remaining' => $remaining,
            ],
        ]);
    }
}
