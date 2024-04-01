<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tempat_training', function (Blueprint $table) {
            $table->integer('bintang_hotel')->nullable()->after('email_hotel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tempat_training', function (Blueprint $table) {
            //
        });
    }
};
