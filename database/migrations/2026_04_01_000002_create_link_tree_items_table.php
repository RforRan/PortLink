<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel sub link dari sebuah link tree.
     *
     * - urutan : untuk sorting tampilan di halaman publik (drag & drop)
     * - visits : jumlah klik pada sub link ini
     */
    public function up(): void
    {
        Schema::create('link_tree_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('link_tree_id')
                  ->constrained('link_trees')
                  ->cascadeOnDelete();
            $table->string('label', 100);
            $table->text('url');
            $table->unsignedSmallInteger('urutan')->default(0);
            $table->unsignedBigInteger('visits')->default(0);
            $table->timestamps();

            // Index untuk query items by link_tree_id (paling sering dipakai)
            $table->index(['link_tree_id', 'urutan'], 'idx_lti_tree_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('link_tree_items');
    }
};
