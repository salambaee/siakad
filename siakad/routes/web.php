<?php

use Illuminate\Support\Facades\Route;

Route::view('/admin', 'admin.dashboard')->name('admin.dashboard');

Route::view('/admin/mahasiswa', 'admin.mahasiswa.index')->name('admin.mahasiswa.index');
Route::view('/admin/mahasiswa/create', 'admin.mahasiswa.create')->name('admin.mahasiswa.create');
Route::view('/admin/mahasiswa/edit', 'admin.mahasiswa.edit')->name('admin.mahasiswa.edit');

Route::view('/admin/dosen', 'admin.dosen.index')->name('admin.dosen.index');
Route::view('/admin/dosen/create', 'admin.dosen.create')->name('admin.dosen.create');
Route::view('/admin/dosen/edit', 'admin.dosen.edit')->name('admin.dosen.edit');

Route::view('/admin/matkul', 'admin.matkul.index')->name('admin.matkul.index');
Route::view('/admin/matkul/create', 'admin.matkul.create')->name('admin.matkul.create');
Route::view('/admin/matkul/edit', 'admin.matkul.edit')->name('admin.matkul.edit');

Route::view('/admin/kelas', 'admin.kelas.index')->name('admin.kelas.index');
Route::view('/admin/kelas/create', 'admin.kelas.create')->name('admin.kelas.create');
Route::view('/admin/kelas/edit', 'admin.kelas.edit')->name('admin.kelas.edit');

Route::view('/admin/presensi', 'admin.presensi.index')->name('admin.presensi.index');
Route::view('/admin/presensi/input', 'admin.presensi.input')->name('admin.presensi.input');
Route::view('/admin/presensi/rekap', 'admin.presensi.rekap')->name('admin.presensi.rekap');

