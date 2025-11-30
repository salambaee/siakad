<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Jadwal;
use App\Models\Krs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    private function getMahasiswa()
    {
        return Auth::guard('mahasiswa')->user();
    }

    public function dashboard()
    {
        $mahasiswa = $this->getMahasiswa()->load('prodi');
        return view('mahasiswa.dashboard', compact('mahasiswa'));
    }

    public function krs()
    {
        $mahasiswa = $this->getMahasiswa()->load('prodi');
        
        $jadwalsTersedia = Jadwal::with(['matkul', 'dosen'])
            ->whereHas('matkul', function ($query) use ($mahasiswa) {
                $query->where('id_prodi', $mahasiswa->id_prodi);
            })
            ->get();

        $krsDiambil = Krs::where('nim', $mahasiswa->nim)
                        ->pluck('id_jadwal')
                        ->toArray();

        return view('mahasiswa.krs', compact('jadwalsTersedia', 'krsDiambil', 'mahasiswa'));
    }

    public function storeKrs(Request $request)
    {
        $mahasiswa = $this->getMahasiswa();
        
        $request->validate([
            'id_jadwal' => 'required|array',
            'id_jadwal.*' => 'exists:jadwal,id_jadwal',
            'semester' => 'nullable|string',
            'tahun_ajaran' => 'nullable|string',
        ]);

        $semester = $request->semester ?? 'Ganjil';
        $tahunAjaran = $request->tahun_ajaran ?? '2024/2025';

        DB::transaction(function () use ($mahasiswa, $request, $semester, $tahunAjaran) {
            Krs::where('nim', $mahasiswa->nim)
                ->where('semester', $semester)
                ->where('tahun_ajaran', $tahunAjaran)
                ->delete();

            foreach ($request->id_jadwal as $jadwalId) {
                Krs::create([
                    'nim' => $mahasiswa->nim,
                    'id_jadwal' => $jadwalId,
                    'semester' => $semester,
                    'tahun_ajaran' => $tahunAjaran,
                    'status' => 'Pending',
                ]);
            }
        });

        return redirect()->route('mahasiswa.krs')->with('success', 'KRS berhasil diajukan!');
    }

    public function jadwal()
    {
        $nim = $this->getMahasiswa()->nim;
        $jadwals = Krs::with(['jadwal.matkul', 'jadwal.dosen'])
                    ->where('nim', $nim)
                    ->where('status', 'Disetujui')
                    ->get();

        return view('mahasiswa.jadwal', compact('jadwals'));
    }

    public function nilai()
    {
        $nim = $this->getMahasiswa()->nim;
        $khs = Krs::with(['jadwal.matkul', 'nilai'])
                    ->where('nim', $nim)
                    ->get()
                    ->groupBy('semester');

        return view('mahasiswa.nilai', compact('khs'));
    }

    public function informasi()
    {
        $mahasiswa = $this->getMahasiswa()->load('prodi');
        
        $krs = Krs::with(['jadwal.matkul', 'nilai'])
                    ->where('nim', $mahasiswa->nim)
                    ->get();

        $totalSks = 0;
        $totalBobot = 0;

        foreach ($krs as $item) {
            if ($item->nilai && $item->nilai->nilai_angka !== null) {
                $sks = $item->jadwal->matkul->sks ?? 0;
                $totalSks += $sks;
                $totalBobot += ($sks * $item->nilai->nilai_angka);
            }
        }

        $ipk = $totalSks > 0 ? round($totalBobot / $totalSks, 2) : 0.00;

        return view('mahasiswa.informasi', compact('mahasiswa', 'krs', 'ipk', 'totalSks'));
    }
}