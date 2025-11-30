<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\MataKuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class AdminJadwalManagementController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with(['matkul', 'dosen'])->get();
        return view('admin.kelas.index', compact('jadwal'));
    }

    public function create()
    {
        $matkul = MataKuliah::all();
        $dosen = Dosen::all();
        return view('admin.kelas.create', compact('matkul', 'dosen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|exists:mata_kuliah,kode_mk',
            'nidn' => 'required|exists:dosen,nidn',
            'hari' => 'required|string',
            'jam' => 'required|string',
            'ruang' => 'required|string',
        ]);

        Jadwal::create($request->all());

        return redirect()->route('admin.kelas.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $matkul = MataKuliah::all();
        $dosen = Dosen::all();
        return view('admin.kelas.edit', compact('jadwal', 'matkul', 'dosen'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $request->validate([
            'kode_mk' => 'required|exists:mata_kuliah,kode_mk',
            'nidn' => 'required|exists:dosen,nidn',
            'hari' => 'required|string',
            'jam' => 'required|string',
            'ruang' => 'required|string',
        ]);

        $jadwal->update($request->all());

        return redirect()->route('admin.kelas.index')->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroy($id)
    {
        Jadwal::destroy($id);
        return redirect()->route('admin.kelas.index')->with('success', 'Jadwal berhasil dihapus');
    }
}