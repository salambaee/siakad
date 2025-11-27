<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MahasiswaController as AdminMahasiswaController;
use App\Http\Controllers\Admin\DosenController as AdminDosenController;

Route::get('/', function () {
    return redirect('/login');
});

// AUTH
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



/*

ROUTE MAHASISWA

*/

Route::middleware(['auth:mahasiswa'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {

    // Dashboard
    Route::get('/', [MahasiswaController::class, 'dashboard'])->name('dashboard');

    // KRS
    Route::get('/krs', [MahasiswaController::class, 'krs'])->name('krs');
    Route::post('/krs', [MahasiswaController::class, 'storeKrs'])->name('krs.store');

    // Jadwal
    Route::get('/jadwal', [MahasiswaController::class, 'jadwal'])->name('jadwal');

    // Nilai / KHS
    Route::get('/nilai', [MahasiswaController::class, 'nilai'])->name('nilai');

    // CETAK KHS (TAMBAHAN)
    Route::get('/nilai/print/{id}', function ($id) {
        $mhs = DB::table('mahasiswa')->where('id', $id)->first();
        $nilai = DB::table('nilai')->where('mahasiswa_id', $id)->get();
        return view('mahasiswa.khs_print', compact('mhs', 'nilai'));
    })->name('nilai.print');

    // Informasi Akun (TAMBAHAN)
    Route::get('/informasi', [MahasiswaController::class, 'informasi'])->name('informasi');
});



/*

ROUTE DOSEN

*/

Route::middleware(['auth:dosen'])->prefix('dosen')->name('dosen.')->group(function () {
    Route::get('/', [DosenController::class, 'dashboard'])->name('dashboard');
    Route::get('/jadwal', [DosenController::class, 'jadwal'])->name('jadwal');
    Route::get('/krs', [DosenController::class, 'krs'])->name('krs');
    Route::post('/krs/update-status', [DosenController::class, 'updateKrsStatus'])->name('krs.updateStatus');
    Route::get('/presensi', [DosenController::class, 'presensi'])->name('presensi');
    Route::get('/nilai', [DosenController::class, 'nilai'])->name('nilai');
});



/*

ROUTE ADMIN

*/

Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {

    // DASHBOARD DENGAN TOTAL DATA (TAMBAHAN)
    Route::get('/', function () {
        $totalMahasiswa = DB::table('mahasiswa')->count();
        $totalDosen     = DB::table('dosen')->count();
        $totalMatkul    = DB::table('matkul')->count();
        return view('admin.dashboard', compact('totalMahasiswa', 'totalDosen', 'totalMatkul'));
    })->name('dashboard');

    // CRUD Mahasiswa
    Route::resource('mahasiswa', AdminMahasiswaController::class)->except(['show']);

    // CRUD Dosen
    Route::resource('dosen', AdminDosenController::class)->except(['show']);

    // MATKUL (VIEW FIX)
    Route::get('/matkul', function () {
        return view('admin.matkul.index');
    })->name('matkul.index');

    // KELAS
    Route::get('/kelas', function () {
        return view('admin.kelas.index');
    })->name('kelas.index');

    // PRESENSI
    Route::get('/presensi', function () {
        return view('admin.presensi.index');
    })->name('presensi.index');
});
