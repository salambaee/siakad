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
        Schema::create('dosen', function (Blueprint $table) {
            $table->bigInteger('nidn')->primary();
            $table->string('nama', 45)->nullable();
            $table->foreignId('id_prodi')->nullable()->constrained('prodi', 'id_prodi')->onDelete('no action')->onUpdate('no action');
            $table->string('keahlian', 45)->nullable();
            $table->string('password', 255)->nullable();
            $table->string('peran', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};