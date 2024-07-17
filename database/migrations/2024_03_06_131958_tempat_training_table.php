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
        Schema::create('tempat_training', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Menambahkan user_id
            $table->string('nama_tempat_training');
            $table->string('alamat_tempat_training');
            $table->string('telepon_tempat_training');
            $table->string('email_tempat_training')->unique();
            $table->string('lowongan_training');
            $table->text('ketentuan_tambahan_training');
            $table->date('jadwal_interview');
            $table->time('waktu_interview');
            $table->string('gambar')->nullable();
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tempat_training');
    }
};
