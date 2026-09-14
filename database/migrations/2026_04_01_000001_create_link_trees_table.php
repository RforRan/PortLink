<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel induk link tree.
     *
     * - kode        : short code untuk URL /lt/{kode}
     * - tema_warna  : hex color (#rrggbb) untuk accent warna halaman publik
     * - visits      : total kunjungan halaman (link + qr)
     * - visits_link : kunjungan via URL langsung
     * - visits_qr   : kunjungan via scan QR
     */
    public function up(): void
    {
        Schema::create('link_trees', function (Blueprint $table) {
            $table->id();
            $table->string('npp');
            $table->string('kode', 50)->unique();
            $table->string('judul', 100);
            $table->text('deskripsi')->nullable();
            $table->char('tema_warna', 7)->default('#1c6b3a'); // default green aplikasi
            $table->unsignedBigInteger('visits')->default(0);
            $table->unsignedBigInteger('visits_link')->default(0);
            $table->unsignedBigInteger('visits_qr')->default(0);
            $table->timestamps();

            $table->index('npp', 'idx_link_trees_npp');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('link_trees');
    }
};
