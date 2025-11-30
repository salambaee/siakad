<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('nilai');
        
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nim');
            $table->string('kode_mk');
            $table->decimal('nilai_tugas', 5, 2)->nullable();
            $table->decimal('nilai_uts', 5, 2)->nullable();
            $table->decimal('nilai_uas', 5, 2)->nullable();
            $table->decimal('nilai_akhir', 5, 2)->nullable();
            $table->string('nilai_huruf', 2)->nullable();
            $table->boolean('is_final')->default(false);
            $table->timestamps();

            // Foreign keys - tanpa constraint dulu untuk testing
            // $table->foreign('nim')->references('nim')->on('mahasiswa');
            // $table->foreign('kode_mk')->references('kode_mk')->on('mata_kuliah');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};