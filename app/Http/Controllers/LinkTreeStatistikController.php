<?php

namespace App\Http\Controllers;

use App\Models\LinkTree;
use App\Models\LinkTreeVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class LinkTreeStatistikController extends Controller
{
    /**
     * GET /api/statistik/linktree?npp=xxx&range=day&linktree_id=all
     *
     * Mode overview  (linktree_id=all) : grafik semua link tree + rank induk
     * Mode detail    (linktree_id=123) : grafik satu link tree + rank sub link
     */
    public function data(Request $request)
    {
        Carbon::setLocale('id');

        $npp        = $request->query('npp');
        $range      = $request->query('range', 'day');
        $linktreeId = $request->query('linktree_id', 'all');

        if (!$npp) {
            return response()->json(['status' => 'error', 'message' => 'NPP tidak ditemukan'], 400);
        }

        // Ambil semua link tree milik user
        $ownedTrees = LinkTree::where('npp', $npp)
            ->select('id', 'kode', 'judul', 'visits', 'visits_link', 'visits_qr')
            ->get()
            ->keyBy('id');

        if ($ownedTrees->isEmpty()) {
            return response()->json($this->emptyResponse());
        }

        $ownedIds = $ownedTrees->keys();

        // Tentukan ID yang difilter
        $isDetail  = $linktreeId !== 'all' && is_numeric($linktreeId) && $ownedTrees->has((int) $linktreeId);
        $filterIds = $isDetail ? collect([(int) $linktreeId]) : $ownedIds;

        [$start, $stepMinutes, $labelFn] = $this->rangeConfig($range);
        $stepSeconds = $stepMinutes * 60;
        $startStr    = $start->toDateTimeString();
        $baseUrl     = rtrim(config('app.url'), '/');

        // ── Query grafik: hanya kunjungan halaman induk (item_id IS NULL) ──
        // Grafik menampilkan page views (buka halaman), bukan klik sub link
        $slotRows = LinkTreeVisit::whereIn('link_tree_id', $filterIds)
            ->whereNull('item_id') // hanya kunjungan halaman
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

        $now     = Carbon::now('Asia/Jakarta');
        $startTs = (int)(floor($start->timestamp / $stepSeconds) * $stepSeconds);
        $nowTs   = $now->timestamp;

        for ($ts = $startTs; $ts <= $nowTs; $ts += $stepSeconds) {
            $slot             = Carbon::createFromTimestamp($ts, 'Asia/Jakarta');
            $row              = $slotRows[$ts] ?? null;
            $labels[]         = $labelFn($slot);
            $visitsLink[]     = (int) ($row->visits_link ?? 0);
            $visitsQr[]       = (int) ($row->visits_qr   ?? 0);
            $uniqueVisitors[] = (int) ($row->unique_count ?? 0);
        }

        // Summary unique yang akurat (distinct dalam seluruh range)
        $summaryUnique = LinkTreeVisit::whereIn('link_tree_id', $filterIds)
            ->whereNull('item_id')
            ->where('visited_at', '>=', $startStr)
            ->whereNotNull('visitor_hash')
            ->distinct('visitor_hash')
            ->count('visitor_hash');

        // ── Summary klik keluar dalam range ──────────────────────────────
        $summaryClicks = LinkTreeVisit::whereIn('link_tree_id', $filterIds)
            ->whereNotNull('item_id')
            ->where('visited_at', '>=', $startStr)
            ->count();

        // ── Summary page views dalam range ───────────────────────────────
        $summaryPageViews = LinkTreeVisit::whereIn('link_tree_id', $filterIds)
            ->whereNull('item_id')
            ->where('visited_at', '>=', $startStr)
            ->count();

        // CTR dalam range yang dipilih
        $summaryCtr = $summaryPageViews > 0
            ? round(($summaryClicks / $summaryPageViews) * 100, 2)
            : 0.0;

        // ── Rank: berbeda antara overview dan detail ──────────────────────
        if ($isDetail) {
            $rank = $this->rankItems((int) $linktreeId, $startStr, $baseUrl, $ownedTrees);
        } else {
            $rank = $this->rankTrees($ownedIds, $ownedTrees, $startStr, $baseUrl);
        }

        return response()->json([
            'status'            => 'success',
            'mode'              => $isDetail ? 'detail' : 'overview',
            'linktree_id'       => $isDetail ? (int) $linktreeId : null,
            'linktree_judul'    => $isDetail ? $ownedTrees->get((int) $linktreeId)?->judul : null,
            'labels'            => $labels,
            'visits_link'       => $visitsLink,
            'visits_qr'         => $visitsQr,
            'unique_visitors'   => $uniqueVisitors,
            'summary_unique'    => $summaryUnique,
            'summary_clicks'    => $summaryClicks,
            'summary_pageviews' => $summaryPageViews,
            'summary_ctr'       => $summaryCtr,
            'rank'              => $rank,
            // Daftar semua link tree untuk dropdown
            'linktrees'         => $ownedTrees->values()->map(fn($t) => [
                'id'    => $t->id,
                'judul' => $t->judul,
                'kode'  => $t->kode,
            ]),
        ]);
    }

    // ── Private helpers ───────────────────────────────────────────

    /**
     * Rank semua link tree (mode overview).
     * Menampilkan page views, klik keluar, unique visitor, dan CTR
     * masing-masing link tree dalam range waktu yang dipilih.
     */
    private function rankTrees($ownedIds, $ownedTrees, string $startStr, string $baseUrl): array
    {
        // Satu query untuk page views + qr per link tree
        $pageViewData = LinkTreeVisit::whereIn('link_tree_id', $ownedIds)
            ->whereNull('item_id')
            ->where('visited_at', '>=', $startStr)
            ->select(
                'link_tree_id',
                DB::raw('SUM(CASE WHEN is_qr = 0 THEN 1 ELSE 0 END) as visits_link'),
                DB::raw('SUM(CASE WHEN is_qr = 1 THEN 1 ELSE 0 END) as visits_qr'),
                DB::raw('COUNT(*) as page_views'),
                DB::raw('COUNT(DISTINCT visitor_hash) as unique_visitors')
            )
            ->groupBy('link_tree_id')
            ->get()
            ->keyBy('link_tree_id');

        // Satu query untuk total klik keluar per link tree
        $clickData = LinkTreeVisit::whereIn('link_tree_id', $ownedIds)
            ->whereNotNull('item_id')
            ->where('visited_at', '>=', $startStr)
            ->select('link_tree_id', DB::raw('COUNT(*) as total_clicks'))
            ->groupBy('link_tree_id')
            ->get()
            ->keyBy('link_tree_id');

        return $ownedTrees->map(function ($tree) use ($pageViewData, $clickData, $baseUrl) {
            $pv     = $pageViewData->get($tree->id);
            $cl     = $clickData->get($tree->id);
            $views  = (int) ($pv->page_views   ?? 0);
            $clicks = (int) ($cl->total_clicks  ?? 0);
            $ctr    = $views > 0 ? round(($clicks / $views) * 100, 2) : 0.0;

            return [
                'id'              => $tree->id,
                'judul'           => $tree->judul,
                'public_url'      => $baseUrl . '/lt/' . $tree->kode,
                'page_views'      => $views,
                'visits_link'     => (int) ($pv->visits_link    ?? 0),
                'visits_qr'       => (int) ($pv->visits_qr      ?? 0),
                'total_clicks'    => $clicks,
                'unique_visitors' => (int) ($pv->unique_visitors ?? 0),
                'ctr'             => $ctr,
            ];
        })
        ->filter(fn($t) => $t['page_views'] > 0)
        ->sortByDesc('page_views')
        ->values()
        ->toArray();
    }

    /**
     * Rank sub link dari satu link tree (mode detail).
     * Menampilkan jumlah klik dan persentase per item.
     */
    private function rankItems(int $linktreeId, string $startStr, string $baseUrl, $ownedTrees): array
    {
        $tree = $ownedTrees->get($linktreeId);

        // Klik per item dalam range waktu
        $clickData = LinkTreeVisit::where('link_tree_id', $linktreeId)
            ->whereNotNull('item_id')
            ->where('visited_at', '>=', $startStr)
            ->select('item_id', DB::raw('COUNT(*) as clicks'))
            ->groupBy('item_id')
            ->get()
            ->keyBy('item_id');

        $totalClicks = $clickData->sum('clicks');

        // Ambil semua items (termasuk yang belum pernah diklik dalam range)
        $items = \App\Models\LinkTreeItem::where('link_tree_id', $linktreeId)
            ->orderBy('urutan')
            ->get()
            ->map(function ($item) use ($clickData, $totalClicks, $baseUrl, $tree) {
                $clicks     = (int) ($clickData->get($item->id)?->clicks ?? 0);
                $percentage = $totalClicks > 0
                    ? round(($clicks / $totalClicks) * 100, 2)
                    : 0.0;

                return [
                    'id'          => $item->id,
                    'label'       => $item->label,
                    'url'         => $item->url,
                    'redirect_url'=> $baseUrl . '/lt/' . $tree->kode . '/go/' . $item->id,
                    'clicks'      => $clicks,
                    'percentage'  => $percentage,
                ];
            })
            ->sortByDesc('clicks')
            ->values()
            ->toArray();

        return $items;
    }

    /**
     * Response kosong saat user belum punya link tree.
     */
    private function emptyResponse(): array
    {
        return [
            'status'            => 'success',
            'mode'              => 'overview',
            'linktree_id'       => null,
            'linktree_judul'    => null,
            'labels'            => [],
            'visits_link'       => [],
            'visits_qr'         => [],
            'unique_visitors'   => [],
            'summary_unique'    => 0,
            'summary_clicks'    => 0,
            'summary_pageviews' => 0,
            'summary_ctr'       => 0.0,
            'rank'              => [],
            'linktrees'         => [],
        ];
    }

    /**
     * Konfigurasi range waktu — identik dengan StatistikController
     * agar UI bisa pakai komponen yang sama.
     */
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
