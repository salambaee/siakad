<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\MahasiswaController;

// Matkul
Route::view('/admin/matkul', 'admin.matkul.index')->name('admin.matkul.index');
Route::view('/admin/matkul/create', 'admin.matkul.create')->name('admin.matkul.create');
Route::view('/admin/matkul/edit', 'admin.matkul.edit')->name('admin.matkul.edit');

// Kelas
Route::view('/admin/kelas', 'admin.kelas.index')->name('admin.kelas.index');
Route::view('/admin/kelas/create', 'admin.kelas.create')->name('admin.kelas.create');
Route::view('/admin/kelas/edit', 'admin.kelas.edit')->name('admin.kelas.edit');

// Presensi
Route::view('/admin/presensi', 'admin.presensi.index')->name('admin.presensi.index');
Route::view('/admin/presensi/input', 'admin.presensi.input')->name('admin.presensi.input');
Route::view('/admin/presensi/rekap', 'admin.presensi.rekap')->name('admin.presensi.rekap');


//Route::prefix('admin')->name('admin.')->group(function () {
//    Route::resource('mahasiswa', MahasiswaController::class)->parameters([
//        'mahasiswa' => 'nim'
//    ]);
//});

// Dosen (resource route dengan nama)
Route::prefix('admin')->group(function () {
    Route::resource('dosen', DosenController::class);
});

Route::prefix('admin')->group(function () {
    Route::resource('mahasiswa', MahasiswaController::class);
});
