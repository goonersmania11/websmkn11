@php
    $profile = $profile ?? \App\Models\Profile::first();
    $siteName = $profile->nama_sekolah ?? 'SMKN 11';
    $logoUrl = $profile?->logo_url ?? asset('assets/logo.png');
@endphp

<nav x-data="{ open: false, activeDropdown: null }"
     class="fixed top-0 left-0 right-0 z-50 h-[70px] bg-navy/95 backdrop-blur-md border-b border-white/10">
    <div class="mx-auto max-w-7xl h-full px-4 sm:px-6 lg:px-8 flex items-center justify-between">

        <a href="{{ url('/') }}" class="flex items-center gap-3">
            <img src="{{ $logoUrl }}" alt="{{ $siteName }}" class="h-10 w-auto" onerror="this.style.display='none'">
            <span class="text-white font-bold text-lg tracking-wide hidden sm:inline">{{ $siteName }}</span>
        </a>

        <div class="hidden lg:flex items-center gap-1">
            <a href="{{ url('/') }}" class="px-3 py-2 rounded-lg text-sm font-medium text-white/80 hover:text-white hover:bg-white/10 transition">
                Beranda
            </a>

            @php
                $navItems = [
                    ['label' => 'Profil', 'children' => [
                        ['label' => 'Sejarah', 'url' => '/profil/sejarah'],
                        ['label' => 'Visi & Misi', 'url' => '/profil/visi-misi'],
                        ['label' => 'Struktur Organisasi', 'url' => '/profil/struktur-organisasi'],
                    ]],
                    ['label' => 'Akademik', 'children' => [
                        ['label' => 'Program Keahlian', 'url' => '/akademik/program-keahlian'],
                        ['label' => 'Fasilitas', 'url' => '/akademik/fasilitas'],
                    ]],
                    ['label' => 'Manajemen', 'children' => [
                        ['label' => 'Prestasi', 'url' => '/kesiswaan/prestasi'],
                        ['label' => 'Ekstrakurikuler', 'url' => '/kesiswaan/ekstrakurikuler'],
                        ['label' => 'Galeri', 'url' => '/kesiswaan/galeri'],
                    ]],
                    ['label' => 'Informasi', 'children' => [
                        ['label' => 'Berita', 'url' => '/informasi/berita'],
                        ['label' => 'FAQ', 'url' => '/informasi/faq'],
                    ]],
                ];
            @endphp

            @foreach($navItems as $idx => $item)
                <div class="relative"
                     x-data="{ open: false }"
                     @mouseenter="open = true; activeDropdown = {{ $idx }}"
                     @mouseleave="open = false; activeDropdown = null">
                    <button class="px-3 py-2 rounded-lg text-sm font-medium text-white/80 hover:text-white hover:bg-white/10 transition flex items-center gap-1">
                        {{ $item['label'] }}
                        <svg class="w-3 h-3 transition-transform" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1" class="absolute left-0 top-full pt-2 z-50" style="display: none;">
                        <div class="bg-navy-700 rounded-xl shadow-dropdown border border-white/10 py-2 min-w-[220px]">
                            @foreach($item['children'] as $child)
                                <a href="{{ $child['url'] }}" class="block px-4 py-2.5 text-sm text-white/80 hover:bg-white/10 hover:text-white transition">
                                    {{ $child['label'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

            <a href="/spmb" class="ml-2 px-5 py-2 rounded-full text-sm font-bold bg-gold text-navy hover:bg-gold-light transition">
                SPMB
            </a>
            <a href="/kontak" class="px-3 py-2 rounded-lg text-sm font-medium text-white/80 hover:text-white hover:bg-white/10 transition">
                Kontak
            </a>
        </div>

        <button @click="open = !open" class="lg:hidden p-2 rounded-lg text-white hover:bg-white/10 transition">
            <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2" class="lg:hidden bg-navy border-t border-white/10 max-h-[80vh] overflow-y-auto" style="display: none;">
        <div class="px-4 py-4 space-y-1">
            <a href="{{ url('/') }}" class="block px-4 py-3 rounded-lg text-white/90 hover:bg-white/10 font-medium">Beranda</a>

            @foreach($navItems as $item)
                <div x-data="{ submenuOpen: false }">
                    <button @click="submenuOpen = !submenuOpen" class="w-full flex items-center justify-between px-4 py-3 rounded-lg text-white/90 hover:bg-white/10 font-medium">
                        {{ $item['label'] }}
                        <svg class="submenu-arrow w-4 h-4 transition-transform" :class="submenuOpen && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="submenuOpen" x-collapse class="pl-4" style="display: none;">
                        @foreach($item['children'] as $child)
                            <a href="{{ $child['url'] }}" class="block px-4 py-2 rounded-lg text-white/70 hover:bg-white/10 text-sm">
                                {{ $child['label'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <a href="/spmb" class="block px-4 py-3 rounded-full bg-gold text-navy font-bold text-center mt-2">SPMB</a>
            <a href="/kontak" class="block px-4 py-3 rounded-lg text-white/90 hover:bg-white/10 font-medium text-center">Kontak</a>
        </div>
    </div>
</nav>
