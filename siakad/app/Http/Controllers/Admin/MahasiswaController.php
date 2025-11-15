<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::all();
        return view('admin.mahasiswa.index', compact('data'));
    }

    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    public function store(Request $request)
    {
        Mahasiswa::create($request->all());
        return redirect('/admin/mahasiswa')->with('success', 'Mahasiswa ditambahkan');
    }

    public function edit($id)
    {
        $m = Mahasiswa::findOrFail($id);
        return view('admin.mahasiswa.edit', compact('m'));
    }

    public function update(Request $request, $id)
    {
        Mahasiswa::findOrFail($id)->update($request->all());
        return redirect('/admin/mahasiswa')->with('success', 'Mahasiswa diupdate');
    }

    public function destroy($id)
    {
        Mahasiswa::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Mahasiswa dihapus');
    }
}
