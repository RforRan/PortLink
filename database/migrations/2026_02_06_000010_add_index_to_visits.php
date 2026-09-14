<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambah composite index ke tabel visits agar query statistik
     * (WHERE short_url_id IN (...) AND visited_at >= ?) jauh lebih cepat.
     *
     * Sebelum index: full table scan setiap query → lambat saat data banyak.
     * Setelah index: MySQL langsung lompat ke baris yang relevan.
     */
    public function up(): void
    {
        Schema::table('visits', function (Blueprint $table) {
            // Composite index untuk query statistik utama
            $table->index(['short_url_id', 'visited_at'], 'idx_visits_shorturl_time');

            // Index untuk filter is_qr
            $table->index(['short_url_id', 'is_qr', 'visited_at'], 'idx_visits_shorturl_qr_time');
        });
    }

    public function down(): void
    {
        Schema::table('visits', function (Blueprint $table) {
            $table->dropIndex('idx_visits_shorturl_time');
            $table->dropIndex('idx_visits_shorturl_qr_time');
        });
    }
};
