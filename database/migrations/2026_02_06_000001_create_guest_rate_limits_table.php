<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel untuk tracking rate limit per IP per hari.
     * Reset otomatis karena dicek berdasarkan kolom `date`.
     */
    public function up(): void
    {
        Schema::create('guest_rate_limits', function (Blueprint $table) {
            $table->id();
            $table->string('ip', 45);
            $table->date('date');
            $table->unsignedTinyInteger('count')->default(0);
            $table->timestamps();

            $table->unique(['ip', 'date']);
            $table->index('ip');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guest_rate_limits');
    }
};
