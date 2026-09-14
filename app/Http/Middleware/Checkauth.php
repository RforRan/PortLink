<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class CheckAuth
{
    // Cache hasil validasi token selama 5 menit
    // Portal hanya dihubungi sekali per 5 menit per token
    const CACHE_TTL = 300;

    public function handle(Request $request, Closure $next): mixed
    {
        // Blade page: proteksi dilakukan client-side
        if (!$request->is('api/*')) {
            return $next($request);
        }

        // ── API request: wajib ada Bearer token ──────────────
        $token = $request->bearerToken()
            ?? $request->header('X-Auth-Token');

        if (!$token) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Token tidak ditemukan. Silakan login kembali.',
            ], 401);
        }

        // ── Cek cache dulu sebelum hit Portal ────────────────
        // Key unik per token menggunakan SHA-256
        $cacheKey = 'auth_token_' . hash('sha256', $token);

        $isValid = Cache::remember($cacheKey, self::CACHE_TTL, function () use ($token) {
            try {
                $response = Http::withToken($token)
                    ->timeout(60)
                    ->get(config('services.portal_pegawai.cek_token'));

                return $response->successful() && ($response->json('status') === 200);
            } catch (\Exception $e) {
                return false;
            }
        });

        if (!$isValid) {
            // Hapus cache yang invalid agar tidak tersimpan permanen
            Cache::forget($cacheKey);

            return response()->json([
                'status'  => 'error',
                'message' => 'Sesi tidak valid. Silakan login kembali.',
            ], 401);
        }

        return $next($request);
    }
}
