<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Perbaikan tiga hal sekaligus pada tabel short_urls:
     *
     * 1. Kolom `visits` awalnya dibuat sebagai VARCHAR (string) di migration 000002
     *    karena typo `->nullable` tanpa tanda kurung. Diubah ke unsignedBigInteger
     *    agar konsisten dengan visits_link dan visits_qr, serta agar sorting benar.
     *
     * 2. Tambah index `npp` — kolom ini dipakai di WHERE clause hampir semua query
     *    (DataController, StatistikController) tapi belum ada index-nya.
     *
     * 3. Tambah index `expired_at` — dipakai di scopeGuestActive dan myLinks query
     *    untuk filter shortlink guest yang belum expired.
     */
    public function up(): void
    {
        Schema::table('short_urls', function (Blueprint $table) {
            // 1. Perbaiki tipe kolom visits: VARCHAR → UNSIGNED BIGINT
            $table->unsignedBigInteger('visits')->default(0)->change();

            // 2. Index untuk query WHERE npp = ?
            $table->index('npp', 'idx_short_urls_npp');

            // 3. Index untuk query WHERE expired_at > NOW()
            $table->index('expired_at', 'idx_short_urls_expired_at');
        });
    }

    public function down(): void
    {
        Schema::table('short_urls', function (Blueprint $table) {
            $table->dropIndex('idx_short_urls_npp');
            $table->dropIndex('idx_short_urls_expired_at');

            // Kembalikan ke string (sesuai kondisi awal migration 000002)
            $table->string('visits')->default(0)->change();
        });
    }
};
