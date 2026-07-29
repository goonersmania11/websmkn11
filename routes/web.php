<?php

use App\Http\Controllers\Admin\AgendaController;
// Controllers
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Models\Agenda;
// Models
use App\Models\Berita;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Pengumuman;
use App\Models\Prestasi;
use App\Models\Profile;
use Illuminate\Support\Facades\Route;

// ==================================================
// HALAMAN PUBLIC
// ==================================================

Route::get('/', function () {
    $profile = Profile::first();
    $jurusans = Jurusan::all();
    $beritas = Berita::where('status', 'Published')
        ->latest('tanggal_publish')
        ->limit(6)
        ->get();
    $prestasis = Prestasi::latest()->limit(6)->get();
    $pengumumans = Pengumuman::where('status', 'Aktif')
        ->latest('tanggal')
        ->limit(5)
        ->get();
    $gurus = Guru::latest()->limit(8)->get();
    $agendas = Agenda::latest('tanggal')->limit(5)->get();

    return view('welcome', compact(
        'profile',
        'jurusans',
        'beritas',
        'prestasis',
        'pengumumans',
        'gurus',
        'agendas'
    ));
});

// ==================================================
// AUTHENTICATION
// ==================================================

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'login'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'authenticate']);

});

// ==================================================
// ADMIN PANEL
// ==================================================

Route::middleware(['auth', 'role:admin'])->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // Semua URL admin menggunakan /admin
    // Semua nama route menggunakan admin.
    Route::prefix('admin')
        ->name('admin.')
        ->group(function () {

            // Redirect /admin to /admin/dashboard
            Route::get('/', function () {
                return redirect()->route('admin.dashboard');
            });

            // Dashboard
            Route::get('/dashboard', function () {
                return view('admin.dashboard');
            })->name('dashboard');

            // User Management
            Route::resource('users', UserController::class);

            // Profil Sekolah
            Route::resource('profiles', ProfileController::class);

            // Jurusan
            Route::resource('jurusans', JurusanController::class);

            // Guru
            Route::resource('gurus', GuruController::class);

            // Berita
            Route::resource('berita', BeritaController::class);

            // Prestasi
            Route::resource('prestasi', PrestasiController::class);

            // Pengumuman
            Route::resource('pengumuman', PengumumanController::class);

            // Agenda
            Route::resource('agenda', AgendaController::class);

        });

});
