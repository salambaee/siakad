<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;

class AdminPresensiManagementController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with(['matkul', 'dosen'])->get();
        
        return view('admin.presensi.index', compact('jadwal'));
    }
    
    public function create()
    {
        return view('admin.presensi.input');
    }

    public function rekap()
    {
        return view('admin.presensi.rekap');
    }
}