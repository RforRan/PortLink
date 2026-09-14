<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index(Request $request)
    {
        $npp = $request->query('npp');

        if (!$npp) {
            return response()->json([
                'status'  => 'error',
                'message' => 'NPP tidak ditemukan'
            ], 400);
        }

        $shortlinks = ShortUrl::where('npp', $npp)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function($item) {
                // Hitung unique visitor dari tabel visits
                $uniqueVisitors = Visit::where('short_url_id', $item->id)
                    ->whereNotNull('visitor_hash')
                    ->distinct('visitor_hash')
                    ->count('visitor_hash');

                return [
                    'id'              => $item->id,
                    'original_url'    => $item->original_url,
                    'short_url'       => url($item->short_url),
                    'short_code'      => $item->short_url,
                    'visits'          => (int) $item->visits,
                    'visits_link'     => $item->visits_link ?? 0,
                    'visits_qr'       => $item->visits_qr ?? 0,
                    'unique_visitors' => $uniqueVisitors,
                    'judul'           => $item->judul ?? '',
                    'deskripsi'       => $item->deskripsi ?? '',
                    'created_at'      => $item->created_at->format('d/m/Y H:i'),
                    'created_at_raw'  => $item->created_at->toISOString(),
                ];
            });

        return response()->json([
            'status' => 'success',
            'data'   => $shortlinks
        ]);
    }
}
