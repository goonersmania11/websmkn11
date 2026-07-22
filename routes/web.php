<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\AgendaController;

Route::get('/', function () {
    return view('welcome');
});

// Grouping URL untuk semua rute Admin
Route::prefix('admin')->group(function () {
    Route::resource('berita', BeritaController::class);
    Route::resource('prestasi', PrestasiController::class);
    Route::resource('pengumuman', PengumumanController::class);
    Route::resource('agenda', AgendaController::class);
});