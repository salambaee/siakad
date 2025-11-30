<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Krs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    public function dashboard()
    {
        $dosen = Auth::guard('dosen')->user();
        return view('dosen.dashboard', compact('dosen'));
    }

    public function jadwal()
    {
        $nidn = Auth::guard('dosen')->user()->nidn;
        $jadwals = Jadwal::with('matkul')
                    ->where('nidn', $nidn)
                    ->get();
        
        return view('dosen.jadwal', compact('jadwals'));
    }

    public function krs()
    {
        $nidn = Auth::guard('dosen')->user()->nidn;
        $krs = Krs::with(['jadwal.matkul', 'mahasiswa'])
                 ->whereHas('jadwal', function($query) use ($nidn) {
                     $query->where('nidn', $nidn);
                 })
                 ->get();
        
        return view('dosen.krs', compact('krs'));
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