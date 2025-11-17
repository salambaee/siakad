<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MahasiswaController as AdminMahasiswaController;
use App\Http\Controllers\Admin\DosenController as AdminDosenController;

// Redirect root ke login
Route::get('/', function () {
    return redirect('/login');
});

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===== MAHASISWA ROUTES =====
Route::middleware(['auth:mahasiswa'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/', [MahasiswaController::class, 'dashboard'])->name('dashboard');
    Route::get('/krs', [MahasiswaController::class, 'krs'])->name('krs');
    Route::post('/krs', [MahasiswaController::class, 'storeKrs'])->name('krs.store');
    Route::get('/jadwal', [MahasiswaController::class, 'jadwal'])->name('jadwal');
    Route::get('/nilai', [MahasiswaController::class, 'nilai'])->name('nilai');
    Route::get('/informasi', [MahasiswaController::class, 'informasi'])->name('informasi');
});

// ===== DOSEN ROUTES =====
Route::middleware(['auth:dosen'])->prefix('dosen')->name('dosen.')->group(function () {
    Route::get('/', [DosenController::class, 'dashboard'])->name('dashboard');
    Route::get('/jadwal', [DosenController::class, 'jadwal'])->name('jadwal');
    Route::get('/krs', [DosenController::class, 'krs'])->name('krs');
    Route::get('/presensi', [DosenController::class, 'presensi'])->name('presensi');
    Route::get('/nilai', [DosenController::class, 'nilai'])->name('nilai');
});

// ===== ADMIN ROUTES =====
Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Mahasiswa Management
    Route::resource('mahasiswa', AdminMahasiswaController::class)->except(['show']);

    // DIPERBAIKI: Dosen Management dengan custom routes untuk NIDN
    Route::get('/dosen', [AdminDosenController::class, 'index'])->name('dosen.index');
    Route::get('/dosen/create', [AdminDosenController::class, 'create'])->name('dosen.create');
    Route::post('/dosen', [AdminDosenController::class, 'store'])->name('dosen.store');
    Route::get('/dosen/{nidn}/edit', [AdminDosenController::class, 'edit'])->name('dosen.edit');
    Route::put('/dosen/{nidn}', [AdminDosenController::class, 'update'])->name('dosen.update');
    Route::delete('/dosen/{nidn}', [AdminDosenController::class, 'destroy'])->name('dosen.destroy');

    // Mata Kuliah (placeholder)
    Route::get('/matkul', function () {
        return view('admin.matkul.index');
    })->name('matkul.index');

    // Kelas (placeholder)
    Route::get('/kelas', function () {
        return view('admin.kelas.index');
    })->name('kelas.index');

    // Presensi (placeholder)
    Route::get('/presensi', function () {
        return view('admin.presensi.index');
    })->name('presensi.index');
});