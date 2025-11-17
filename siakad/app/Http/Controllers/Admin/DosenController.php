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
        // DIPERBAIKI: Validasi NIDN harus 10 digit
        $validated = $request->validate([
            'nidn' => 'required|numeric|digits:10|unique:dosen,nidn',
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
            // DIPERBAIKI: Password default = NIDN jika tidak diisi
            'password' => isset($validated['password']) && !empty($validated['password'])
                ? Hash::make($validated['password'])
                : Hash::make($validated['nidn']),
        ]);

        return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil ditambahkan.');
    }

    // DIPERBAIKI: Gunakan parameter NIDN manual
    public function edit($nidn)
    {
        $dosen = Dosen::findOrFail($nidn);
        $prodi = Prodi::all();
        return view('admin.dosen.edit', compact('dosen', 'prodi'));
    }

    // DIPERBAIKI: Gunakan parameter NIDN manual
    public function update(Request $request, $nidn)
    {
        $dosen = Dosen::findOrFail($nidn);

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
            // DIPERBAIKI: Hanya update password jika diisi
            'password' => isset($validated['password']) && !empty($validated['password'])
                ? Hash::make($validated['password'])
                : $dosen->password,
        ]);

        return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil diupdate.');
    }

    // DIPERBAIKI: Gunakan parameter NIDN manual
    public function destroy($nidn)
    {
        $dosen = Dosen::findOrFail($nidn);
        $dosen->delete();
        return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil dihapus.');
    }
}