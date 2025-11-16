<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\MahasiswaController;

Route::view('/dosen', 'dosen.dashboard')->name('dosen.dashboard');
Route::view('/dosen/jadwal', 'dosen.jadwal')->name('dosen.jadwal');
Route::view('/dosen/krs', 'dosen.krs')->name('dosen.krs');
Route::view('/dosen/presensi', 'dosen.presensi')->name('dosen.presensi');

Route::prefix('admin')->group(function () {
    Route::resource('dosen', DosenController::class);
});

Route::prefix('admin')->group(function () {
    Route::resource('mahasiswa', MahasiswaController::class);
});

// Rute untuk Mahasiswa (Menggunakan Route::view)
Route::prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    // Redirect /mahasiswa ke /mahasiswa/dashboard
    Route::get('/', function () {
        return redirect()->route('mahasiswa.dashboard');
    });

    Route::view('dashboard', 'mahasiswa.dashboard')->name('dashboard');
    Route::view('krs', 'mahasiswa.krs')->name('krs');
    // Route::post('krs', [KrsController::class, 'store'])->name('krs.store'); // Dihapus sementara
    Route::view('jadwal', 'mahasiswa.jadwal')->name('jadwal');
    Route::view('nilai', 'mahasiswa.nilai')->name('nilai');
});

// Rute untuk Admin
Route::prefix('admin')->name('admin.')->group(function () {
    // Redirect /admin ke /admin/dosen (atau rute default admin lainnya)
    Route::get('/', function () {
        return redirect()->route('admin.dosen.index');
    });

    // Matkul
    Route::view('matkul', 'admin.matkul.index')->name('matkul.index');
    Route::view('matkul/create', 'admin.matkul.create')->name('matkul.create');
    Route::view('matkul/edit', 'admin.matkul.edit')->name('matkul.edit');
    
    // Resource Controllers
    Route::resource('dosen', DosenController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
    
    // Tambahkan rute admin lainnya di sini
});