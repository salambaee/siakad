<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MahasiswaController as AdminMahasiswaController;
use App\Http\Controllers\Admin\DosenController as AdminDosenController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:mahasiswa'])->prefix('mahasiswa')->group(function () {
    Route::get('/', [MahasiswaController::class, 'dashboard'])->name('mahasiswa.dashboard');
    Route::get('/krs', [MahasiswaController::class, 'krs'])->name('mahasiswa.krs');
    Route::post('/krs', [MahasiswaController::class, 'storeKrs'])->name('mahasiswa.krs.store');
    Route::get('/jadwal', [MahasiswaController::class, 'jadwal'])->name('mahasiswa.jadwal');
    Route::get('/nilai', [MahasiswaController::class, 'nilai'])->name('mahasiswa.nilai');
    Route::get('/informasi', [MahasiswaController::class, 'informasi'])->name('mahasiswa.informasi');
});

Route::middleware(['auth:dosen'])->prefix('dosen')->group(function () {
    Route::get('/', [DosenController::class, 'dashboard'])->name('dosen.dashboard');
    Route::get('/jadwal', [DosenController::class, 'jadwal'])->name('dosen.jadwal');
    Route::get('/krs', [DosenController::class, 'krs'])->name('dosen.krs');
    Route::get('/presensi', [DosenController::class, 'presensi'])->name('dosen.presensi');
    Route::get('/nilai', [DosenController::class, 'nilai'])->name('dosen.nilai');
});

Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('mahasiswa', AdminMahasiswaController::class)->except(['show']);

    Route::resource('dosen', AdminDosenController::class)->parameters([
        'dosen' => 'dosen:nidn'
    ])->except(['show']);

    Route::get('/matkul', function () {
        return view('admin.matkul.index');
    });

    Route::get('/kelas', function () {
        return view('admin.kelas.index');
    });

    Route::get('/presensi', function () {
        return view('admin.presensi.index');
    });
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');