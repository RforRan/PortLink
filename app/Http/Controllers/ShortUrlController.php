<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use App\Models\Visit;
use Illuminate\Http\Request;

class ShortUrlController extends Controller
{
    /**
     * Redirect shortlink (klik biasa via link).
     */
    public function show(string $code)
    {
        $shortUrl = ShortUrl::where('short_url', $code)->first();

        if (!$shortUrl) return redirect()->to(url('/'));

        if ($shortUrl->expired_at && $shortUrl->expired_at->isPast()) {
            return redirect()->to(url('/'));
        }

        $shortUrl->increment('visits');
        $shortUrl->increment('visits_link');

        Visit::create([
            'short_url_id'  => $shortUrl->id,
            'is_qr'         => false,
            'visitor_hash'  => $this->visitorHash(request()),
            'visited_at'    => now(),
        ]);

        return redirect()->to($shortUrl->original_url);
    }

    /**
     * Redirect shortlink via QR Code scan.
     */
    public function showQr(string $code)
    {
        $shortUrl = ShortUrl::where('short_url', $code)->first();

        if (!$shortUrl) return redirect()->to(url('/'));

        if ($shortUrl->expired_at && $shortUrl->expired_at->isPast()) {
            return redirect()->to(url('/'));
        }

        $shortUrl->increment('visits');
        $shortUrl->increment('visits_qr');

        Visit::create([
            'short_url_id'  => $shortUrl->id,
            'is_qr'         => true,
            'visitor_hash'  => $this->visitorHash(request()),
            'visited_at'    => now(),
        ]);

        return redirect()->to($shortUrl->original_url);
    }

    /**
     * Buat hash unik visitor dari IP + User-Agent.
     * Tidak menyimpan data mentah — hanya hash SHA-256.
     */
    private function visitorHash(Request $request): string
    {
        return hash('sha256',
            $request->ip() . '|' . $request->userAgent()
        );
    }
}
