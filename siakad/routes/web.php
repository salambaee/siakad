<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\MahasiswaController;

// Matkul
Route::view('/admin/matkul', 'admin.matkul.index')->name('admin.matkul.index');
Route::view('/admin/matkul/create', 'admin.matkul.create')->name('admin.matkul.create');
Route::view('/admin/matkul/edit', 'admin.matkul.edit')->name('admin.matkul.edit');

Route::view('/dosen', 'dosen.dashboard')->name('dosen.dashboard');

Route::prefix('admin')->group(function () {
    Route::resource('dosen', DosenController::class);
});

Route::prefix('admin')->group(function () {
    Route::resource('mahasiswa', MahasiswaController::class);
});
