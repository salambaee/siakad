<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prodi')->insert([
            [
                'id_prodi' => 1,
                'nama_prodi' => 'D4 Teknologi Rekayasa Perangkat Lunak',
                'jenjang' => 'D4',
            ],
            [
                'id_prodi' => 2,
                'nama_prodi' => 'D4 Bisnis Digital',
                'jenjang' => 'D4',
            ],
            [
                'id_prodi' => 3,
                'nama_prodi' => 'D4 Teknologi Rekayasa Komputer',
                'jenjang' => 'D4',
            ],
            [
                'id_prodi' => 4,
                'nama_prodi' => 'D3 Teknik Sipil',
                'jenjang' => 'D3',
            ],
            [
                'id_prodi' => 5,
                'nama_prodi' => 'D4 Teknologi Rekayasa Konstruksi Jalan dan Jembatan',
                'jenjang' => 'D4',
            ],
            [
                'id_prodi' => 8,
                'nama_prodi' => 'D4 Teknologi Rekayasa Manufaktur',
                'jenjang' => 'D4',
            ],
            [
                'id_prodi' => 10,
                'nama_prodi' => 'D4 Manajemen Bisnis Pariwisata',
                'jenjang' => 'D4',
            ],
            [
                'id_prodi' => 13,
                'nama_prodi' => 'D4 Agribisnis',
                'jenjang' => 'D4',
            ],
            [
                'id_prodi' => 15,
                'nama_prodi' => 'D4 Pengembangan Produk Agroindustri',
                'jenjang' => 'D4',
            ],
        ]);
    }
}