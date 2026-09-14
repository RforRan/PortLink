<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel tracking kunjungan link tree.
     *
     * Satu tabel untuk dua jenis event:
     *
     *   1. Kunjungan halaman induk (buka /lt/{kode} atau scan QR)
     *      → item_id = NULL, is_qr = true/false
     *
     *   2. Klik sub link (klik salah satu link di halaman)
     *      → item_id = id sub link, is_qr = false (selalu false, klik dari halaman)
     *
     * Dengan struktur ini:
     *   - Total kunjungan halaman = COUNT WHERE item_id IS NULL
     *   - Total klik keluar       = COUNT WHERE item_id IS NOT NULL
     *   - CTR                     = klik keluar / kunjungan halaman * 100
     *   - Rank per sub link       = COUNT WHERE item_id = X
     *   - Unique visitors         = COUNT DISTINCT visitor_hash
     */
    public function up(): void
    {
        Schema::create('link_tree_visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('link_tree_id')
                  ->constrained('link_trees')
                  ->cascadeOnDelete();
            $table->foreignId('item_id')
                  ->nullable()
                  ->constrained('link_tree_items')
                  ->nullOnDelete(); // item dihapus → visit tetap ada, item_id jadi null
            $table->boolean('is_qr')->default(false);
            $table->char('visitor_hash', 64)->nullable();
            $table->timestamp('visited_at')->useCurrent();

            // Index utama untuk query statistik per link tree + waktu
            $table->index(['link_tree_id', 'visited_at'], 'idx_ltv_tree_time');

            // Index untuk query breakdown per item
            $table->index(['link_tree_id', 'item_id', 'visited_at'], 'idx_ltv_tree_item_time');

            // Index untuk unique visitor count
            $table->index('visitor_hash', 'idx_ltv_visitor_hash');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('link_tree_visits');
    }
};
