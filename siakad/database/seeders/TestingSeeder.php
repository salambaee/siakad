<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TestingSeeder extends Seeder
{
    public function run(): void
    {
        // Data mata kuliah untuk testing
        $mataKuliah = [
            ['kode_mk' => 'PD001', 'id_prodi' => 1, 'nama_mk' => 'Pemrograman Dasar', 'sks' => 3],
            ['kode_mk' => 'BD001', 'id_prodi' => 1, 'nama_mk' => 'Basis Data', 'sks' => 3],
            ['kode_mk' => 'PW001', 'id_prodi' => 1, 'nama_mk' => 'Pemrograman Web', 'sks' => 3],
        ];

        foreach ($mataKuliah as $mk) {
            DB::table('mata_kuliah')->updateOrInsert(
                ['kode_mk' => $mk['kode_mk']],
                $mk
            );
        }

        // Data KRS untuk testing (supaya mahasiswa muncul di nilai)
        $krsData = [];
        $mahasiswa = DB::table('mahasiswa')->where('id_prodi', 1)->limit(10)->get();
        
        foreach ($mahasiswa as $mhs) {
            $krsData[] = [
                'nim' => $mhs->nim,
                'id_jadwal' => 1, // ID jadwal dummy
                'semester' => '2',
                'tahun_ajaran' => '2024/2025',
                'status' => 'Disetujui',
            ];
        }

        foreach ($krsData as $krs) {
            DB::table('krs')->updateOrInsert(
                ['nim' => $krs['nim'], 'id_jadwal' => $krs['id_jadwal']],
                $krs
            );
        }
    }
}