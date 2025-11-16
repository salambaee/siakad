<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Krs;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    public function dashboard()
    {
        return view('dosen.dashboard');
    }

    public function jadwal()
    {
        // Ganti 'nidn' dengan key yang sesuai dari Auth::user()
        $nidn = Auth::user()->nidn; 
        
        $jadwals = Jadwal::with('matkul')
                        ->where('nidn', $nidn)
                        ->get();

        return view('dosen.jadwal', compact('jadwals'));
    }

    public function krs()
    {
        // Logika untuk Dosen Wali (DPA)
        return view('dosen.krs');
    }

    public function presensi()
    {
        return view('dosen.presensi');
    }

    public function nilai()
    {
        return view('dosen.nilai');
    }
}