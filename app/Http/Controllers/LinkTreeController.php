<?php

namespace App\Http\Controllers;

use App\Models\LinkTree;
use App\Models\LinkTreeItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LinkTreeController extends Controller
{
    // ── Blade pages ──────────────────────────────────────────────

    public function index()
    {
        return view('linktree');
    }

    // ── API: Data list ───────────────────────────────────────────

    /**
     * GET /api/linktree/data?npp=xxx
     * Ambil semua link tree milik user beserta items dan CTR.
     */
    public function data(Request $request)
    {
        $npp = $request->query('npp');

        if (!$npp) {
            return response()->json([
                'status'  => 'error',
                'message' => 'NPP tidak ditemukan',
            ], 400);
        }

        $trees = LinkTree::where('npp', $npp)
            ->with(['items' => fn($q) => $q->orderBy('urutan')])
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(fn($tree) => $this->formatTree($tree));

        return response()->json([
            'status' => 'success',
            'data'   => $trees,
        ]);
    }

    // ── API: CRUD ────────────────────────────────────────────────

    /**
     * POST /api/linktree
     * Buat link tree baru beserta items-nya dalam satu transaksi.
     */
    public function store(Request $request)
    {
        $request->validate([
            'npp'           => ['required', 'string'],
            'judul'         => ['required', 'string', 'max:100'],
            'deskripsi'     => ['nullable', 'string', 'max:500'],
            'kode'          => ['nullable', 'string', 'max:50', 'regex:/^[a-zA-Z0-9\-_]+$/'],
            'tema_warna'    => ['nullable', 'string', 'regex:/^#[0-9a-fA-F]{6}$/'],
            'items'         => ['required', 'array', 'min:1'],
            'items.*.label' => ['required', 'string', 'max:100'],
            'items.*.url'   => ['required', 'url', 'max:2048'],
        ], [
            'judul.required'         => 'Judul tidak boleh kosong.',
            'kode.regex'             => 'Kode hanya boleh berisi huruf, angka, - dan _.',
            'tema_warna.regex'       => 'Format warna tidak valid (contoh: #1c6b3a).',
            'items.required'         => 'Link tree harus memiliki minimal 1 link.',
            'items.min'              => 'Link tree harus memiliki minimal 1 link.',
            'items.*.label.required' => 'Label link tidak boleh kosong.',
            'items.*.url.required'   => 'URL link tidak boleh kosong.',
            'items.*.url.url'        => 'Format URL link tidak valid.',
        ]);

        // Cek kode custom sudah dipakai
        if ($request->kode && LinkTree::where('kode', $request->kode)->exists()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Kode link tree sudah digunakan. Pilih kode lain.',
            ], 422);
        }

        // Buat link tree + items dalam satu transaksi
        $tree = DB::transaction(function () use ($request) {
            // Generate kode: custom atau random 6 char
            $kode = $request->kode ?: $this->generateKode();

            $tree = LinkTree::create([
                'npp'        => $request->npp,
                'kode'       => $kode,
                'judul'      => $request->judul,
                'deskripsi'  => $request->deskripsi ?? null,
                'tema_warna' => $request->tema_warna ?? '#1c6b3a',
            ]);

            // Buat items dengan urutan sesuai index array
            foreach ($request->items as $i => $item) {
                LinkTreeItem::create([
                    'link_tree_id' => $tree->id,
                    'label'        => $item['label'],
                    'url'          => $item['url'],
                    'urutan'       => $i,
                ]);
            }

            return $tree->load('items');
        });

        return response()->json([
            'status'  => 'success',
            'message' => 'Link tree berhasil dibuat.',
            'data'    => $this->formatTree($tree),
        ], 201);
    }

    /**
     * PUT /api/linktree/{id}
     * Update link tree dan replace semua items-nya.
     *
     * Items lama dihapus dan dibuat ulang — lebih simpel daripada
     * diff per item, dan kunjungan lama tetap aman karena
     * link_tree_visits.item_id pakai nullOnDelete.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'         => ['required', 'string', 'max:100'],
            'deskripsi'     => ['nullable', 'string', 'max:500'],
            'kode'          => ['required', 'string', 'max:50', 'regex:/^[a-zA-Z0-9\-_]+$/'],
            'tema_warna'    => ['nullable', 'string', 'regex:/^#[0-9a-fA-F]{6}$/'],
            'items'         => ['required', 'array', 'min:1'],
            'items.*.label' => ['required', 'string', 'max:100'],
            'items.*.url'   => ['required', 'url', 'max:2048'],
        ], [
            'judul.required'         => 'Judul tidak boleh kosong.',
            'kode.required'          => 'Kode tidak boleh kosong.',
            'kode.regex'             => 'Kode hanya boleh berisi huruf, angka, - dan _.',
            'tema_warna.regex'       => 'Format warna tidak valid (contoh: #1c6b3a).',
            'items.required'         => 'Link tree harus memiliki minimal 1 link.',
            'items.min'              => 'Link tree harus memiliki minimal 1 link.',
            'items.*.label.required' => 'Label link tidak boleh kosong.',
            'items.*.url.required'   => 'URL link tidak boleh kosong.',
            'items.*.url.url'        => 'Format URL link tidak valid.',
        ]);

        $tree = LinkTree::findOrFail($id);

        // Cek kode bentrok dengan link tree lain
        if (LinkTree::where('kode', $request->kode)->where('id', '!=', $id)->exists()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Kode link tree sudah digunakan. Silakan pilih kode lain.',
            ], 422);
        }

        DB::transaction(function () use ($request, $tree) {
            $tree->update([
                'judul'      => $request->judul,
                'deskripsi'  => $request->deskripsi ?? null,
                'kode'       => $request->kode,
                'tema_warna' => $request->tema_warna ?? $tree->tema_warna,
            ]);

            // Hapus items lama dan buat ulang
            // (nullOnDelete di link_tree_visits menjaga history kunjungan)
            $tree->items()->delete();

            foreach ($request->items as $i => $item) {
                LinkTreeItem::create([
                    'link_tree_id' => $tree->id,
                    'label'        => $item['label'],
                    'url'          => $item['url'],
                    'urutan'       => $i,
                ]);
            }
        });

        return response()->json([
            'status'  => 'success',
            'message' => 'Link tree berhasil diperbarui.',
            'data'    => $this->formatTree($tree->fresh('items')),
        ]);
    }

    /**
     * POST /api/linktree/{id}/foto
     * Terima base64 string, validasi format & ukuran, simpan ke DB.
     */
    public function uploadFoto(Request $request, $id)
    {
        $request->validate(['foto' => ['required', 'string']]);

        $tree   = LinkTree::findOrFail($id);
        $base64 = $request->foto;

        if (!preg_match('/^data:image\/(jpeg|jpg|png|webp);base64,/', $base64)) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Format tidak valid. Gunakan JPEG, PNG, atau WebP.',
            ], 422);
        }

        // 3 MB file → ~4.1 MB base64
        if (strlen($base64) > 4_200_000) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Ukuran foto terlalu besar. Maksimal 3 MB.',
            ], 422);
        }

        $tree->update(['foto' => $base64]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Foto berhasil diperbarui.',
            'data'    => ['foto_url' => $base64],
        ]);
    }

    /**
     * DELETE /api/linktree/{id}/foto
     */
    public function deleteFoto($id)
    {
        $tree = LinkTree::findOrFail($id);
        $tree->update(['foto' => null]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Foto berhasil dihapus.',
        ]);
    }

    /**
     * DELETE /api/linktree/{id}
     */
    public function destroy($id)
    {
        $tree = LinkTree::findOrFail($id);
        $tree->delete(); // cascadeOnDelete → items + visits ikut terhapus

        return response()->json([
            'status'  => 'success',
            'message' => 'Link tree berhasil dihapus.',
        ]);
    }

    // ── Helpers ──────────────────────────────────────────────────

    /**
     * Format data link tree untuk response JSON.
     */
    private function formatTree(LinkTree $tree): array
    {
        $baseUrl     = rtrim(config('app.url'), '/');
        $totalClicks = $tree->items->sum('visits');
        $ctr         = $tree->visits > 0
            ? round(($totalClicks / $tree->visits) * 100, 2)
            : 0.0;

        return [
            'id'           => $tree->id,
            'judul'        => $tree->judul,
            'deskripsi'    => $tree->deskripsi,
            'kode'         => $tree->kode,
            'tema_warna'   => $tree->tema_warna,
            'foto'         => $tree->foto,      // base64 atau null
            'public_url'   => $baseUrl . '/lt/' . $tree->kode,
            'qr_url'       => $baseUrl . '/lt/' . $tree->kode . '/qr',
            'visits'       => (int) $tree->visits,
            'visits_link'  => (int) $tree->visits_link,
            'visits_qr'    => (int) $tree->visits_qr,
            'total_clicks' => (int) $totalClicks,
            'ctr'          => $ctr, // persentase 0–100
            'items'        => $tree->items->map(fn($item) => [
                'id'     => $item->id,
                'label'  => $item->label,
                'url'    => $item->url,
                'urutan' => $item->urutan,
                'visits' => (int) $item->visits,
            ])->values(),
            'created_at'   => $tree->created_at->format('d/m/Y H:i'),
        ];
    }

    /*
     * Generate kode unik 6 karakter yang belum dipakai.
     */
    private function generateKode(): string
    {
        do {
            $kode = Str::lower(Str::random(6));
        } while (LinkTree::where('kode', $kode)->exists());

        return $kode;
    }
}
