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
        $dosenData = [
            ['nidn' => 1011018001, 'nama' => 'Eka Mistiko Rini, S.Kom, M.Kom.', 'id_prodi' => 1, 'keahlian' => 'Ilmu Komputer, Rekayasa Perangkat Lunak', 'peran' => 'Dosen'],
            ['nidn' => 1011018002, 'nama' => 'Dedy Hidayat Kusuma, S.T., M.Cs.', 'id_prodi' => 1, 'keahlian' => 'Ilmu Komputer, Teknik Informatika', 'peran' => 'Dosen'],
            ['nidn' => 1011018003, 'nama' => 'Farizqi Panduardi, S.ST., M.T.', 'id_prodi' => 3, 'keahlian' => 'Teknik Komputer, Jaringan', 'peran' => 'Dosen'],
            ['nidn' => 1011018004, 'nama' => 'I Wayan Suardinata, S.Kom., M.T.', 'id_prodi' => 1, 'keahlian' => 'Ilmu Komputer, Teknik Informatika', 'peran' => 'Dosen'],
            ['nidn' => 1011018005, 'nama' => 'Herman Yuliandoko, S.T., M.T.', 'id_prodi' => 1, 'keahlian' => 'Teknik Informatika', 'peran' => 'Dosen'],
            ['nidn' => 1011018006, 'nama' => 'Vivien Arief Wardhany, S.T., M.T.', 'id_prodi' => 1, 'keahlian' => 'Teknik Informatika, Sistem Informasi', 'peran' => 'Dosen'],
            ['nidn' => 1011018007, 'nama' => 'Devit Suwardiyanto,S.Si., M.T.', 'id_prodi' => 1, 'keahlian' => 'Sains Data, Teknik Informatika', 'peran' => 'Dosen'],
            ['nidn' => 1011018008, 'nama' => 'Moh. Nur Shodiq, S.T., M.T.', 'id_prodi' => 8, 'keahlian' => 'Teknik Mesin', 'peran' => 'Dosen'],
            ['nidn' => 1011018009, 'nama' => 'Endi Sailul Haq, S.T., M.Kom.', 'id_prodi' => 1, 'keahlian' => 'Ilmu Komputer, Teknik Informatika', 'peran' => 'Dosen'],
            ['nidn' => 1011018010, 'nama' => 'Subono, S.T., M.T.', 'id_prodi' => 8, 'keahlian' => 'Teknik Mesin, Manufaktur', 'peran' => 'Dosen'],
            ['nidn' => 1011018011, 'nama' => 'Mohamad Dimyati Ayatullah, S.T., M.Kom.', 'id_prodi' => 1, 'keahlian' => 'Ilmu Komputer, Sistem Informasi', 'peran' => 'Dosen'],
            ['nidn' => 1011018012, 'nama' => 'Alfin Hidayat, S.T., M.T.', 'id_prodi' => 4, 'keahlian' => 'Teknik Sipil', 'peran' => 'Dosen'],
            ['nidn' => 1011018013, 'nama' => 'Dianni Yusuf, S.Kom., M.Kom.', 'id_prodi' => 1, 'keahlian' => 'Ilmu Komputer, Rekayasa Perangkat Lunak', 'peran' => 'Dosen'],
            ['nidn' => 1011018014, 'nama' => 'Suwarso, S.Pd., M.H.', 'id_prodi' => 1, 'keahlian' => 'Pendidikan, Hukum', 'peran' => 'Dosen'],
            ['nidn' => 1011018015, 'nama' => 'Junaedi Adi Prasetyo, S.ST., M.Sc.', 'id_prodi' => 13, 'keahlian' => 'Sains Terapan, Agribisnis', 'peran' => 'Dosen'],
            ['nidn' => 1011018016, 'nama' => 'Galih Hendra Wibowo, S.Tr.Kom., M.T.', 'id_prodi' => 3, 'keahlian' => 'Teknologi Komputer, Jaringan', 'peran' => 'Dosen'],
            ['nidn' => 1011018017, 'nama' => 'Lutfi Hakim, S.Pd., M.T.', 'id_prodi' => 1, 'keahlian' => 'Pendidikan Teknik, Informatika', 'peran' => 'Dosen'],
            ['nidn' => 1011018018, 'nama' => 'Sepyan Purnama Kristanto, S.Kom., M.Kom.', 'id_prodi' => 1, 'keahlian' => 'Ilmu Komputer, Sistem Informasi', 'peran' => 'Dosen'],
            ['nidn' => 1011018019, 'nama' => 'Arum Andary Ratri, S.Si., M.Si.', 'id_prodi' => 1, 'keahlian' => 'Sains Murni (Fisika/Kimia/Biologi)', 'peran' => 'Dosen'],
            ['nidn' => 1011018020, 'nama' => 'Indira Nuansa Ratri, S.M., M.SM.', 'id_prodi' => 2, 'keahlian' => 'Manajemen, Bisnis Digital', 'peran' => 'Dosen'],
            ['nidn' => 1011018021, 'nama' => 'Ruth Ema Febrita, S.Pd., M.Kom.', 'id_prodi' => 1, 'keahlian' => 'Pendidikan Informatika, Ilmu Komputer', 'peran' => 'Dosen'],
            ['nidn' => 1011018022, 'nama' => 'Agus Priyo Utomo, S.ST., M.Tr.Kom.', 'id_prodi' => 3, 'keahlian' => 'Teknologi Rekayasa Komputer', 'peran' => 'Dosen'],
            ['nidn' => 1011018023, 'nama' => 'Lukman Hakim S.Kom., M.T', 'id_prodi' => 1, 'keahlian' => 'Ilmu Komputer, Teknik Informatika', 'peran' => 'Dosen'],
            ['nidn' => 1011018024, 'nama' => 'Khoirul Umam, S.Pd, M.Kom', 'id_prodi' => 1, 'keahlian' => 'Pendidikan Informatika, Ilmu Komputer', 'peran' => 'Dosen'],
            ['nidn' => 1011018025, 'nama' => 'Septa Lukman Andes, S.AB., M.AB.', 'id_prodi' => 2, 'keahlian' => 'Administrasi Bisnis, Bisnis Digital', 'peran' => 'Dosen'],
            ['nidn' => 1011018026, 'nama' => 'Arif Fahmi, S.T., M.T.', 'id_prodi' => 8, 'keahlian' => 'Teknik Mesin', 'peran' => 'Dosen'],
            ['nidn' => 1011018027, 'nama' => 'Eka Novita Sari, S. Kom., M.Kom.', 'id_prodi' => 1, 'keahlian' => 'Ilmu Komputer, Sistem Informasi', 'peran' => 'Dosen'],
            ['nidn' => 1011018028, 'nama' => 'Furiansyah Dipraja, S.T., M.Kom.', 'id_prodi' => 1, 'keahlian' => 'Teknik Informatika, Ilmu Komputer', 'peran' => 'Dosen'],
            ['nidn' => 1011018029, 'nama' => 'Indra Kurniawan, S.T., M.Eng.', 'id_prodi' => 1, 'keahlian' => 'Teknik Informatika, Software Engineering', 'peran' => 'Dosen'],
            ['nidn' => 1011018030, 'nama' => 'Mega Devita Sari, S.E., M.A.', 'id_prodi' => 2, 'keahlian' => 'Ekonomi, Bisnis', 'peran' => 'Dosen'],
            ['nidn' => 1011018031, 'nama' => 'Sefri Ton, S.ST., M.M.', 'id_prodi' => 10, 'keahlian' => 'Manajemen, Pariwisata', 'peran' => 'Dosen'],
            ['nidn' => 1011018032, 'nama' => 'Galang Fajaryanto, S.S., M.Li.', 'id_prodi' => 1, 'keahlian' => 'Bahasa, Linguistik', 'peran' => 'Dosen'],
            ['nidn' => 1011018033, 'nama' => 'Khoirunisa, M.Mat', 'id_prodi' => 1, 'keahlian' => 'Matematika', 'peran' => 'Dosen'],
            ['nidn' => 1011018034, 'nama' => 'Riza Rahimi Bachtiar, S.P., M.P.', 'id_prodi' => 13, 'keahlian' => 'Agribisnis, Pertanian', 'peran' => 'Dosen'],
            ['nidn' => 1011018035, 'nama' => 'Muhammad Hilmy, S.Pd.I., M.Pd.', 'id_prodi' => 1, 'keahlian' => 'Pendidikan Agama Islam', 'peran' => 'Dosen'],
            ['nidn' => 1011018036, 'nama' => 'Nurul Alfiyah, S.E., M.Akun.', 'id_prodi' => 2, 'keahlian' => 'Akuntansi, Bisnis', 'peran' => 'Dosen'],
            ['nidn' => 1011018037, 'nama' => 'Subayil, M.Pd.', 'id_prodi' => 1, 'keahlian' => 'Pendidikan (Bahasa Indonesia/Pancasila)', 'peran' => 'Dosen'],
            ['nidn' => 1011018038, 'nama' => 'Ninik Sri Rahayu Wilujeng, S.H., M.H.', 'id_prodi' => 1, 'keahlian' => 'Hukum', 'peran' => 'Dosen'],
            ['nidn' => 1011018039, 'nama' => 'Nur Syamsi Aisyah, S.E. M.Si.', 'id_prodi' => 2, 'keahlian' => 'Ekonomi, Bisnis', 'peran' => 'Dosen'],
            ['nidn' => 1011018040, 'nama' => 'Dini Nastiti Anjarsari, S.T.P., M.P.', 'id_prodi' => 15, 'keahlian' => 'Teknologi Pertanian, Agroindustri', 'peran' => 'Dosen'],
            ['nidn' => 1011018041, 'nama' => 'Siska Aprilia Hardiyanti, S.Pd., M.Si', 'id_prodi' => 1, 'keahlian' => 'Pendidikan Sains', 'peran' => 'Dosen'],
            ['nidn' => 1011018042, 'nama' => 'Shinta Setiadevi, S.TP., M.M.', 'id_prodi' => 15, 'keahlian' => 'Manajemen Agroindustri', 'peran' => 'Dosen'],
            ['nidn' => 1011018043, 'nama' => 'Dr. Imam Mashuri, M. Pd', 'id_prodi' => 1, 'keahlian' => 'Pendidikan', 'peran' => 'Dosen'],
        ];

        foreach ($dosenData as $dosen) {
            DB::table('dosen')->insert([
                'nidn' => $dosen['nidn'],
                'nama' => $dosen['nama'],
                'id_prodi' => $dosen['id_prodi'],
                'keahlian' => $dosen['keahlian'],
                'password' => Hash::make((string)$dosen['nidn']),
                'peran' => $dosen['peran'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}