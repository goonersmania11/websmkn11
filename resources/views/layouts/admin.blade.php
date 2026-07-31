<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Panel') - SMKN 11</title>

    @vite(['resources/css/admin.css', 'resources/js/admin.js'])

    <style>
        /* =========================
           SIDEBAR BRANDING
        ========================== */

        .sidebar-brand {
            min-height: 72px;
            padding: 18px 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.06);
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        .sidebar-brand h1 {
            font-size: 1.25rem;
            letter-spacing: 1px;
        }

        .sidebar-navigation {
            padding-top: 10px;
        }

        .sidebar-navigation .navbar-nav {
            padding-left: 10px;
            padding-right: 10px;
        }

        .sidebar-navigation .nav-link {
            border-radius: 6px;
            margin-bottom: 3px;
        }

        .sidebar-navigation .nav-link:hover {
            background: rgba(255, 255, 255, 0.08);
        }

        .sidebar-navigation .nav-item.active .nav-link {
            background: rgba(255, 255, 255, 0.12);
        }

        /* =========================
           CARD
        ========================== */

        .card {
            border-radius: 8px;
        }

        .card-header {
            min-height: 60px;
        }

        /* =========================
           TABLE
        ========================== */

        .table td,
        .table th {
            vertical-align: middle;
        }
    </style>
</head>

