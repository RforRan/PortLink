<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('short_urls', function (Blueprint $table) {
            // Kunjungan via klik link biasa
            $table->unsignedBigInteger('visits_link')->default(0)->after('visits');
            // Kunjungan via scan QR code
            $table->unsignedBigInteger('visits_qr')->default(0)->after('visits_link');
        });

        // Migrasi data lama
        DB::statement('UPDATE short_urls SET visits_link = visits');
    }

    public function down(): void
    {
        Schema::table('short_urls', function (Blueprint $table) {
            $table->dropColumn(['visits_link', 'visits_qr']);
        });
    }
};
