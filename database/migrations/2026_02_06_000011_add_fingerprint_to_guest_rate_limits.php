<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambah kolom fingerprint_hash ke guest_rate_limits.
     * Ubah unique constraint: sebelumnya (ip, date), sekarang
     * satu record bisa ditemukan via IP atau fingerprint.
     */
    public function up(): void
    {
        Schema::table('guest_rate_limits', function (Blueprint $table) {
            // fingerprint hash SHA-256 dari browser (64 char hex)
            $table->char('fingerprint_hash', 64)->nullable()->after('ip');

            // index untuk pencarian cepat by fingerprint
            $table->index(['fingerprint_hash', 'date'], 'idx_grl_fp_date');

            // drop unique lama (ip, date) — karena sekarang
            // satu IP bisa punya beberapa fingerprint berbeda (beda orang satu WiFi)
            $table->dropUnique(['ip', 'date']);

            // unique baru: (ip, fingerprint_hash, date)
            // mencegah duplikat untuk kombinasi yang sama persis
            $table->unique(['ip', 'fingerprint_hash', 'date'], 'uniq_grl_ip_fp_date');
        });
    }

    public function down(): void
    {
        Schema::table('guest_rate_limits', function (Blueprint $table) {
            $table->dropIndex('idx_grl_fp_date');
            $table->dropUnique('uniq_grl_ip_fp_date');
            $table->dropColumn('fingerprint_hash');
            $table->unique(['ip', 'date']);
        });
    }
};