<body>

    <div class="page">

        {{-- SIDEBAR --}}
        <aside class="navbar navbar-vertical navbar-expand-lg"
               data-bs-theme="dark">

            <div class="container-fluid p-0">

                {{-- BRANDING --}}
                <div class="sidebar-brand">

                    <h1 class="navbar-brand m-0">

                        <a href="{{ route('admin.dashboard') }}"
                           class="text-decoration-none text-white">

                            SMKN 11

                        </a>

                    </h1>

                    <button class="navbar-toggler"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#sidebar-menu"
                            aria-controls="sidebar-menu"
                            aria-expanded="false"
                            aria-label="Buka navigasi">

                        <span class="navbar-toggler-icon"></span>

                    </button>

                </div>

                {{-- MENU --}}
                <div class="collapse navbar-collapse sidebar-navigation"
                     id="sidebar-menu">

                    <ul class="navbar-nav pt-lg-3">

                        {{-- Dashboard --}}
                        <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                            <a class="nav-link"
                               href="{{ route('admin.dashboard') }}">

                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <i class="ti ti-home"></i>
                                </span>

                                <span class="nav-link-title">
                                    Dashboard
                                </span>

                            </a>

                        </li>

                        {{-- User --}}
                        <li class="nav-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">

                            <a class="nav-link"
                               href="{{ route('admin.users.index') }}">

                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <i class="ti ti-users"></i>
                                </span>

                                <span class="nav-link-title">
                                    Manajemen User
                                </span>

                            </a>

                        </li>

                        {{-- Profil --}}
                        <li class="nav-item {{ request()->routeIs('admin.profiles.*') ? 'active' : '' }}">

                            <a class="nav-link"
                               href="{{ route('admin.profiles.index') }}">

                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <i class="ti ti-building-community"></i>
                                </span>

                                <span class="nav-link-title">
                                    Profil Sekolah
                                </span>

                            </a>

                        </li>

                        {{-- Jurusan --}}
                        <li class="nav-item {{ request()->routeIs('admin.jurusans.*') ? 'active' : '' }}">

                            <a class="nav-link"
                               href="{{ route('admin.jurusans.index') }}">

                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <i class="ti ti-book-2"></i>
                                </span>

                                <span class="nav-link-title">
                                    Jurusan
                                </span>

                            </a>

                        </li>

                        {{-- Guru --}}
                        <li class="nav-item {{ request()->routeIs('admin.gurus.*') ? 'active' : '' }}">

                            <a class="nav-link"
                               href="{{ route('admin.gurus.index') }}">

                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <i class="ti ti-school"></i>
                                </span>

                                <span class="nav-link-title">
                                    Guru
                                </span>

                            </a>

                        </li>

                        {{-- Berita --}}
                        <li class="nav-item {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">

                            <a class="nav-link"
                               href="{{ route('admin.berita.index') }}">

                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <i class="ti ti-news"></i>
                                </span>

                                <span class="nav-link-title">
                                    Berita
                                </span>

                            </a>

                        </li>

                        {{-- Prestasi --}}
                        <li class="nav-item {{ request()->routeIs('admin.prestasi.*') ? 'active' : '' }}">

                            <a class="nav-link"
                               href="{{ route('admin.prestasi.index') }}">

                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <i class="ti ti-trophy"></i>
                                </span>

                                <span class="nav-link-title">
                                    Prestasi
                                </span>

                            </a>

                        </li>

                        {{-- Pengumuman --}}
                        <li class="nav-item {{ request()->routeIs('admin.pengumuman.*') ? 'active' : '' }}">

                            <a class="nav-link"
                               href="{{ route('admin.pengumuman.index') }}">

                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <i class="ti ti-bell"></i>
                                </span>

                                <span class="nav-link-title">
                                    Pengumuman
                                </span>

                            </a>

                        </li>

                        {{-- Agenda --}}
                        <li class="nav-item {{ request()->routeIs('admin.agenda.*') ? 'active' : '' }}">

                            <a class="nav-link"
                               href="{{ route('admin.agenda.index') }}">

                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <i class="ti ti-calendar-event"></i>
                                </span>

                                <span class="nav-link-title">
                                    Agenda
                                </span>

                            </a>

                        </li>

                        {{-- Content Items --}}
                        <li class="nav-item {{ request()->routeIs('admin.content-items.*') ? 'active' : '' }}">

                            <a class="nav-link"
                               href="{{ route('admin.content-items.index') }}">

                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <i class="ti ti-packages"></i>
                                </span>

                                <span class="nav-link-title">
                                    Koleksi Konten
                                </span>

                            </a>

                        </li>

                        {{-- Settings --}}
                        <li class="nav-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">

                            <a class="nav-link"
                               href="{{ route('admin.settings.edit') }}">

                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <i class="ti ti-settings"></i>
                                </span>

                                <span class="nav-link-title">
                                    Pengaturan
                                </span>

                            </a>

                        </li>

                        {{-- Messages --}}
                        <li class="nav-item {{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}">

                            <a class="nav-link"
                               href="{{ route('admin.contact-messages.index') }}">

                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <i class="ti ti-mail"></i>
                                </span>

                                <span class="nav-link-title">
                                    Pesan
                                </span>

                            </a>

                        </li>

                    </ul>

                </div>

            </div>

        </aside>


        {{-- HEADER --}}
        <header class="navbar navbar-expand-md d-print-none">

            <div class="container-xl">

                <div class="navbar-nav flex-row order-md-last ms-auto">

                    <div class="nav-item dropdown">

                        <a href="#"
                           class="nav-link d-flex lh-1 text-reset p-0"
                           data-bs-toggle="dropdown"
                           aria-label="Buka menu pengguna">

                            <span class="avatar avatar-sm bg-primary-lt">

                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                            </span>

                            <div class="d-none d-xl-block ps-2">

                                <div>
                                    {{ auth()->user()->name }}
                                </div>

                                <div class="mt-1 small text-secondary">

                                    {{ ucfirst(auth()->user()->role) }}

                                </div>

                            </div>

                        </a>

                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                            <form action="{{ route('logout') }}"
                                  method="POST">

                                @csrf

                                <button type="submit"
                                        class="dropdown-item">

                                    Logout

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </header>


        {{-- CONTENT --}}
        <div class="page-wrapper">

            <div class="page-header d-print-none">

                <div class="container-xl">

                    <div class="row g-2 align-items-center">

                        <div class="col">

                            <div class="page-pretitle">
                                Admin Panel
                            </div>

                            <h2 class="page-title">

                                @yield('title', 'Dashboard')

                            </h2>

                        </div>

                    </div>

                </div>

            </div>


            <div class="page-body">

                <div class="container-xl">

                    @yield('content')

                </div>

            </div>


            <footer class="footer footer-transparent d-print-none">

                <div class="container-xl">

                    <div class="row text-center align-items-center flex-row-reverse">

                        <div class="col-12">

                            © {{ date('Y') }} SMKN 11

                        </div>

                    </div>

                </div>

            </footer>

        </div>

    </div>

</body>

</html>