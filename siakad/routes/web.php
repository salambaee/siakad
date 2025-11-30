<?php

use Illuminate\Support\Facades\Route;
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
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth:mahasiswa'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/', [MahasiswaController::class, 'dashboard'])->name('dashboard');
    Route::get('/krs', [MahasiswaController::class, 'krs'])->name('krs');
    Route::post('/krs', [MahasiswaController::class, 'storeKrs'])->name('krs.store');
    Route::get('/jadwal', [MahasiswaController::class, 'jadwal'])->name('jadwal');
    Route::get('/nilai', [MahasiswaController::class, 'nilai'])->name('nilai');
    Route::get('/informasi', [MahasiswaController::class, 'informasi'])->name('informasi');
});

Route::middleware(['auth:dosen'])->prefix('dosen')->name('dosen.')->group(function () {
    Route::get('/', [DosenController::class, 'dashboard'])->name('dashboard');
    Route::get('/jadwal', [DosenController::class, 'jadwal'])->name('jadwal');
    Route::get('/krs', [DosenController::class, 'krs'])->name('krs');
    Route::post('/krs/update-status', [DosenController::class, 'updateKrsStatus'])->name('krs.updateStatus');
    Route::get('/presensi', [DosenController::class, 'presensi'])->name('presensi');
    Route::get('/nilai', [DosenController::class, 'nilai'])->name('nilai');
});

Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('mahasiswa', AdminMahasiswaController::class)->except(['show']);
    Route::resource('dosen', AdminDosenController::class)->except(['show']);
    Route::get('/matkul', function () {
        return view('admin.matkul.index');
    })->name('matkul.index');
    Route::get('/kelas', function () {
        return view('admin.kelas.index');
    })->name('kelas.index');
    Route::get('/presensi', function () {
        return view('admin.presensi.index');
    })->name('presensi.index');
});