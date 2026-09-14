<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambah kolom visitor_hash ke tabel visits.
     * Hash SHA-256 dari IP + User-Agent — tidak menyimpan data mentah.
     */
    public function up(): void
    {
        Schema::table('visits', function (Blueprint $table) {
            $table->char('visitor_hash', 64)->nullable()->after('is_qr');
            $table->index('visitor_hash');
        });
    }

    public function down(): void
    {
        Schema::table('visits', function (Blueprint $table) {
            $table->dropIndex(['visitor_hash']);
            $table->dropColumn('visitor_hash');
        });
    }
};
