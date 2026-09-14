<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;

class ShortUrlManagementController extends Controller
{

    /*create shortlink baru dengan custom code, judul, deskripsi*/
    public function store(Request $request)
    {
        $request->validate([
            'original_url' => ['required', 'url', 'max:2048'],
            'npp'          => ['required', 'string'],
            'short_url'    => ['nullable', 'string', 'max:50', 'regex:/^[a-zA-Z0-9\-_]+$/'],
            'judul'        => ['nullable', 'string', 'max:100'],
            'deskripsi'    => ['nullable', 'string', 'max:500'],
        ], [
            'original_url.required' => 'URL tidak boleh kosong.',
            'original_url.url'      => 'Format URL tidak valid.',
            'short_url.regex'       => 'Kode hanya boleh berisi huruf, angka, - dan _.',
            'short_url.max'         => 'Kode maksimal 50 karakter.',
        ]);

        // Cek kode custom sudah dipakai
        if ($request->short_url) {
            $exists = ShortUrl::where('short_url', $request->short_url)->exists();
            if ($exists) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Kode shortlink sudah digunakan. Pilih kode lain.',
                ], 422);
            }
        }

        // Buat record dulu untuk dapat ID
        $newUrl = ShortUrl::create([
            'original_url' => $request->original_url,
            'short_url'    => '',
            'npp'          => $request->npp,
            'judul'        => $request->judul    ?? null,
            'deskripsi'    => $request->deskripsi ?? null,
        ]);

        // Tentukan kode: custom atau auto dari ID
        $code = $request->short_url
            ? $request->short_url
            : base_convert($newUrl->id, 10, 36);

        $newUrl->update(['short_url' => $code]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Shortlink berhasil dibuat.',
            'data'    => [
                'id'           => $newUrl->id,
                'original_url' => $newUrl->original_url,
                'short_url'    => url($newUrl->short_url),
                'short_code'   => $newUrl->short_url,
                'judul'        => $newUrl->judul,
                'deskripsi'    => $newUrl->deskripsi,
                'visits'       => 0,
                'visits_link'  => 0,
                'visits_qr'    => 0,
                'created_at'   => $newUrl->created_at->format('d/m/Y H:i'),
            ],
        ], 201);
    }

    /**
     * Update short_url (kode pendek) — bukan original_url.
     * Hanya short_url yang boleh diubah.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'short_url'  => [
                'required', 'string', 'max:50',
                'regex:/^[a-zA-Z0-9\-_]+$/',
            ],
            'judul'      => ['nullable', 'string', 'max:100'],
            'deskripsi'  => ['nullable', 'string', 'max:500'],
        ], [
            'short_url.required'  => 'Kode shortlink tidak boleh kosong.',
            'short_url.regex'     => 'Kode shortlink hanya boleh berisi huruf, angka, - dan _.',
            'short_url.max'       => 'Kode shortlink maksimal 50 karakter.',
        ]);

        $shortUrl = ShortUrl::findOrFail($id);

        // Pastikan kode baru belum dipakai oleh data lain
        $exists = ShortUrl::where('short_url', $request->short_url)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Kode shortlink sudah digunakan. Silakan pilih kode lain.',
            ], 422);
        }

        $shortUrl->update([
            'short_url'  => $request->short_url,
            'judul'      => $request->judul ?? null,
            'deskripsi'  => $request->deskripsi ?? null,
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Shortlink berhasil diperbarui.',
            'data'    => [
                'id'         => $shortUrl->id,
                'short_url'  => url($shortUrl->short_url),
                'short_code' => $shortUrl->short_url,
                'judul'      => $shortUrl->judul,
                'deskripsi'  => $shortUrl->deskripsi,
            ],
        ]);
    }

    /**
     * Delete shortlink.
     */
    public function destroy($id)
    {
        $shortUrl = ShortUrl::findOrFail($id);
        $shortUrl->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Shortlink berhasil dihapus.',
        ]);
    }
}
