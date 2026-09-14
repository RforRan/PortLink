<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambah kolom foto ke tabel link_trees.
     *
     * foto disimpan sebagai base64 string langsung di database
     * (bukan path file) agar tidak perlu konfigurasi storage/disk
     * dan mudah dipindah antar server.
     *
     * Format: "data:image/jpeg;base64,/9j/4AAQ..."
     * Ukuran max yang diizinkan di controller: 3 MB → setelah
     * resize/compress di client, ukuran base64 ≈ 200–400 KB.
     *
     * Gunakan MEDIUMTEXT (max 16 MB) bukan TEXT (max 64 KB).
     */
    public function up(): void
    {
        Schema::table('link_trees', function (Blueprint $table) {
            // nullable — foto bersifat opsional
            $table->mediumText('foto')->nullable()->after('tema_warna');
        });
    }

    public function down(): void
    {
        Schema::table('link_trees', function (Blueprint $table) {
            $table->dropColumn('foto');
        });
    }
};
