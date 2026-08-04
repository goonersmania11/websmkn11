<?php

use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\ContentItemController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Web\AcademicController;
use App\Http\Controllers\Web\AdmissionsController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\InformationController;
use App\Http\Controllers\Web\ProfileController as WebProfileController;
use App\Http\Controllers\Web\StudentController;
use Illuminate\Support\Facades\Route;

// ==================================================
// HALAMAN PUBLIC
// ==================================================

Route::get('/', [HomeController::class, 'index']);

Route::get('/profil/sejarah', [WebProfileController::class, 'history']);
Route::get('/profil/visi-misi', [WebProfileController::class, 'visionMission']);
Route::get('/profil/struktur-organisasi', [WebProfileController::class, 'organization']);
Route::get('/guru/{guru}', [WebProfileController::class, 'teacherDetail'])->name('guru.show');

Route::get('/akademik/program-keahlian', [AcademicController::class, 'programs']);
Route::get('/akademik/program/{jurusan}', [AcademicController::class, 'programDetail'])->name('program.show');
Route::get('/akademik/fasilitas', [AcademicController::class, 'facilities']);

Route::get('/kesiswaan/prestasi', [StudentController::class, 'achievements'])->name('prestasi.index');
Route::get('/kesiswaan/ekstrakurikuler', [StudentController::class, 'extracurriculars']);
Route::get('/kesiswaan/galeri', [StudentController::class, 'gallery']);

Route::get('/informasi/berita', [InformationController::class, 'news'])->name('berita.index');
Route::get('/informasi/berita/{berita}', [InformationController::class, 'newsDetail'])->name('berita.show');
Route::get('/informasi/faq', [InformationController::class, 'faq']);

Route::get('/spmb', [AdmissionsController::class, 'index']);

Route::get('/kontak', [ContactController::class, 'show'])->name('contact.show');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');

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
            Route::resource('users', UserController::class)->except('show');

            // Profil Sekolah
            Route::resource('profiles', ProfileController::class)->except('show');

            // Jurusan
            Route::resource('jurusans', JurusanController::class)
                ->scoped(['jurusan' => 'id'])
                ->except('show');

            // Guru
            // Import/export/template didefinisikan sebelum resource agar tidak tertangkap route {guru}.
            Route::get('/gurus/import/template', [GuruController::class, 'template'])->name('gurus.import.template');
            Route::get('/gurus/export', [GuruController::class, 'export'])->name('gurus.export');
            Route::post('/gurus/import/preview', [GuruController::class, 'importPreview'])->name('gurus.import.preview');
            Route::post('/gurus/import', [GuruController::class, 'import'])->name('gurus.import');
            Route::resource('gurus', GuruController::class);

            // Berita
            Route::resource('berita', BeritaController::class)
                ->parameters(['berita' => 'berita']);

            // Prestasi
            Route::resource('prestasi', PrestasiController::class);

            // Pengumuman
            Route::resource('pengumuman', PengumumanController::class)->except('show');

            // Agenda
            Route::resource('agenda', AgendaController::class)->except('show');

            // Content Items (Fasilitas, Eskul, Galeri, FAQ, Sejarah, Nilai Inti, Slide, Statistik, SPMB)
            Route::resource('content-items', ContentItemController::class)
                ->parameters(['content-items' => 'contentItem'])
                ->except('show');

            // Settings
            Route::get('/settings', [SiteSettingController::class, 'edit'])->name('settings.edit');
            Route::put('/settings', [SiteSettingController::class, 'update'])->name('settings.update');

            // Contact Messages
            Route::resource('contact-messages', ContactMessageController::class)->only(['index', 'show', 'destroy']);
            Route::put('/contact-messages/{contactMessage}/mark-read', [ContactMessageController::class, 'markRead'])->name('contact-messages.mark-read');

        });

});

// ==================================================
// 404
// ==================================================

Route::fallback(function () {
    return response()->view('pages.errors.404', [], 404);
});
