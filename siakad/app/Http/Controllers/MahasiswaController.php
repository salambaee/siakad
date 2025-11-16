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
        // ✅ FIXED: Tidak ada hardcoded value
        if (Auth::guard('mahasiswa')->check()) {
            return Auth::guard('mahasiswa')->user()->nim;
        }
        
        abort(401, 'Unauthorized');
    }

    public function dashboard()
    {
        $nim = $this->getNim();
        $mahasiswa = Mahasiswa::with('prodi')->find($nim);

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

        return view('mahasiswa.krs', compact('jadwalsTersedia', 'krsDiambil', 'mahasiswa'));
    }

    public function storeKrs(Request $request)
    {
        $nim = $this->getNim();
        
        $request->validate([
            'id_jadwal' => 'required|array',
            'id_jadwal.*' => 'exists:jadwal,id_jadwal',
        ]);

        // Hapus KRS lama untuk semester ini
        Krs::where('nim', $nim)
            ->where('semester', $request->semester ?? 'Ganjil')
            ->where('tahun_ajaran', $request->tahun_ajaran ?? '2024/2025')
            ->delete();

        // Insert KRS baru
        foreach ($request->id_jadwal as $jadwalId) {
            Krs::create([
                'nim' => $nim,
                'id_jadwal' => $jadwalId,
                'semester' => $request->semester ?? 'Ganjil',
                'tahun_ajaran' => $request->tahun_ajaran ?? '2024/2025',
                'status' => 'Pending',
            ]);
        }

        return redirect()->route('mahasiswa.krs')->with('success', 'KRS berhasil diajukan!');
    }

    public function jadwal()
    {
        $nim = $this->getNim();
        $jadwals = Krs::with('jadwal.matkul', 'jadwal.dosen')
                    ->where('nim', $nim)
                    ->where('status', 'Disetujui')
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
        $mahasiswa = Mahasiswa::with('prodi')->find($nim);
        
        $krs = Krs::with('jadwal.matkul', 'nilai')
                    ->where('nim', $nim)
                    ->get();

        // Hitung IPK
        $totalSks = 0;
        $totalBobot = 0;

        foreach ($krs as $item) {
            if ($item->nilai && $item->nilai->nilai_angka) {
                $sks = $item->jadwal->matkul->sks ?? 0;
                $totalSks += $sks;
                $totalBobot += ($sks * $item->nilai->nilai_angka);
            }
        }

        $ipk = $totalSks > 0 ? round($totalBobot / $totalSks, 2) : 0;

        return view('mahasiswa.informasi', compact('mahasiswa', 'krs', 'ipk'));
    }
}