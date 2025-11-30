<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with('prodi')->get();
        return view('admin.mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        return view('admin.mahasiswa.create', compact('prodi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|numeric|unique:mahasiswa,nim',
            'nama' => 'required|string|max:100',
            'id_prodi' => 'required|exists:prodi,id_prodi',
            'angkatan' => 'required|digits:4',
        ]);
        Mahasiswa::create([
            'nim' => (int) $validated['nim'],
            'nama' => $validated['nama'],
            'id_prodi' => $validated['id_prodi'],
            'angkatan' => $validated['angkatan'],
            'password' => Hash::make((string)$validated['nim']),
        ]);
        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        $prodi = Prodi::all();
        return view('admin.mahasiswa.edit', compact('mahasiswa', 'prodi'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'id_prodi' => 'required|exists:prodi,id_prodi',
            'angkatan' => 'required|digits:4',
        ]);
        $mahasiswa->update([
            'nama' => $validated['nama'],
            'id_prodi' => $validated['id_prodi'],
            'angkatan' => $validated['angkatan'],
        ]);
        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil diupdate.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}