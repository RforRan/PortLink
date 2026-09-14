<?php

use App\Http\Controllers\ShortUrlController;
use App\Http\Controllers\ShortUrlManagementController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\GuestShortlinkController;
use App\Http\Controllers\LinkTreeController;
use App\Http\Controllers\LinkTreeRedirectController;
use App\Http\Controllers\LinkTreeStatistikController;
use Illuminate\Support\Facades\Route;

// ── Public routes ─────────────────────────────────────────────────
Route::get('/',             fn() => view('landing'));
Route::get('/login-portal', fn() => view('login'));

// Guest shortlink (tanpa auth)
Route::post('/api/guest/shorten', [GuestShortlinkController::class, 'store']);
Route::get('/api/guest/my-links', [GuestShortlinkController::class, 'myLinks']);

// ── Link tree redirect (public) ───────────────────────────────────
Route::get('/lt/{kode}/qr',          [LinkTreeRedirectController::class, 'showQr'])
    ->where('kode', '[a-zA-Z0-9\-_]+')
    ->name('lt.qr');

Route::get('/lt/{kode}/go/{itemId}', [LinkTreeRedirectController::class, 'go'])
    ->where(['kode' => '[a-zA-Z0-9\-_]+', 'itemId' => '[0-9]+'])
    ->name('lt.go');

Route::get('/lt/{kode}',             [LinkTreeRedirectController::class, 'show'])
    ->where('kode', '[a-zA-Z0-9\-_]+')
    ->name('lt.show');

// ── Protected routes (check.auth) ─────────────────────────────────
Route::middleware(['check.auth'])->group(function () {

    // Blade pages
    Route::get('/dashboard',      fn() => view('dashboard'));
    Route::get('/data-shortlink', fn() => view('data-shortlink'));
    Route::get('/statistik',      [StatistikController::class, 'index']);
    Route::get('/profil',         fn() => view('profil'));
    Route::get('/linktree',       [LinkTreeController::class, 'index']);

    // API
    Route::prefix('api')->group(function () {
        Route::get('/data-shortlinks',         [DataController::class, 'index']);
        Route::get('/statistik',               [StatistikController::class, 'data']);
        Route::get('/statistik/linktree',      [LinkTreeStatistikController::class, 'data']);
        Route::post('/shortlinks',             [ShortUrlManagementController::class, 'store']);
        Route::put('/shortlinks/{id}',         [ShortUrlManagementController::class, 'update']);
        Route::delete('/shortlinks/{id}',      [ShortUrlManagementController::class, 'destroy']);
        Route::get('/linktree/data',           [LinkTreeController::class, 'data']);
        Route::post('/linktree',               [LinkTreeController::class, 'store']);
        Route::put('/linktree/{id}',           [LinkTreeController::class, 'update']);
        Route::delete('/linktree/{id}',        [LinkTreeController::class, 'destroy']);
        Route::post('/linktree/{id}/foto',     [LinkTreeController::class, 'uploadFoto']);
        Route::delete('/linktree/{id}/foto',   [LinkTreeController::class, 'deleteFoto']);
    });
});

// ── ShortLink redirect (public, harus di paling bawah) ────────────
Route::get('/{code}/qr', [ShortUrlController::class, 'showQr'])
    ->where('code', '^(?!api|dashboard|data-shortlink|statistik|profil|short|login-portal|lt)[a-zA-Z0-9\-_]+$')
    ->name('short.qr');

Route::get('/{code}', [ShortUrlController::class, 'show'])
    ->where('code', '^(?!api|dashboard|data-shortlink|statistik|profil|short|login-portal|lt)[a-zA-Z0-9\-_]+$')
    ->name('short.show');
