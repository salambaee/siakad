<?php

use Illuminate\Support\Facades\Route;

// Controller Auth
// use App\Http\Controllers\AuthController; // Dihapus karena login belum dipakai

// Controller Mahasiswa (Dihapus karena menggunakan Route::view)
// ...

// Controller Admin
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\MahasiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rute utama diarahkan ke dashboard mahasiswa untuk uji coba
Route::get('/', function () {
    return redirect()->route('mahasiswa.dashboard');
});

// Rute Autentikasi Dihapus Sementara
// Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('login', [AuthController::class, 'login']);
// Route::post('logout', [AuthController::class, 'logout'])->name('logout');


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