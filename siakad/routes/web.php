<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminMahasiswaManagementController;
use App\Http\Controllers\Admin\AdminDosenManagementController;
use App\Http\Controllers\Admin\AdminMataKuliahManagementController;
use App\Http\Controllers\Admin\AdminJadwalManagementController;
use App\Http\Controllers\Admin\AdminPresensiManagementController; // Controller Baru

Route::get('/', function () { return redirect()->route('login'); });
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
    Route::get('/presensi', [DosenController::class, 'presensi'])->name('presensi');
    Route::get('/nilai', [DosenController::class, 'nilai'])->name('nilai');
    Route::get('/krs', [DosenController::class, 'krs'])->name('krs');
});

Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('mahasiswa', AdminMahasiswaManagementController::class)->parameters(['mahasiswa' => 'nim']);
    Route::resource('dosen', AdminDosenManagementController::class)->parameters(['dosen' => 'nidn']);
    Route::resource('kelas', AdminJadwalManagementController::class);

    // Route Manajemen Presensi (Yang sebelumnya hilang)
    Route::controller(AdminPresensiManagementController::class)->prefix('presensi')->name('presensi.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}/input', 'input')->name('input');
        Route::post('/{id}/store', 'store')->name('store');
        Route::get('/{id}/rekap', 'rekap')->name('rekap');
    });

    Route::controller(AdminMataKuliahManagementController::class)->prefix('matkul')->name('matkul.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{kode_mk}/edit', 'edit')->name('edit');
        Route::put('/{kode_mk}', 'update')->name('update');
        Route::delete('/{kode_mk}', 'destroy')->name('destroy');
    });
});