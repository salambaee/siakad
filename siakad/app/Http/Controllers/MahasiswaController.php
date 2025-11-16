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
    private function getNim()
    {
        if (Auth::check()) {
            return Auth::user()->nim;
        }
        
        return 362458302034; 
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
                    ->groupBy('semester');

        return view('mahasiswa.nilai', compact('khs'));
    }

    public function informasi()
    {
        $nim = $this->getNim();
        $krs = Krs::with('jadwal.matkul', 'nilai')
                    ->where('nim', $nim)
                    ->get();
        
        $ipk = 0;

        return view('mahasiswa.informasi', compact('krs', 'ipk'));
    }
}