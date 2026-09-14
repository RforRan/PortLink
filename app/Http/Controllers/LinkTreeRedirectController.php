<?php

namespace App\Http\Controllers;

use App\Models\LinkTree;
use App\Models\LinkTreeItem;
use App\Models\LinkTreeVisit;
use Illuminate\Http\Request;

class LinkTreeRedirectController extends Controller
{
    /**
     * GET /lt/{kode}
     * Tampilkan halaman pilihan link tree (kunjungan via URL langsung).
     */
    public function show(string $kode)
    {
        $tree = LinkTree::where('kode', $kode)
            ->with(['items' => fn($q) => $q->orderBy('urutan')])
            ->first();

        if (!$tree) return redirect()->to(url('/'));

        // Catat kunjungan halaman induk (item_id = null)
        $tree->increment('visits');
        $tree->increment('visits_link');

        LinkTreeVisit::create([
            'link_tree_id' => $tree->id,
            'item_id'      => null,
            'is_qr'        => false,
            'visitor_hash' => $this->visitorHash(request()),
            'visited_at'   => now(),
        ]);

        return view('lt-page', compact('tree'));
    }

    /**
     * GET /lt/{kode}/qr
     * Tampilkan halaman pilihan link tree (kunjungan via scan QR).
     */
    public function showQr(string $kode)
    {
        $tree = LinkTree::where('kode', $kode)
            ->with(['items' => fn($q) => $q->orderBy('urutan')])
            ->first();

        if (!$tree) return redirect()->to(url('/'));

        // Catat kunjungan halaman induk via QR
        $tree->increment('visits');
        $tree->increment('visits_qr');

        LinkTreeVisit::create([
            'link_tree_id' => $tree->id,
            'item_id'      => null,
            'is_qr'        => true,
            'visitor_hash' => $this->visitorHash(request()),
            'visited_at'   => now(),
        ]);

        return view('lt-page', compact('tree'));
    }

    /**
     * GET /lt/{kode}/go/{itemId}
     * Redirect ke URL sub link + catat klik.
     *
     * Menggunakan redirect terpisah (bukan langsung dari halaman)
     * agar klik tercatat meski user punya adblocker yang memblokir
     * fetch/beacon dari frontend.
     */
    public function go(string $kode, int $itemId)
    {
        $tree = LinkTree::where('kode', $kode)->first();

        if (!$tree) return redirect()->to(url('/'));

        $item = LinkTreeItem::where('id', $itemId)
            ->where('link_tree_id', $tree->id)
            ->first();

        if (!$item) return redirect()->to(url('lt/' . $kode));

        // Catat klik sub link (item_id diisi, is_qr selalu false)
        $item->increment('visits');

        LinkTreeVisit::create([
            'link_tree_id' => $tree->id,
            'item_id'      => $item->id,
            'is_qr'        => false,
            'visitor_hash' => $this->visitorHash(request()),
            'visited_at'   => now(),
        ]);

        return redirect()->to($item->url);
    }

    /**
     * Hash unik visitor dari IP + User-Agent.
     * Konsisten dengan ShortUrlController — tidak menyimpan data mentah.
     */
    private function visitorHash(Request $request): string
    {
        return hash('sha256',
            $request->ip() . '|' . $request->userAgent()
        );
    }
}
