<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;

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
    
    // Route logout diletakkan di luar prefix agar route('logout') tetap berfungsi
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Group khusus untuk halaman admin (URL diawali /admin dan nama diawali admin.)
    Route::prefix('admin')->name('admin.')->group(function () {
        
        // Halaman Dashboard Admin
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Route CRUD User Management
        Route::resource('users', UserController::class);
        
    });
});