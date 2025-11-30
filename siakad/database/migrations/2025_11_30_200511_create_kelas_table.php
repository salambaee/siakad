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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nidn'); // Foreign key ke tabel dosen
            $table->string('kode_mk'); // Foreign key ke tabel mata_kuliah
            $table->string('kelas'); // Contoh: TI-3A
            $table->string('hari'); // Senin, Selasa, dll
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('ruang');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('nidn')->references('nidn')->on('dosen')->onDelete('cascade');
            $table->foreign('kode_mk')->references('kode_mk')->on('mata_kuliah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};