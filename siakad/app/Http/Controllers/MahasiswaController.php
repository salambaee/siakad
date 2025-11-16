<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Jadwal;
use App\Models\Krs;
use App\Models\Matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    /**
     * Mendapatkan NIM. Prioritaskan user yang login,
     * jika tidak ada, gunakan NIM hardcode untuk testing.
     */
    private function getNim()
    {
        if (Auth::check()) {
            return Auth::user()->nim;
        }
        
        // Ganti NIM ini jika Anda ingin menguji mahasiswa lain
        return 362458302034; // NIM Heri Herlambang (dari MahasiswaSeeder)
    }

    public function dashboard()
    {
        $nim = $this->getNim();
        $mahasiswa = Mahasiswa::find($nim);
        
        return view('mahasiswa.dashboard', compact('mahasiswa'));
    }

    public function krs()
    {
        $nim = $this->getNim();
        $mahasiswa = Mahasiswa::with('prodi')->find($nim);

        // Jika mahasiswa tidak ditemukan (NIM hardcode salah)
        if (!$mahasiswa) {
            abort(404, "Mahasiswa dengan NIM $nim tidak ditemukan.");
        }

        $jadwalsTersedia = Jadwal::with('matkul', 'dosen')
            ->whereHas('matkul', function ($query) use ($mahasiswa) {
                $query->where('id_prodi', $mahasiswa->id_prodi);
            })
            ->get();
            
        $krsDiambil = Krs::where('nim', $nim)
                        ->pluck('id_jadwal')
                        ->all();

        return view('mahasiswa.krs', compact('jadwalsTersedia', 'krsDiambil'));
    }

    public function jadwal()
    {
        $nim = $this->getNim();
        $jadwals = Krs::with('jadwal.matkul', 'jadwal.dosen')
                    ->where('nim', $nim)
                    ->get();

        return view('mahasiswa.jadwal', compact('jadwals'));
    }

    public function nilai()
    {
        $nim = $this->getNim();
        $khs = Krs::with('jadwal.matkul', 'nilai')
                    ->where('nim', $nim)
                    ->get()
                    ->groupBy('semester'); // 'semester' mungkin null, perlu penanganan

        return view('mahasiswa.nilai', compact('khs'));
    }

    public function informasi()
    {
        $nim = $this->getNim();
        $krs = Krs::with('jadwal.matkul', 'nilai')
                    ->where('nim', $nim)
                    ->get();
        
        $ipk = 0; // Tambahkan logika hitung IPK di sini

        return view('mahasiswa.informasi', compact('krs', 'ipk'));
    }
}