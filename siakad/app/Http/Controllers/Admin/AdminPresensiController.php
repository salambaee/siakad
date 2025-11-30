<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class AdminPresensiManagementController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with(['matkul', 'dosen'])->get();
        return view('admin.presensi.index', compact('jadwal'));
    }

    public function input($id)
    {
        $jadwal = Jadwal::with(['matkul', 'dosen', 'krs.mahasiswa'])->findOrFail($id);
        return view('admin.presensi.input', compact('jadwal'));
    }

    public function store(Request $request, $id)
    {
        return redirect()->back()->with('success', 'Presensi berhasil disimpan (Simulasi)');
    }

    public function rekap($id)
    {
        $jadwal = Jadwal::with(['matkul', 'dosen'])->findOrFail($id);
        return view('admin.presensi.rekap', compact('jadwal'));
    }
}