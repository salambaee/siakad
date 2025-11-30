<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Krs;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function approveKrs($id)
    {
        $krs = Krs::findOrFail($id);
        $krs->update(['status' => 'Disetujui']);

        return back()->with('success', 'KRS berhasil disetujui.');
    }

    public function rejectKrs($id)
    {
        $krs = Krs::findOrFail($id);
        $krs->update(['status' => 'Ditolak']);

        return back()->with('success', 'KRS berhasil ditolak.');
    }

    public function presensi()
    {
        $nidn = Auth::guard('dosen')->user()->nidn;
        
        try {
            $kelas = Kelas::where('nidn', $nidn)
                     ->with('mataKuliah')
                     ->get();
        } catch (\Exception $e) {
            $kelas = collect();
        }
        
        $mataKuliah = MataKuliah::all();

        return view('dosen.presensi', compact('kelas', 'mataKuliah'));
    }

    public function storeKelas(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|exists:mata_kuliah,kode_mk',
            'kelas' => 'required|string',
            'hari' => 'required|string',
            'jam_mulai' => 'required|string',
            'jam_selesai' => 'required|string',
            'ruang' => 'required|string',
        ]);

        try {
            Kelas::create([
                'nidn' => Auth::guard('dosen')->user()->nidn,
                'kode_mk' => $request->kode_mk,
                'kelas' => $request->kelas,
                'hari' => $request->hari,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'ruang' => $request->ruang,
            ]);

            return redirect()->route('dosen.presensi')->with('success', 'Kelas berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('dosen.presensi')->with('error', 'Gagal menambahkan kelas.');
        }
    }

    public function nilai(Request $request)
    {
        $nidn = Auth::guard('dosen')->user()->nidn;
        
        // Gunakan kode mata kuliah yang ada di seeder
        $kelas = collect([
            (object)[
                'id' => 1,
                'mataKuliah' => (object)['nama_mk' => 'Pemrograman Dasar'],
                'kelas' => 'TRPL 2D',
                'kode_mk' => 'IF101'
            ],
            (object)[
                'id' => 2,
                'mataKuliah' => (object)['nama_mk' => 'Basis Data'],
                'kelas' => 'TRPL 2D', 
                'kode_mk' => 'IF102'
            ],
            (object)[
                'id' => 3,
                'mataKuliah' => (object)['nama_mk' => 'Jaringan Komputer'],
                'kelas' => 'TRPL 2D',
                'kode_mk' => 'IF103'
            ]
        ]);
        
        $selectedKelas = null;
        $mahasiswa = collect();

        if ($request->has('kelas_id')) {
            $selectedKelas = $kelas->firstWhere('id', $request->kelas_id);
            
            if ($selectedKelas) {
                $mahasiswa = Mahasiswa::where('id_prodi', 1)
                    ->limit(10)
                    ->get()
                    ->map(function ($mhs) use ($selectedKelas) {
                        $nilai = DB::table('nilai')
                            ->where('nim', $mhs->nim)
                            ->where('kode_mk', $selectedKelas->kode_mk)
                            ->first();
                        
                        $mhs->nilai_data = $nilai;
                        return $mhs;
                    });
            }
        }

        return view('dosen.nilai', compact('kelas', 'selectedKelas', 'mahasiswa'));
    }

    public function simpanNilai(Request $request)
    {
        $request->validate([
            'nim' => 'required|exists:mahasiswa,nim',
            'kelas_id' => 'required',
            'nilai_tugas' => 'required|numeric|between:0,100',
            'nilai_uts' => 'required|numeric|between:0,100',
            'nilai_uas' => 'required|numeric|between:0,100',
        ]);

        try {
            $nilai_akhir = ($request->nilai_tugas * 0.3) + 
                          ($request->nilai_uts * 0.3) + 
                          ($request->nilai_uas * 0.4);

            $nilai_huruf = $this->konversiNilaiHuruf($nilai_akhir);

            // Gunakan kode mata kuliah berdasarkan kelas yang dipilih
            $kode_mk = '';
            if ($request->kelas_id == 1) {
                $kode_mk = 'IF101'; // Pemrograman Dasar
            } elseif ($request->kelas_id == 2) {
                $kode_mk = 'IF102'; // Basis Data
            } elseif ($request->kelas_id == 3) {
                $kode_mk = 'IF103'; // Jaringan Komputer
            }

            DB::table('nilai')->updateOrInsert(
                [
                    'nim' => $request->nim,
                    'kode_mk' => $kode_mk,
                ],
                [
                    'nilai_tugas' => $request->nilai_tugas,
                    'nilai_uts' => $request->nilai_uts,
                    'nilai_uas' => $request->nilai_uas,
                    'nilai_akhir' => $nilai_akhir,
                    'nilai_huruf' => $nilai_huruf,
                    'is_final' => false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );

            return back()->with('success', 'Nilai berhasil disimpan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menyimpan nilai: ' . $e->getMessage());
        }
    }

    public function kirimNilaiFinal(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required',
        ]);

        try {
            // Gunakan kode mata kuliah berdasarkan kelas yang dipilih
            $kode_mk = '';
            if ($request->kelas_id == 1) {
                $kode_mk = 'IF101'; // Pemrograman Dasar
            } elseif ($request->kelas_id == 2) {
                $kode_mk = 'IF102'; // Basis Data
            } elseif ($request->kelas_id == 3) {
                $kode_mk = 'IF103'; // Jaringan Komputer
            }

            DB::table('nilai')
                ->where('kode_mk', $kode_mk)
                ->update(['is_final' => true]);

            return back()->with('success', 'Nilai final berhasil dikirim.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengirim nilai final: ' . $e->getMessage());
        }
    }

    private function konversiNilaiHuruf($nilai)
    {
        if ($nilai >= 85) return 'A';
        if ($nilai >= 80) return 'A-';
        if ($nilai >= 75) return 'B+';
        if ($nilai >= 70) return 'B';
        if ($nilai >= 65) return 'B-';
        if ($nilai >= 60) return 'C+';
        if ($nilai >= 55) return 'C';
        if ($nilai >= 50) return 'C-';
        if ($nilai >= 40) return 'D';
        return 'E';
    }
}