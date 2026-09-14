<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Perbaiki unique constraint di guest_rate_limits agar rate limit
     * tetap efektif untuk user yang tidak mengirim fingerprint (JS disabled).
     *
     * MASALAH:
     *   Saat ini kolom fingerprint_hash nullable, dan unique constraint adalah
     *   (ip, fingerprint_hash, date). Di MySQL, NULL != NULL dalam konteks UNIQUE,
     *   sehingga dua baris dengan (ip=X, fp=NULL, date=Y) dianggap BERBEDA.
     *   Akibatnya: user tanpa fingerprint bisa insert baris baru tiap request
     *   dan melewati rate limit sama sekali.
     *
     * SOLUSI:
     *   Ganti NULL dengan string kosong '' sebagai sentinel value.
     *   Unique constraint (ip, fingerprint_hash, date) tetap bekerja
     *   karena '' == '' dianggap duplikat oleh MySQL.
     *
     * DAMPAK:
     *   - Record lama dengan fp=NULL di-migrate ke fp='' sebelum constraint diubah.
     *   - GuestShortlinkController::resolveRateLimit() tidak perlu diubah karena
     *     whereNull('fingerprint_hash') perlu diganti whereNull atau where('', '').
     *     Lihat catatan di bawah.
     *
     * CATATAN PENTING — update controller setelah migration ini:
     *   Di GuestShortlinkController::resolveRateLimit(), baris:
     *     ->whereNull('fingerprint_hash')
     *   harus diganti menjadi:
     *     ->where('fingerprint_hash', '')
     *
     *   Dan saat membuat record baru tanpa fingerprint:
     *     'fingerprint_hash' => $fpHash ?? ''
     */
    public function up(): void
    {
        // 1. Migrate data lama: NULL → '' sebelum mengubah kolom
        DB::table('guest_rate_limits')
            ->whereNull('fingerprint_hash')
            ->update(['fingerprint_hash' => '']);

        Schema::table('guest_rate_limits', function (Blueprint $table) {
            // 2. Drop unique constraint lama
            $table->dropUnique('uniq_grl_ip_fp_date');

            // 3. Drop index lama yang menyertakan fingerprint_hash nullable
            $table->dropIndex('idx_grl_fp_date');

            // 4. Ubah kolom: hapus nullable, set default ''
            $table->char('fingerprint_hash', 64)->nullable(false)->default('')->change();

            // 5. Re-create index
            $table->index(['fingerprint_hash', 'date'], 'idx_grl_fp_date');

            // 6. Re-create unique constraint (sekarang berfungsi benar karena tidak ada NULL)
            $table->unique(['ip', 'fingerprint_hash', 'date'], 'uniq_grl_ip_fp_date');
        });
    }

    public function down(): void
    {
        Schema::table('guest_rate_limits', function (Blueprint $table) {
            $table->dropUnique('uniq_grl_ip_fp_date');
            $table->dropIndex('idx_grl_fp_date');

            // Kembalikan ke nullable
            $table->char('fingerprint_hash', 64)->nullable()->change();

            $table->index(['fingerprint_hash', 'date'], 'idx_grl_fp_date');
            $table->unique(['ip', 'fingerprint_hash', 'date'], 'uniq_grl_ip_fp_date');
        });

        // Kembalikan '' ke NULL
        DB::table('guest_rate_limits')
            ->where('fingerprint_hash', '')
            ->update(['fingerprint_hash' => null]);
    }
};
