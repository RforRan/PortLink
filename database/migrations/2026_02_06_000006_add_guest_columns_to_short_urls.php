<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('short_urls', function (Blueprint $table) {
            // Guest columns
            $table->boolean('is_guest')->default(false)->after('npp');
            $table->string('guest_ip', 45)->nullable()->after('is_guest');
            $table->timestamp('expired_at')->nullable()->after('guest_ip');
        });
    }

    public function down(): void
    {
        Schema::table('short_urls', function (Blueprint $table) {
            $table->dropColumn(['is_guest', 'guest_ip', 'expired_at']);
        });
    }
};
