<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Krs;
use App\Models\Nilai;
use App\Models\Mahasiswa;
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
        $nidn = Auth::user()->nidn;
        $jadwals = Jadwal::with('matkul')
                        ->where('nidn', $nidn)
                        ->get();
        return view('dosen.jadwal', compact('jadwals'));
    }

    public function krs(Request $request)
    {
        $mahasiswaId = $request->query('mahasiswa_id');
        $mahasiswaList = Mahasiswa::orderBy('nama', 'asc')->get();
        $mahasiswaDetail = null;
        $krsMahasiswa = null;

        if ($mahasiswaId) {
            $mahasiswaDetail = Mahasiswa::find($mahasiswaId);
            $krsMahasiswa = Krs::with('jadwal.matkul', 'jadwal.dosen')
                                ->where('nim', $mahasiswaId)
                                ->where('status', 'Pending')
                                ->get();
        }

        return view('dosen.krs', compact('mahasiswaList', 'mahasiswaDetail', 'krsMahasiswa'));
    }

    public function updateKrsStatus(Request $request)
    {
        $request->validate([
            'nim' => 'required|numeric|exists:mahasiswa,nim',
            'status' => 'required|string|in:Disetujui,Ditolak',
        ]);

        $nim = $request->nim;
        $status = $request->status;

        Krs::where('nim', $nim)
            ->where('status', 'Pending')
            ->update(['status' => $status]);

        return redirect()->route('dosen.krs', ['mahasiswa_id' => $nim])
                         ->with('success', 'Status KRS berhasil diupdate!');
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