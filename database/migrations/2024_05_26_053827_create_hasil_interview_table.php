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
        Schema::create('hasil_interview', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_siswa');
            $table->foreignId('id_tempat_training');
            $table->string('file_hasil_interview')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_interview');
    }
};
