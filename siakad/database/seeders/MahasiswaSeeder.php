<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswaData = [
            [ 'nim' => 362458302034, 'nama' => 'Heri Herlambang', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302035, 'nama' => 'Moh. Jevon Attaillah', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302036, 'nama' => 'Muhammad Rendra Irawan', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302037, 'nama' => 'Cheryl Aurellya Bangun Jaya', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302038, 'nama' => 'Husnul Alisah', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302039, 'nama' => 'Virdan Andi Wardana', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302040, 'nama' => 'Moh. Nuris Gustian Arrafi', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302041, 'nama' => 'Salam Rizqi Mulia', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302042, 'nama' => 'Febriyan Putra Hariadi', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302043, 'nama' => 'Dino Febiyan', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302044, 'nama' => 'Rusydi Jabir Alawfa', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302091, 'nama' => 'Rizky Bintang Putra', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302092, 'nama' => 'Muhammad Rakha Widya Ardhana', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302093, 'nama' => 'Alfin Nazati Kirom', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302094, 'nama' => 'Dian Restu Khoirunnisa', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302095, 'nama' => 'Vina Faizatus Sofita', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302096, 'nama' => 'Achmad Fahmi Fuady', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302097, 'nama' => 'Daniel Fandino', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302098, 'nama' => 'Danish Naisyila Azka', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302099, 'nama' => 'Intan Rahma Safira', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302100, 'nama' => 'Firman Ardiansyah', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302101, 'nama' => "Nadhifah Afiyah Qurota'ain", 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302119, 'nama' => 'Nicko Sugiarto', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302120, 'nama' => 'Yushril Huda Ramadhany S', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302124, 'nama' => 'Adelia Fioren Zety', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302125, 'nama' => 'Leni Ayu Pratiwi', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302126, 'nama' => 'Tio Krisna Mukti', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302145, 'nama' => 'Anisa Suci Rahmawati', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302146, 'nama' => 'Ahmad Maulidin', 'id_prodi' => 1, 'angkatan' => '2024' ],
            [ 'nim' => 362458302147, 'nama' => 'Achmad Alfarizy Satriya G', 'id_prodi' => 1, 'angkatan' => '2024' ],
        ];
        foreach ($mahasiswaData as $mhs) {
            DB::table('mahasiswa')->insert([
                'nim' => $mhs['nim'],
                'nama' => $mhs['nama'],
                'id_prodi' => $mhs['id_prodi'],
                'angkatan' => $mhs['angkatan'],
                'password' => Hash::make((string)$mhs['nim']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}