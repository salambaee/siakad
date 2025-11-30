<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminDosenManagementController extends Controller
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
            'nidn' => 'required|numeric|unique:dosen,nidn',
            'nama' => 'required|string|max:45',
            'id_prodi' => 'required|exists:prodi,id_prodi',
            'keahlian' => 'nullable|string|max:45',
            'peran' => 'nullable|string|max:45',
        ]);

        Dosen::create([
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'id_prodi' => $request->id_prodi,
            'keahlian' => $request->keahlian,
            'peran' => $request->peran ?? 'Dosen',
            'password' => Hash::make((string)$request->nidn),
        ]);

        return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil ditambahkan');
    }

    public function edit($nidn)
    {
        $dosen = Dosen::findOrFail($nidn);
        $prodi = Prodi::all();
        return view('admin.dosen.edit', compact('dosen', 'prodi'));
    }

    public function update(Request $request, $nidn)
    {
        $dosen = Dosen::findOrFail($nidn);

        $request->validate([
            'nama' => 'required|string|max:45',
            'id_prodi' => 'required|exists:prodi,id_prodi',
            'keahlian' => 'nullable|string|max:45',
            'peran' => 'nullable|string|max:45',
            'password' => 'nullable|string|min:6',
        ]);

        $data = $request->only(['nama', 'id_prodi', 'keahlian', 'peran']);
        
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $dosen->update($data);

        return redirect()->route('admin.dosen.index')->with('success', 'Data dosen berhasil diupdate');
    }

    public function destroy($nidn)
    {
        $dosen = Dosen::findOrFail($nidn);
        $dosen->delete();

        return redirect()->route('admin.dosen.index')->with('success', 'Dosen berhasil dihapus');
    }
}