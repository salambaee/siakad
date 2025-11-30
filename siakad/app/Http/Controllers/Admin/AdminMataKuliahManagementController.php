<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use App\Models\Prodi;
use Illuminate\Http\Request;

class AdminMataKuliahManagementController extends Controller
{
    public function index()
    {
        $mataKuliah = MataKuliah::with('prodi')->get();
        return view('admin.matkul.index', compact('mataKuliah'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        return view('admin.matkul.create', compact('prodi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|unique:mata_kuliah,kode_mk|max:10',
            'nama_mk' => 'required|string|max:100',
            'sks' => 'required|integer|min:1',
            'id_prodi' => 'required|exists:prodi,id_prodi',
        ]);

        MataKuliah::create($request->all());

        return redirect()->route('admin.matkul.index')->with('success', 'Mata Kuliah berhasil ditambahkan');
    }

    public function edit($kode_mk)
    {
        $matkul = MataKuliah::findOrFail($kode_mk);
        $prodi = Prodi::all();
        return view('admin.matkul.edit', compact('matkul', 'prodi'));
    }

    public function update(Request $request, $kode_mk)
    {
        $matkul = MataKuliah::findOrFail($kode_mk);
        
        $request->validate([
            'nama_mk' => 'required|string|max:100',
            'sks' => 'required|integer|min:1',
            'id_prodi' => 'required|exists:prodi,id_prodi',
        ]);

        $matkul->update($request->all());

        return redirect()->route('admin.matkul.index')->with('success', 'Mata Kuliah berhasil diperbarui');
    }

    public function destroy($kode_mk)
    {
        MataKuliah::where('kode_mk', $kode_mk)->delete();
        return redirect()->route('admin.matkul.index')->with('success', 'Mata Kuliah berhasil dihapus');
    }
}