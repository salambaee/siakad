<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dosen')->insert([
            [
                'nidn' => 19870001,
                'nama' => 'Dr. Ahmad Fauzi',
                'id_prodi' => 1, // TRPL
                'keahlian' => 'Pemrograman',
                'password' => Hash::make('dosen1'),
                'peran' => 'Dosen'
            ],
            [
                'nidn' => 19870002,
                'nama' => 'Nur Aisyah, M.Kom',
                'id_prodi' => 2, // TRK
                'keahlian' => 'Basis Data',
                'password' => Hash::make('dosen2'),
                'peran' => 'Dosen'
            ],
            [
                'nidn' => 19870003,
                'nama' => 'Bambang Wijaya, M.T',
                'id_prodi' => 1, // TRPL
                'keahlian' => 'Jaringan',
                'password' => Hash::make('dosen3'),
                'peran' => 'Dosen'
            ],
            [
                'nidn' => 19870004,
                'nama' => 'Sri Rahayu, M.Kom',
                'id_prodi' => 3, // Bisnis Digital
                'keahlian' => 'Sistem Informasi',
                'password' => Hash::make('dosen4'),
                'peran' => 'Dosen'
            ],
            [
                'nidn' => 19870005,
                'nama' => 'Rahmat Hidayat, M.Kom',
                'id_prodi' => 1,
                'keahlian' => 'AI & Machine Learning',
                'password' => Hash::make('dosen5'),
                'peran' => 'Dosen'
            ],
            [
                'nidn' => 19870006,
                'nama' => 'Teguh Prasetyo, M.Eng',
                'id_prodi' => 2,
                'keahlian' => 'Elektronika',
                'password' => Hash::make('dosen6'),
                'peran' => 'Dosen'
            ],
            [
                'nidn' => 19870007,
                'nama' => 'Dewi Lestari, M.Kom',
                'id_prodi' => 3,
                'keahlian' => 'UI/UX',
                'password' => Hash::make('dosen7'),
                'peran' => 'Dosen'
            ],
            [
                'nidn' => 19870008,
                'nama' => 'Hendra Setiawan, M.T',
                'id_prodi' => 1,
                'keahlian' => 'Cloud Computing',
                'password' => Hash::make('dosen8'),
                'peran' => 'Dosen'
            ],
            [
                'nidn' => 19870009,
                'nama' => 'Lisa Marlina, M.Kom',
                'id_prodi' => 2,
                'keahlian' => 'Data Science',
                'password' => Hash::make('dosen9'),
                'peran' => 'Dosen'
            ],
            [
                'nidn' => 19870010,
                'nama' => 'Fauzan Rizqi, M.T',
                'id_prodi' => 3,
                'keahlian' => 'IoT',
                'password' => Hash::make('dosen10'),
                'peran' => 'Dosen'
            ],
        ]);
    }
}
