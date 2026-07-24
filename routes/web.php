<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;


// ==================================================
// HALAMAN PUBLIC
// ==================================================

Route::get('/', function () {
    return view('welcome');
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
