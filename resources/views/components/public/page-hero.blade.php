@props(['title' => '', 'subtitle' => ''])

<section class="relative bg-navy py-20 md:py-28 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-navy-dark via-navy to-navy-light opacity-90"></div>
    <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjQiPgo8cmVjdCB3aWR0aD0iNCIgaGVpZ2h0PSI0IiBmaWxsPSIjZmZmIiBmaWxsLW9wYWNpdHk9IjAuMDUiLz4KPC9zdmc+');"></div>

    <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <nav class="mb-6 text-sm text-white/60">
            <a href="/" class="hover:text-white transition">Beranda</a>
            <span class="mx-2">/</span>
            <span class="text-gold">{{ $title }}</span>
        </nav>
        <h1 class="text-4xl md:text-5xl font-black text-white tracking-tight">{{ $title }}</h1>
        @if($subtitle)
            <p class="mt-4 text-lg text-white/70 max-w-2xl">{{ $subtitle }}</p>
        @endif
    </div>
</section>
