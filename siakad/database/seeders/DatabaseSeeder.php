<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProdiSeeder::class,
            MahasiswaSeeder::class,
            MataKuliahSeeder::class,
            DosenSeeder::class,
            JadwalSeeder::class,
        ]);
    }
}