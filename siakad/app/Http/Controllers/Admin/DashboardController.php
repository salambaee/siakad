<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Matkul;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'title' => 'Dashboard Admin',
            'countMahasiswa' => Mahasiswa::count(),
            'countDosen' => Dosen::count(),
            'countMatkul' => Matkul::count(),
        ]);
    }
}
