<!DOCTYPE html>
<html lang="id" class="light-style layout-menu-fixed">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>@yield('title', 'Admin Panel - SMKN 11')</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('sneat/assets/img/favicon/favicon.ico') }}" />

    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('sneat/assets/vendor/fonts/boxicons.css') }}" />

    <link rel="stylesheet" href="{{ asset('sneat/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('sneat/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('sneat/assets/css/demo.css') }}" />

    <script src="{{ asset('sneat/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('sneat/assets/js/config.js') }}"></script>
</head>

<body>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- SIDEBAR -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

                <div class="app-brand demo">
                    <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">
                            SMKN 11
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">

                    <!-- DASHBOARD -->
                    <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Dashboard">
                                Dashboard
                            </div>
                        </a>
                    </li>

                    <!-- MANAJEMEN USER -->
                    <li class="menu-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Users">
                                Manajemen User
                            </div>
                        </a>
                    </li>

                    <!-- PROFIL SEKOLAH -->
                    <li class="menu-item {{ request()->routeIs('admin.profiles.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.profiles.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-buildings"></i>
                            <div data-i18n="Profiles">
                                Profil Sekolah
                            </div>
                        </a>
                    </li>

                    <!-- JURUSAN -->
                    <li class="menu-item {{ request()->routeIs('admin.jurusans.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.jurusans.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-book-content"></i>
                            <div data-i18n="Jurusan">
                                Jurusan
                            </div>
                        </a>
                    </li>

                    <!-- BERITA -->
                    <li class="menu-item {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.berita.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-news"></i>
                            <div data-i18n="Berita">
                                Berita
                            </div>
                        </a>
                    </li>

                    <!-- PRESTASI -->
                    <li class="menu-item {{ request()->routeIs('admin.prestasi.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.prestasi.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-trophy"></i>
                            <div data-i18n="Prestasi">
                                Prestasi
                            </div>
                        </a>
                    </li>

                    <!-- PENGUMUMAN -->
                    <li class="menu-item {{ request()->routeIs('admin.pengumuman.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.pengumuman.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-bell"></i>
                            <div data-i18n="Pengumuman">
                                Pengumuman
                            </div>
                        </a>
                    </li>

                    <!-- AGENDA -->
                    <li class="menu-item {{ request()->routeIs('admin.agenda.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.agenda.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-calendar"></i>
                            <div data-i18n="Agenda">
                                Agenda
                            </div>
                        </a>
                    </li>

                </ul>
            </aside>
            <!-- / SIDEBAR -->


            <!-- LAYOUT PAGE -->
            <div class="layout-page">

                <!-- NAVBAR -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">

                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

                        <ul class="navbar-nav flex-row align-items-center ms-auto">

                            <!-- USER -->
                            <li class="nav-item lh-1 me-3">
                                <span class="fw-semibold d-block">
                                    Halo, {{ auth()->user()->name }}
                                </span>
                            </li>

                            <!-- LOGOUT -->
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf

                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        Logout
                                    </button>
                                </form>
                            </li>

                        </ul>

                    </div>
                </nav>
                <!-- / NAVBAR -->


                <!-- CONTENT -->
                <div class="content-wrapper">

                    <div class="container-xxl flex-grow-1 container-p-y">

                        @yield('content')

                    </div>


                    <!-- FOOTER -->
                    <footer class="content-footer footer bg-footer-theme">

                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">

                            <div class="mb-2 mb-md-0">

                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>

                                SMKN 11 Project

                            </div>

                        </div>

                    </footer>
                    <!-- / FOOTER -->

                    <div class="content-backdrop fade"></div>

                </div>
                <!-- / CONTENT -->

            </div>
            <!-- / LAYOUT PAGE -->

        </div>
    </div>


    <!-- JAVASCRIPT -->

    <script src="{{ asset('sneat/assets/vendor/libs/jquery/jquery.js') }}"></script>

    <script src="{{ asset('sneat/assets/vendor/libs/popper/popper.js') }}"></script>

    <script src="{{ asset('sneat/assets/vendor/js/bootstrap.js') }}"></script>

    <script src="{{ asset('sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('sneat/assets/vendor/js/menu.js') }}"></script>

    <script src="{{ asset('sneat/assets/js/main.js') }}"></script>

</body>
</html>
