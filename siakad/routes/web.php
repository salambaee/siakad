<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Mahasiswa\KrsController;

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

Route::view('/login', 'auth.login')->name('login');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('dosen', DosenController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
});

Route::prefix('dosen')->name('dosen.')->group(function () {
    Route::view('/', 'dosen.dashboard')->name('dashboard');
    Route::view('/jadwal', 'dosen.jadwal')->name('jadwal');
    Route::view('/krs', 'dosen.krs')->name('krs');
    Route::view('/presensi', 'dosen.presensi')->name('presensi');
});

Route::prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('mahasiswa.dashboard');
    });
    Route::view('dashboard', 'mahasiswa.dashboard')->name('dashboard');
    Route::view('krs', 'mahasiswa.krs')->name('krs');
    Route::post('krs', [KrsController::class, 'store'])->name('krs.store');
    Route::view('jadwal', 'mahasiswa.jadwal')->name('jadwal');
    Route::view('nilai', 'mahasiswa.nilai')->name('nilai');
<<<<<<< HEAD
});

// Rute untuk Dosen
Route::prefix('dosen')->name('dosen.')->group(function () {
    // Redirect /dosen ke /dosen/dashboard
    Route::get('/', function () {
        return redirect()->route('dosen.dashboard');
    });
    
    Route::view('dashboard', 'dosen.dashboard')->name('dashboard');
    // Tambahkan rute dosen lainnya di sini
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
=======
});
>>>>>>> 29dce43f6e9f0c548d167591500570d47f149b4a
