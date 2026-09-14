<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('short_urls', function (Blueprint $table) {
            $table->string('judul', 100)->nullable()->after('short_url');
            $table->text('deskripsi')->nullable()->after('judul');
        });
    }

    public function down(): void
    {
        Schema::table('short_urls', function (Blueprint $table) {
            $table->dropColumn(['judul', 'deskripsi']);
        });
    }
};
