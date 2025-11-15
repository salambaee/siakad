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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id('id_jadwal');
            $table->string('kode_mk', 10)->nullable();
            $table->bigInteger('nidn')->nullable();
            $table->string('hari')->nullable();
            $table->string('jam', 20)->nullable()->comment('Contoh: 08:00 - 10:30');
            $table->string('ruang', 20)->nullable();
            $table->foreign('kode_mk')->references('kode_mk')->on('mata_kuliah')->onDelete('no action')->onUpdate('no action');
            $table->foreign('nidn')->references('nidn')->on('dosen')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
