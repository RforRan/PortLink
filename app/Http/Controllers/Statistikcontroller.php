<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    public function index()
    {
        return view('statistik');
    }

    /**
     * GET /api/statistik?npp=xxx&range=day&shortlink_id=all
     */
    public function data(Request $request)
    {
        Carbon::setLocale('id');

        $npp         = $request->query('npp');
        $range       = $request->query('range', 'day');
        $shortlinkId = $request->query('shortlink_id', 'all');

        if (!$npp) {
            return response()->json(['status' => 'error', 'message' => 'NPP tidak ditemukan'], 400);
        }

        // Query 1: ambil shortlink milik user (pluck ringan)
        $ownedIds = ShortUrl::where('npp', $npp)->pluck('id');

        if ($ownedIds->isEmpty()) {
            return response()->json([
                'status'          => 'success',
                'labels'          => [],
                'visits_link'     => [],
                'visits_qr'       => [],
                'unique_visitors' => [],
                'shortlinks'      => [],
                'summary_unique'  => 0,
            ]);
        }

        $ids = ($shortlinkId !== 'all' && is_numeric($shortlinkId))
            ? collect([$shortlinkId])->intersect($ownedIds)
            : $ownedIds;

        [$start, $stepMinutes, $labelFn] = $this->rangeConfig($range);
        $stepSeconds = $stepMinutes * 60;
        $startStr    = $start->toDateTimeString();

        // ── Query 2: SATU query untuk semua data slot (link + qr + unique) ──
        // Gabungkan $rows dan $uniqueRows jadi satu query
        $slotRows = Visit::whereIn('short_url_id', $ids)
            ->where('visited_at', '>=', $startStr)
            ->select(
                DB::raw("FROM_UNIXTIME(FLOOR(UNIX_TIMESTAMP(visited_at) / {$stepSeconds}) * {$stepSeconds}) as slot"),
                DB::raw('SUM(CASE WHEN is_qr = 0 THEN 1 ELSE 0 END) as visits_link'),
                DB::raw('SUM(CASE WHEN is_qr = 1 THEN 1 ELSE 0 END) as visits_qr'),
                DB::raw('COUNT(DISTINCT visitor_hash) as unique_count')
            )
            ->groupBy('slot')
            ->orderBy('slot')
            ->get()
            ->keyBy(fn($r) => Carbon::parse($r->slot)->timestamp);

        // ── Generate slot labels ──────────────────────────────────────────
        $labels         = [];
        $visitsLink     = [];
        $visitsQr       = [];
        $uniqueVisitors = [];
        $summaryUnique  = 0;

        $now     = Carbon::now('Asia/Jakarta');
        $startTs = (int)(floor($start->timestamp / $stepSeconds) * $stepSeconds);
        $nowTs   = $now->timestamp;

        for ($ts = $startTs; $ts <= $nowTs; $ts += $stepSeconds) {
            $slot           = Carbon::createFromTimestamp($ts, 'Asia/Jakarta');
            $row            = $slotRows[$ts] ?? null;
            $labels[]       = $labelFn($slot);
            $visitsLink[]   = (int) ($row->visits_link  ?? 0);
            $visitsQr[]     = (int) ($row->visits_qr    ?? 0);
            $uCount         = (int) ($row->unique_count ?? 0);
            $uniqueVisitors[] = $uCount;
            $summaryUnique  += $uCount; // approx (over-counts repeat visitors across slots)
        }

        // Summary unique yang benar: distinct dalam seluruh range (satu query kecil)
        $summaryUnique = Visit::whereIn('short_url_id', $ids)
            ->where('visited_at', '>=', $startStr)
            ->whereNotNull('visitor_hash')
            ->distinct('visitor_hash')
            ->count('visitor_hash');

        // ── Query 3: rank per shortlink (SATU query, gabung link+qr+unique) ──
        $rankData = Visit::whereIn('short_url_id', $ownedIds)
            ->where('visited_at', '>=', $startStr)
            ->select(
                'short_url_id',
                DB::raw('SUM(CASE WHEN is_qr = 0 THEN 1 ELSE 0 END) as visits_link'),
                DB::raw('SUM(CASE WHEN is_qr = 1 THEN 1 ELSE 0 END) as visits_qr'),
                DB::raw('COUNT(*) as visits'),
                DB::raw('COUNT(DISTINCT visitor_hash) as unique_visitors')
            )
            ->groupBy('short_url_id')
            ->get()
            ->keyBy('short_url_id');

        // Query 4: shortlink metadata — ambil sekali, pakai base URL statis
        $baseUrl = rtrim(config('app.url'), '/');

        $shortlinks = ShortUrl::whereIn('id', $ownedIds)
            ->select('id', 'short_url', 'original_url')
            ->get()
            ->map(function($s) use ($rankData, $baseUrl) {
                $rank = $rankData->get($s->id);
                return [
                    'id'              => $s->id,
                    'short_url'       => $baseUrl . '/' . $s->short_url,  // hindari url() di loop
                    'original_url'    => $s->original_url,
                    'visits'          => (int) ($rank->visits          ?? 0),
                    'visits_link'     => (int) ($rank->visits_link     ?? 0),
                    'visits_qr'       => (int) ($rank->visits_qr       ?? 0),
                    'unique_visitors' => (int) ($rank->unique_visitors  ?? 0),
                ];
            })
            ->filter(fn($s) => $s['visits'] > 0)
            ->sortByDesc('visits')
            ->values();

        return response()->json([
            'status'          => 'success',
            'labels'          => $labels,
            'visits_link'     => $visitsLink,
            'visits_qr'       => $visitsQr,
            'unique_visitors' => $uniqueVisitors,
            'summary_unique'  => $summaryUnique,
            'shortlinks'      => $shortlinks,
        ]);
    }

    private function rangeConfig(string $range): array
    {
        $now = Carbon::now('Asia/Jakarta');

        return match ($range) {
            '3hour'  => [$now->copy()->subHours(3),   10,   fn($d) => $d->format('H:i')],
            'day'    => [$now->copy()->subDay(),       60,   fn($d) => $d->format('H:00')],
            '3day'   => [$now->copy()->subDays(3),     180,  fn($d) => $d->format('d/m H:00')],
            'week'   => [$now->copy()->subWeek(),      1440, fn($d) => $d->format('D d/m')],
            'month'  => [$now->copy()->subMonth(),     1440, fn($d) => $d->format('d/m')],
            '3month' => [$now->copy()->subMonths(3),   4320, fn($d) => $d->format('d/m')],
            default  => [$now->copy()->subDay(),       60,   fn($d) => $d->format('H:00')],
        };
    }
}
