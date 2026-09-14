<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('short_url_id')->constrained()->cascadeOnDelete();
            $table->boolean('is_qr')->default(false); // false = link, true = qr
            $table->timestamp('visited_at')->useCurrent();

            $table->index(['short_url_id', 'visited_at']);
            $table->index('visited_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
