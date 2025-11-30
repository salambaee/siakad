<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mata_kuliah')->insert([
            [
                'kode_mk' => 'IF101',
                'id_prodi' => 1,
                'nama_mk' => 'Pemrograman Dasar',
                'sks' => 3
            ],
            [
                'kode_mk' => 'IF102',
                'id_prodi' => 1,
                'nama_mk' => 'Basis Data',
                'sks' => 3
            ],
            [
                'kode_mk' => 'IF103',
                'id_prodi' => 1,
                'nama_mk' => 'Jaringan Komputer',
                'sks' => 3
            ],
            [
                'kode_mk' => 'IF104',
                'id_prodi' => 1,
                'nama_mk' => 'Sistem Informasi',
                'sks' => 3
            ],
            [
                'kode_mk' => 'IF105',
                'id_prodi' => 1,
                'nama_mk' => 'Kecerdasan Buatan',
                'sks' => 3
            ],
            [
                'kode_mk' => 'IF106',
                'id_prodi' => 1,
                'nama_mk' => 'Elektronika Dasar',
                'sks' => 2
            ],
            [
                'kode_mk' => 'IF107',
                'id_prodi' => 1,
                'nama_mk' => 'UI/UX Design',
                'sks' => 2
            ],
            [
                'kode_mk' => 'IF108',
                'id_prodi' => 1,
                'nama_mk' => 'Cloud Computing',
                'sks' => 3
            ],
        ]);
    }
}