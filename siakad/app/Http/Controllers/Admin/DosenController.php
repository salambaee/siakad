<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Prodi;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::with('prodi')->get();
        return view('admin.dosen.index', compact('dosen'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        return view('admin.dosen.create', compact('prodi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:dosen,nidn',
            'nama' => 'required|string|max:45',
            'id_prodi' => 'required|exists:prodi,id_prodi',
            'keahlian' => 'nullable|string|max:45',
            'password' => 'nullable|string|min:4',
            'peran' => 'nullable|string|max:45',
        ]);

        Dosen::create([
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'id_prodi' => $request->id_prodi,
            'keahlian' => $request->keahlian,
            'peran' => $request->peran ?? 'Dosen',
            'password' => $request->password ? bcrypt($request->password) : null,
        ]);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambahkan.');
    }

    public function edit(Dosen $dosen)
    {
        $prodi = Prodi::all();
        return view('admin.dosen.edit', compact('dosen', 'prodi'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $dosen->update([
            'nama' => $request->nama,
            'id_prodi' => $request->id_prodi,
            'keahlian' => $request->keahlian,
            'peran' => $request->peran,
            'password' => $request->password ? bcrypt($request->password) : $dosen->password
        ]);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil diupdate.');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus.');
    }
}
