<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Prodi;
use Illuminate\Support\Facades\Hash;

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
        $validated = $request->validate([
            'nidn' => 'required|numeric|unique:dosen,nidn',
            'nama' => 'required|string|max:100',
            'id_prodi' => 'nullable|exists:prodi,id_prodi',
            'keahlian' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:4',
            'peran' => 'nullable|string|max:45',
        ]);

        Dosen::create([
            'nidn' => (int) $validated['nidn'],
            'nama' => $validated['nama'],
            'id_prodi' => $validated['id_prodi'] ?? null,
            'keahlian' => $validated['keahlian'] ?? null,
            'peran' => $validated['peran'] ?? 'Dosen',
            'password' => isset($validated['password']) ? Hash::make($validated['password']) : null,
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
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'id_prodi' => 'nullable|exists:prodi,id_prodi',
            'keahlian' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:4',
            'peran' => 'nullable|string|max:45',
        ]);

        $dosen->update([
            'nama' => $validated['nama'],
            'id_prodi' => $validated['id_prodi'] ?? null,
            'keahlian' => $validated['keahlian'] ?? null,
            'peran' => $validated['peran'] ?? $dosen->peran,
            'password' => isset($validated['password']) ? Hash::make($validated['password']) : $dosen->password,
        ]);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil diupdate.');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil dihapus.');
    }
}
