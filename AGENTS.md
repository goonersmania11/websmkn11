# AGENTS.md

## Project Overview

Website SMKN 11 - School website built with Laravel 12. Consists of a public-facing site (profile, academic programs, student affairs, news, admissions, contact) and an admin panel for managing all content.

## Tech Stack

- **Backend**: PHP 8.2+, Laravel 12
- **Frontend**: Blade templates, Tailwind CSS 4, Tabler UI Kit, Alpine.js, Tabler Icons
- **Database**: SQLite
- **Build Tool**: Vite 7
- **Testing**: PHPUnit 11
- **Code Style**: Laravel Pint

## Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/          # Admin CRUD controllers
│   │   │   ├── AgendaController.php
│   │   │   ├── BeritaController.php
│   │   │   ├── ContactMessageController.php
│   │   │   ├── ContentItemController.php
│   │   │   ├── GuruController.php
│   │   │   ├── JurusanController.php
│   │   │   ├── PengumumanController.php
│   │   │   ├── PrestasiController.php
│   │   │   ├── ProfileController.php
│   │   │   ├── SiteSettingController.php
│   │   │   └── UserController.php
│   │   ├── Web/            # Public site controllers
│   │   │   ├── AcademicController.php
│   │   │   ├── AdmissionsController.php
│   │   │   ├── ContactController.php
│   │   │   ├── HomeController.php
│   │   │   ├── InformationController.php
│   │   │   ├── ProfileController.php
│   │   │   └── StudentController.php
│   │   ├── AuthController.php
│   │   └── Controller.php
│   ├── Middleware/
│   │   ├── AdminMiddleware.php
│   │   └── CheckRole.php
│   └── Requests/           # Form validation requests
├── Models/
│   ├── User.php
│   ├── Profile.php
│   ├── Guru.php            # Teacher
│   ├── Jurusan.php         # Department/Major
│   ├── Berita.php          # News
│   ├── Prestasi.php        # Achievement
│   ├── Pengumuman.php      # Announcement
│   ├── Agenda.php
│   ├── SiteSetting.php     # Key-value site settings
│   ├── ContentItem.php     # Typed content (facilities, eskul, gallery, FAQ, history, core values, slides, statistics, SPMB)
│   └── ContactMessage.php  # Contact form submissions
└── Providers/

resources/
├── css/
│   ├── app.css
│   └── admin.css
├── js/
│   ├── app.js
│   ├── admin.js
│   └── bootstrap.js
└── views/
    ├── admin/              # Admin panel views
    │   ├── agenda/ berita/ contact-messages/ content-items/ dashboard.blade.php
    │   ├── guru/ jurusan/ pengumuman/ prestasi/ profile/ settings/ users/
    ├── pages/              # Public site views (home, contact, admissions, profile, academics, information, student, errors)
    ├── components/         # Reusable components
    │   └── public/
    ├── layouts/
    │   ├── admin.blade.php # Admin layout
    │   └── public.blade.php # Public site layout
    ├── auth/               # Login views
    └── welcome.blade.php

routes/
└── web.php                 # All routes (public, auth, admin)

database/
├── migrations/             # Database migrations
└── seeders/
    └── DatabaseSeeder.php
```

## Common Commands

```bash
# Development server (runs PHP, queue, logs, vite concurrently)
composer dev

# Setup project from scratch
composer setup

# Run tests
composer test

# Build assets for production
npm run build

# Start only Vite dev server
npm run dev

# Format code
./vendor/bin/pint

# Run migrations
php artisan migrate

# Clear caches
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

## Code Conventions

### PHP/Laravel
- Follow PSR-12 coding standard
- Use PHP 8.2+ features (readonly, enums, etc.)
- Admin CRUD controllers in `App\Http\Controllers\Admin`
- Public site controllers in `App\Http\Controllers\Web`
- Use Form Requests for validation (in `App\Http\Requests`)
- Models in `App\Models` namespace

### Frontend
- Blade templates with component-based layout
- Tailwind CSS 4 for styling
- Tabler UI Kit components (`@tabler/core`)
- Tabler Icons for iconography
- Alpine.js for interactive components

### Database
- SQLite as default database
- Migrations in `database/migrations/` with timestamp naming
- Use foreign key constraints
- Alter migrations (e.g. `alter_*`) for schema changes on existing tables
- Seed initial data (site settings, admin user, etc.) in `DatabaseSeeder`

### Routes
- Public routes: `/`, `/profil/*`, `/akademik/*`, `/kesiswaan/*`, `/informasi/*`, `/spmb`, `/kontak`
- Auth routes: `/login`
- Admin routes: `/admin/*` (protected by `auth` and `role:admin` middleware)
- All admin routes use the `admin.` route name prefix
- Resource routes for CRUD operations
- 404 fallback renders `pages.errors.404`

## Testing

```bash
# Run all tests
composer test

# Run specific test suite
php artisan test --testsuite=Unit
php artisan test --testsuite=Feature

# Run specific test file
php artisan test tests/Feature/AdminModuleStorageTest.php
```

Testing uses SQLite in-memory database, sync queue, and array cache/session drivers.

## Environment Setup

1. Copy `.env.example` to `.env`
2. Generate app key: `php artisan key:generate`
3. Run migrations: `php artisan migrate`
4. Install dependencies: `npm install`
5. Build assets: `npm run build`

Or simply run `composer setup` to do all steps automatically.

## Key Features

- **Public Site**: Home, school profile, academic programs, student affairs (achievements, extracurriculars, gallery), news, FAQ, SPMB admissions, contact form
- **Authentication**: Login system with role-based access control
- **Admin Dashboard**: Central management interface
- **CRUD Operations**: Users, Profiles, Departments, Teachers, News, Achievements, Announcements, Agendas
- **Content Items**: Generic typed content management (facilities, extracurriculars, gallery, FAQ, history, core values, slides, statistics, SPMB)
- **Site Settings**: Key-value settings editable from the admin panel
- **Contact Messages**: Incoming contact form submissions, viewable and markable as read in admin
- **Responsive Design**: Mobile-friendly using Tabler UI
