# AGENTS.md

## Project Overview

Website SMKN 11 - School website built with Laravel 12 for managing school content including news, achievements, announcements, agendas, and teacher profiles.

## Tech Stack

- **Backend**: PHP 8.2+, Laravel 12
- **Frontend**: Blade templates, Tailwind CSS 4, Tabler UI Kit
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
│   └── Agenda.php
└── Providers/

resources/
├── css/
│   ├── app.css
│   └── admin.css
├── js/
│   ├── app.js
│   └── admin.js
└── views/
    ├── admin/              # Admin panel views
    ├── auth/               # Login views
    ├── layouts/
    │   └── admin.blade.php # Admin layout
    └── welcome.blade.php

routes/
└── web.php                 # All routes (public, auth, admin)

database/
└── migrations/             # Database migrations
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
- Controllers in `App\Http\Controllers\Admin` for admin CRUD
- Use Form Requests for validation (in `App\Http\Requests`)
- Models in `App\Models` namespace

### Frontend
- Blade templates with component-based layout
- Tailwind CSS 4 for styling
- Tabler UI Kit components (`@tabler/core`)
- Tabler Icons for iconography

### Database
- SQLite as default database
- Migrations in `database/migrations/` with timestamp naming
- Use foreign key constraints

### Routes
- Public routes: `/`
- Auth routes: `/login`
- Admin routes: `/admin/*` (protected by `auth` and `role:admin` middleware)
- Resource routes for CRUD operations

## Testing

```bash
# Run all tests
composer test

# Run specific test suite
php artisan test --testsuite=Unit
php artisan test --testsuite=Feature

# Run specific test file
php artisan test tests/Feature/ExampleTest.php
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

- **Authentication**: Login system with role-based access control
- **Admin Dashboard**: Central management interface
- **CRUD Operations**: Manage Profiles, Departments, Teachers, News, Achievements, Announcements, Agendas
- **Responsive Design**: Mobile-friendly admin panel using Tabler UI
