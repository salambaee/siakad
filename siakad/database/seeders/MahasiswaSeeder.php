<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa')->insert([
            [
                'nim' => 20240001,
                'nama' => 'Salam Rizqi Mulia',
                'id_prodi' => 1,
                'angkatan' => '2024',
            ],
            [
                'nim' => 20240002,
                'nama' => 'Dimas Pratama',
                'id_prodi' => 1,
                'angkatan' => '2024',
            ],
            [
                'nim' => 20240003,
                'nama' => 'Aulia Rahma',
                'id_prodi' => 2,
                'angkatan' => '2023',
            ],
            [
                'nim' => 20240004,
                'nama' => 'Budi Santoso',
                'id_prodi' => 2,
                'angkatan' => '2023',
            ],
            [
                'nim' => 20240005,
                'nama' => 'Nadia Putri',
                'id_prodi' => 3,
                'angkatan' => '2022',
            ],
            [
                'nim' => 20240006,
                'nama' => 'Rizky Ardiansyah',
                'id_prodi' => 1,
                'angkatan' => '2022',
            ],
            [
                'nim' => 20240007,
                'nama' => 'Lintang Azzahra',
                'id_prodi' => 3,
                'angkatan' => '2024',
            ],
            [
                'nim' => 20240008,
                'nama' => 'Joko Prasetyo',
                'id_prodi' => 2,
                'angkatan' => '2021',
            ],
            [
                'nim' => 20240009,
                'nama' => 'Siti Nurjana',
                'id_prodi' => 1,
                'angkatan' => '2021',
            ],
            [
                'nim' => 20240010,
                'nama' => 'Fadlan Dirgantara',
                'id_prodi' => 2,
                'angkatan' => '2024',
            ],
        ]);
    }
}
