<?php

use Illuminate\Support\Facades\Route;

// Import Controller dari Anggota Tim Lain
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\UserController;

// Import Controller dari Tugas Anggota 3 (Kamu)
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\SpmbController;

// Halaman utama sementara
Route::get('/', function () {
    return view('welcome');
});

// Route untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});

// Route untuk admin (wajib login DAN wajib role admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    
    // Route logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Group khusus untuk halaman admin (URL diawali /admin)
    Route::prefix('admin')->group(function () {
        
        // Halaman Dashboard Admin
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
            
        // Route CRUD buatan Anggota 1 & 2
        Route::resource('profiles', ProfileController::class);
        Route::resource('jurusans', JurusanController::class);
        Route::resource('users', UserController::class);

        // Route CRUD buatan Anggota 3 (Fitur-fiturmu)
        Route::resource('berita', BeritaController::class);
        Route::resource('prestasi', PrestasiController::class);
        Route::resource('pengumuman', PengumumanController::class);
        Route::resource('agenda', AgendaController::class);
        Route::resource('spmb', SpmbController::class);
        
    });
});