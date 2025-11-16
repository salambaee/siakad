<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jadwal')->insert([
            [
                'kode_mk' => 'IF101',
                'nidn' => 1011018001, // Eka Mistiko Rini
                'hari' => 'Senin',
                'jam' => '08:00 - 10:30',
                'ruang' => 'R-101'
            ],
            [
                'kode_mk' => 'IF102',
                'nidn' => 1011018002, // Dedy Hidayat Kusuma
                'hari' => 'Senin',
                'jam' => '10:30 - 13:00',
                'ruang' => 'R-102'
            ],
            [
                'kode_mk' => 'IF103',
                'nidn' => 1011018003, // Farizqi Panduardi
                'hari' => 'Selasa',
                'jam' => '08:00 - 10:30',
                'ruang' => 'R-201'
            ],
            [
                'kode_mk' => 'IF104',
                'nidn' => 1011018006, // Vivien Arief Wardhany
                'hari' => 'Rabu',
                'jam' => '13:00 - 15:30',
                'ruang' => 'R-202'
            ],
            [
                'kode_mk' => 'IF105',
                'nidn' => 1011018004, // I Wayan Suardinata
                'hari' => 'Kamis',
                'jam' => '08:00 - 10:30',
                'ruang' => 'R-203'
            ],
            [
                'kode_mk' => 'IF106',
                'nidn' => 1011018005, // Herman Yuliandoko
                'hari' => 'Kamis',
                'jam' => '10:30 - 13:00',
                'ruang' => 'R-204'
            ],
            [
                'kode_mk' => 'IF107',
                'nidn' => 1011018013, // Dianni Yusuf
                'hari' => 'Jumat',
                'jam' => '08:00 - 10:30',
                'ruang' => 'R-301'
            ],
            [
                'kode_mk' => 'IF108',
                'nidn' => 1011018009, // Endi Sailul Haq
                'hari' => 'Jumat',
                'jam' => '10:30 - 13:00',
                'ruang' => 'R-302'
            ],
        ]);
    }
}