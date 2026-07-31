<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-navy min-h-screen flex items-center justify-center px-4">
    <div class="text-center">
        <h1 class="text-[8rem] md:text-[12rem] font-black text-gold leading-none tracking-tighter">404</h1>
        <p class="text-xl md:text-2xl text-white/80 font-medium mb-8">Halaman tidak ditemukan</p>
        <a
            href="/"
            class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-gold text-navy font-bold hover:bg-gold-light transition-all duration-200"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            Kembali ke Beranda
        </a>
    </div>
</body>
</html>
