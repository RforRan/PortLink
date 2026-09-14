<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambah kolom guest_fp (fingerprint hash) ke short_urls.
     * Dipakai untuk query myLinks by fingerprint — lebih akurat dari IP.
     */
    public function up(): void
    {
        Schema::table('short_urls', function (Blueprint $table) {
            $table->char('guest_fp', 64)->nullable()->after('guest_ip');
            $table->index('guest_fp', 'idx_short_urls_guest_fp');
        });
    }

    public function down(): void
    {
        Schema::table('short_urls', function (Blueprint $table) {
            $table->dropIndex('idx_short_urls_guest_fp');
            $table->dropColumn('guest_fp');
        });
    }
};
