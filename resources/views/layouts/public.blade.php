<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $siteName ?? 'SMKN 11') - @yield('subtitle', 'Sekolah Menengah Kejuruan')</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="bg-cream text-navy font-sans antialiased" x-data="{ mobileMenuOpen: false }">

    @include('components.public.navbar')

    <main class="pt-[70px]">
        @yield('content')
    </main>

    @include('components.public.footer')

    @stack('scripts')
</body>
</html>
