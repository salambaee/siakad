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
        Schema::create('krs', function (Blueprint $table) {
            $table->id('id_krs');
            $table->bigInteger('nim')->nullable();
            $table->unsignedBigInteger('id_jadwal')->nullable();
            $table->string('semester', 45)->nullable();
            $table->string('tahun_ajaran', 45)->nullable();
            $table->enum('status_validasi', ['Menunggu', 'Disetujui', 'Ditolak'])->default('Menunggu');
            $table->foreign('nim')->references('nim')->on('mahasiswa')->onDelete('no action')->onUpdate('no action');
            $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwal')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('krs');
    }
};
