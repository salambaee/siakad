<?php

use Illuminate\Support\Facades\Route;

// Controller Auth
// use App\Http\Controllers\AuthController; // Dihapus karena login belum dipakai

// Controller Mahasiswa (Dihapus karena menggunakan Route::view)
// ...

// Controller Admin
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\MahasiswaController;









































































Route::view('/admin/matkul', 'admin.matkul.index')->name('admin.matkul.index');
Route::view('/admin/matkul/create', 'admin.matkul.create')->name('admin.matkul.create');
Route::view('/admin/matkul/edit', 'admin.matkul.edit')->name('admin.matkul.edit');

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