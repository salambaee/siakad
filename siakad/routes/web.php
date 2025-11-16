[20:50, 16/11/2025] Salam 2041_ D4_TRPL: <?php

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
// Route::get('login', [AuthController::class, 'showLoginForm'])->…
[23:47, 16/11/2025] Salam 2041_ D4_TRPL: <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Mahasiswa\KrsController;

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

Route::get('/login', 'auth.login')->name('login');

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
});