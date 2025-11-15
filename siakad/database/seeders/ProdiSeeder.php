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
                'nama_prodi' => 'Teknologi Rekayasa Perangkat Lunak'
            ],
            [
                'id_prodi' => 2,
                'nama_prodi' => 'Teknologi Rekayasa Komputer'
            ],
            [
                'id_prodi' => 3,
                'nama_prodi' => 'Bisnis Digital'
            ],
        ]);
    }
}
