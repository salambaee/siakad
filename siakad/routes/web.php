<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminMahasiswaManagementController;
use App\Http\Controllers\Admin\AdminDosenManagementController;

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Mahasiswa Routes
Route::middleware(['auth:mahasiswa'])->prefix('mahasiswa')->group(function () {
    Route::get('/', [MahasiswaController::class, 'dashboard'])->name('mahasiswa.dashboard');
    Route::get('/krs', [MahasiswaController::class, 'krs'])->name('mahasiswa.krs');
    Route::post('/krs', [MahasiswaController::class, 'storeKrs'])->name('mahasiswa.krs.store');
    Route::get('/jadwal', [MahasiswaController::class, 'jadwal'])->name('mahasiswa.jadwal');
    Route::get('/nilai', [MahasiswaController::class, 'nilai'])->name('mahasiswa.nilai');
    Route::get('/informasi', [MahasiswaController::class, 'informasi'])->name('mahasiswa.informasi');
});

// Dosen Routes
Route::middleware(['auth:dosen'])->prefix('dosen')->group(function () {
    Route::get('/', [DosenController::class, 'dashboard'])->name('dosen.dashboard');
    Route::get('/jadwal', [DosenController::class, 'jadwal'])->name('dosen.jadwal');
    Route::get('/presensi', [DosenController::class, 'presensi'])->name('dosen.presensi');
    Route::get('/nilai', [DosenController::class, 'nilai'])->name('dosen.nilai');
    // Tambahkan route ini untuk dosen.krs jika diperlukan
    Route::get('/krs', [DosenController::class, 'krs'])->name('dosen.krs');
});

// Admin Routes
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    
    // Mahasiswa Management
    Route::get('/mahasiswa', [AdminMahasiswaManagementController::class, 'index'])->name('admin.mahasiswa.index');
    Route::get('/mahasiswa/create', [AdminMahasiswaManagementController::class, 'create'])->name('admin.mahasiswa.create');
    Route::post('/mahasiswa', [AdminMahasiswaManagementController::class, 'store'])->name('admin.mahasiswa.store');
    Route::get('/mahasiswa/{nim}/edit', [AdminMahasiswaManagementController::class, 'edit'])->name('admin.mahasiswa.edit');
    Route::put('/mahasiswa/{nim}', [AdminMahasiswaManagementController::class, 'update'])->name('admin.mahasiswa.update');
    Route::delete('/mahasiswa/{nim}', [AdminMahasiswaManagementController::class, 'destroy'])->name('admin.mahasiswa.destroy');
    
    // Dosen Management
    Route::get('/dosen', [AdminDosenManagementController::class, 'index'])->name('admin.dosen.index');
    Route::get('/dosen/create', [AdminDosenManagementController::class, 'create'])->name('admin.dosen.create');
    Route::post('/dosen', [AdminDosenManagementController::class, 'store'])->name('admin.dosen.store');
    Route::get('/dosen/{nidn}/edit', [AdminDosenManagementController::class, 'edit'])->name('admin.dosen.edit');
    Route::put('/dosen/{nidn}', [AdminDosenManagementController::class, 'update'])->name('admin.dosen.update');
    Route::delete('/dosen/{nidn}', [AdminDosenManagementController::class, 'destroy'])->name('admin.dosen.destroy');
});