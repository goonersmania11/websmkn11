@extends('layouts.public')

@section('title', $settings['hero_title'] ?? 'Beranda')

@section('content')

{{-- Hero Section --}}
<section class="relative min-h-[95vh] flex items-center bg-navy overflow-hidden"
         x-data="{ activeImage: 0 }"
         x-init="setInterval(() => activeImage = (activeImage + 1) % 3, 5000)">
    {{-- Background Images & Overlay --}}
    <div class="absolute inset-0">
        <img src="{{ asset('assets/hero.png') }}" alt="Siswa SMKN 11" class="absolute inset-0 h-full w-full object-cover transition-opacity duration-1000" :class="activeImage === 0 ? 'opacity-100' : 'opacity-0'">
        <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1600&q=80" alt="Kegiatan sekolah" class="absolute inset-0 h-full w-full object-cover transition-opacity duration-1000" :class="activeImage === 1 ? 'opacity-100' : 'opacity-0'">
        <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&w=1600&q=80" alt="Kegiatan sekolah" class="absolute inset-0 h-full w-full object-cover transition-opacity duration-1000" :class="activeImage === 2 ? 'opacity-100' : 'opacity-0'">
        {{-- Main Overlay --}}
        <div class="absolute inset-0 bg-gradient-to-r from-[#0C1527] via-[#121F38]/90 to-[#1B2A4A]/40"></div>
        {{-- Dot Pattern --}}
        <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjQiPgo8cmVjdCB3aWR0aD0iNCIgaGVpZ2h0PSI0IiBmaWxsPSIjZmZmIiBmaWxsLW9wYWNpdHk9IjAuMDUiLz4KPC9zdmc+');"></div>
    </div>

    <div class="relative z-10 mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 py-24">
        <div class="grid items-center gap-12 lg:grid-cols-[1.1fr_0.9fr]">

            {{-- Left Content --}}
            <div class="flex flex-col items-start justify-center">

                {{-- Formal Logos Row --}}
                <div class="mb-10 flex flex-wrap items-center gap-4 rounded-xl border border-white/10 bg-white/5 p-3 shadow-sm backdrop-blur-md">
                    <div class="flex items-center gap-2">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/9c/Logo_of_Ministry_of_Education_and_Culture_of_Republic_of_Indonesia.svg" alt="Kemdikbud" class="h-8 w-auto" style="height:32px;width:auto;object-fit:contain">
                        <div class="hidden sm:block text-left text-[8px] font-bold tracking-widest text-white/90 uppercase leading-tight">
                            Kementerian Pendidikan,<br>Kebudayaan, Riset,<br>dan Teknologi
                        </div>
                    </div>
                    <div class="h-8 w-px bg-white/20"></div>
                    <div class="flex flex-col items-start justify-center">
                        <div class="text-base font-black italic tracking-tighter text-white">
                            SMK<span class="text-[#C8A951]">BISA</span><span class="text-[#F9E7A8]">-HEBAT</span>
                        </div>
                        <div class="text-[7px] font-bold tracking-widest text-white/80 uppercase">Siap Kerja &bull; Santun &bull; Mandiri &bull; Kreatif</div>
                    </div>
                    <div class="hidden sm:block h-8 w-px bg-white/20"></div>
                    <div class="hidden sm:flex items-center gap-2 text-white">
                        <div class="rounded-full bg-white/10 p-1.5">
                            <svg class="h-5 w-5 text-[#C8A951]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                        </div>
                        <div class="text-[8px] font-bold tracking-widest uppercase leading-tight">Vokasi Kuat<br>Menguatkan<br>Indonesia</div>
                    </div>
                </div>

                {{-- Hero Titles --}}
                <div class="flex flex-col">
                    <h1 class="text-6xl sm:text-7xl lg:text-[6.5rem] font-black italic tracking-tighter text-white">
                        SMKN <span class="text-[#C8A951] text-[1.15em] leading-none">11</span>
                    </h1>
                    <h2 class="mt-1 text-2xl sm:text-4xl font-bold tracking-[0.3em] text-white uppercase">
                        Kab. Tangerang
                    </h2>
                </div>

                <p class="mt-8 max-w-xl text-lg sm:text-xl font-medium leading-relaxed text-[#FBEFCC]">
                    {{ $settings['hero_subtitle'] ?? 'Sekolah kejuruan favorit yang menyiapkan lulusan unggul, berkarakter, dan memiliki kompetensi tinggi sesuai kebutuhan industri masa depan.' }}
                </p>

                {{-- Action Buttons --}}
                <div class="mt-10 flex flex-col items-center gap-4 sm:flex-row">
                    <a href="/kontak" class="px-8 py-4 rounded-full bg-[#C8A951] text-navy text-lg font-bold uppercase tracking-wider transition-all hover:scale-105 hover:bg-gold-light shadow-lg">
                        {{ $settings['hero_cta_text'] ?? 'Kontak Kami' }}
                    </a>
                    <div class="flex items-center justify-center rounded-full border border-white/20 bg-[#121F38]/60 px-6 py-4 text-sm font-semibold text-[#FFF8E8] backdrop-blur-md">
                        <span class="mr-3 relative flex h-3 w-3">
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-[#C8A951]"></span>
                        </span>
                        {{ $settings['service_hours_badge'] ?? 'Layanan 08.00 s.d 15.30 WIB' }}
                    </div>
                </div>
            </div>

            {{-- Right Content - Curved Image Frame --}}
            <div class="hidden lg:block relative h-[650px] w-full">
                {{-- Glass Frame --}}
                <div class="absolute inset-y-10 right-0 left-10 overflow-hidden rounded-bl-[140px] rounded-tr-[140px] border-[6px] border-white/10 bg-white/5 shadow-2xl backdrop-blur-sm transition-transform hover:scale-[1.02] duration-500">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=800&q=80" alt="Sekolah" class="h-full w-full object-cover mix-blend-overlay opacity-90 transition-transform duration-1000 hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0C1527] via-transparent to-transparent opacity-90"></div>

                    {{-- Overlay Card --}}
                    <div class="absolute bottom-12 left-10 right-10">
                        <div class="rounded-2xl border border-white/10 bg-black/40 p-6 backdrop-blur-xl shadow-2xl">
                            <div class="flex items-center gap-4">
                                <div class="rounded-full bg-[#C8A951] p-4 text-navy shadow-lg">
                                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-white uppercase tracking-wider drop-shadow-md">Fasilitas Modern</h3>
                                    <p class="mt-1 text-sm font-medium text-[#FBEFCC]">Mendukung penuh kompetensi siswa di era digital.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Floating Badge --}}
                <div class="absolute top-20 left-0 animate-bounce" style="animation-duration: 3s;">
                    <div class="flex items-center gap-4 rounded-full border border-white/20 bg-white/10 p-3 pr-6 backdrop-blur-xl shadow-2xl">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-[#C8A951] text-navy shadow-inner">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                        </div>
                        <div class="flex flex-col justify-center">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-white/80">Akreditasi</span>
                            <span class="text-lg font-black text-white drop-shadow-md">UNGGUL (A)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Slider Controls --}}
    <div class="absolute bottom-8 left-1/2 z-20 flex -translate-x-1/2 gap-3 rounded-full bg-black/20 p-2 backdrop-blur-md">
        @for($i = 0; $i < 3; $i++)
            <button type="button" aria-label="Pilih slide {{ $i + 1 }}"
                    @click="activeImage = {{ $i }}"
                    class="h-2.5 rounded-full transition-all duration-300"
                    :class="activeImage === {{ $i }} ? 'w-8 bg-[#C8A951]' : 'w-2.5 bg-white/40 hover:bg-white/60'"></button>
        @endfor
    </div>
</section>

{{-- Principal Welcome --}}
@if(!empty($profile) && !empty($settings['principal_welcome_body']))
<section class="py-20 md:py-28 bg-cream">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12 lg:gap-20 items-center">
            <div class="relative">
                <div class="aspect-[4/5] rounded-2xl overflow-hidden bg-navy/5 shadow-2xl">
                    @if(!empty($profile->foto_url))
                        <img src="{{ $profile->foto_url }}" alt="{{ $settings['principal_name'] ?? '' }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-navy/10">
                            <svg class="w-24 h-24 text-navy/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                    @endif
                </div>
                <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-gold/10 rounded-full blur-3xl"></div>
                <div class="absolute -top-6 -left-6 w-24 h-24 bg-navy/10 rounded-full blur-2xl"></div>
            </div>

            <div>
                <span class="inline-block px-4 py-1.5 bg-gold/10 text-gold font-semibold text-sm rounded-full mb-6">
                    {{ $settings['principal_welcome_label'] ?? 'Sambutan' }}
                </span>
                <h2 class="text-3xl md:text-4xl font-black text-navy leading-tight">
                    {{ $settings['principal_welcome_title'] ?? 'Sambutan Kepala Sekolah' }}
                </h2>

                @if(!empty($settings['principal_quote']))
                    <blockquote class="mt-6 pl-4 border-l-4 border-gold text-navy/60 italic">
                        {{ $settings['principal_quote'] }}
                    </blockquote>
                @endif

                <div class="mt-6 text-navy/70 leading-relaxed">
                    {!! $settings['principal_welcome_body'] !!}
                </div>

                @if(!empty($settings['principal_name']))
                    <div class="mt-8 flex items-center gap-4">
                        <div class="w-12 h-px bg-gold"></div>
                        <div>
                            <p class="font-bold text-navy">{{ $settings['principal_name'] }}</p>
                            <p class="text-sm text-navy/50">{{ $settings['principal_position'] ?? 'Kepala Sekolah' }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif

{{-- About Section --}}
@if(!empty($settings['home_about_title']) || !empty($settings['home_about_body']))
<section class="py-20 md:py-28 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-5 gap-12 lg:gap-16">
            <div class="lg:col-span-3">
                @if(!empty($settings['home_about_title']))
                    <span class="inline-block px-4 py-1.5 bg-navy/5 text-navy font-semibold text-sm rounded-full mb-4">
                        {{ $settings['home_about_label'] ?? 'Tentang Kami' }}
                    </span>
                    <h2 class="text-3xl md:text-4xl font-black text-navy leading-tight">
                        {{ $settings['home_about_title'] }}
                    </h2>
                @endif

                @if(!empty($settings['home_about_body']))
                    <div class="mt-6 text-navy/70 leading-relaxed prose prose-navy max-w-none">
                        {!! $settings['home_about_body'] !!}
                    </div>
                @endif

                <div class="mt-10 flex flex-wrap gap-6">
                    @if(!empty($settings['home_about_stat_1_value']))
                        <div class="text-center">
                            <p class="text-3xl font-black text-gold">{{ $settings['home_about_stat_1_value'] }}</p>
                            <p class="text-sm text-navy/50 mt-1">{{ $settings['home_about_stat_1_label'] }}</p>
                        </div>
                    @endif
                    @if(!empty($settings['home_about_stat_2_value']))
                        <div class="text-center">
                            <p class="text-3xl font-black text-gold">{{ $settings['home_about_stat_2_value'] }}</p>
                            <p class="text-sm text-navy/50 mt-1">{{ $settings['home_about_stat_2_label'] }}</p>
                        </div>
                    @endif
                    @if(!empty($settings['home_about_stat_3_value']))
                        <div class="text-center">
                            <p class="text-3xl font-black text-gold">{{ $settings['home_about_stat_3_value'] }}</p>
                            <p class="text-sm text-navy/50 mt-1">{{ $settings['home_about_stat_3_label'] }}</p>
                        </div>
                    @endif
                </div>
            </div>

            @if(!empty($profile->alamat))
                <div class="lg:col-span-2">
                    <div class="bg-cream rounded-2xl p-8 h-full">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 bg-navy rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <h3 class="font-bold text-navy">{{ $settings['location_title'] ?? 'Lokasi' }}</h3>
                        </div>
                        <p class="text-navy/70 leading-relaxed">{{ $profile->alamat }}</p>
                        @if(!empty($profile->maps_embed_url))
                            <div class="mt-6 rounded-xl overflow-hidden aspect-video">
                                <iframe src="{{ $profile->maps_embed_url }}" width="100%" height="100%" style="border:0;" allowfullscreen loading="lazy"></iframe>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
@endif

{{-- Programs Section --}}
@if(!empty($jurusans) && $jurusans->count())
<section class="py-20 md:py-28 bg-cream">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="inline-block px-4 py-1.5 bg-navy/5 text-navy font-semibold text-sm rounded-full mb-4">
                {{ $settings['programs_label'] ?? 'Program Keahlian' }}
            </span>
            <h2 class="text-3xl md:text-4xl font-black text-navy">
                {{ $settings['programs_title'] ?? 'Program Keahlian' }}
            </h2>
            <p class="mt-4 text-navy/60">
                {{ $settings['programs_subtitle'] ?? 'Pilihan program untuk mengembangkan kompetensi dan minat siswa' }}
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @foreach($jurusans as $jurusan)
                <a href="/akademik/program/{{ $jurusan->slug }}" class="group block bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="aspect-video bg-navy/5 overflow-hidden">
                        @if(!empty($jurusan->gambar_url))
                            <img src="{{ $jurusan->gambar_url }}" alt="{{ $jurusan->nama }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-12 h-12 text-navy/15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-navy group-hover:text-gold transition-colors">{{ $jurusan->nama }}</h3>
                        @if(!empty($jurusan->singkatan))
                            <p class="text-sm text-navy/40 mt-1">{{ $jurusan->singkatan }}</p>
                        @endif
                        @if(!empty($jurusan->short_description))
                            <p class="mt-3 text-navy/60 text-sm leading-relaxed line-clamp-3">{{ $jurusan->short_description }}</p>
                        @endif
                        <div class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-gold group-hover:gap-3 transition-all">
                            {{ $settings['programs_detail_text'] ?? 'Selengkapnya' }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Stats Section --}}
@if(!empty($statistics) && count($statistics) > 0)
<section class="py-20 md:py-28 bg-navy">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($statistics as $item)
                <div class="text-center">
                    @if(!empty($item->icon))
                        <div class="w-14 h-14 mx-auto mb-4 bg-white/10 rounded-xl flex items-center justify-center">
                            <i class="{{ $item->icon }} text-gold text-2xl"></i>
                        </div>
                    @endif
                    <p class="text-3xl md:text-4xl font-black text-white">{{ $item->extra_1 ?? '' }}</p>
                    <p class="mt-2 text-white/60 text-sm">{{ $item->title ?? '' }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- News & Prestasi Section --}}
@if((!empty($beritas) && $beritas->count()) || (!empty($prestasis) && $prestasis->count()))
<section class="py-20 md:py-28 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-12">

            {{-- Berita --}}
            @if(!empty($beritas) && $beritas->count())
                <div class="lg:col-span-2">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <span class="inline-block px-4 py-1.5 bg-navy/5 text-navy font-semibold text-sm rounded-full mb-3">
                                {{ $settings['news_label'] ?? 'Berita' }}
                            </span>
                            <h2 class="text-2xl md:text-3xl font-black text-navy">{{ $settings['news_title'] ?? 'Berita Terbaru' }}</h2>
                        </div>
                        <a href="{{ route('berita.index') }}" class="hidden sm:inline-flex items-center gap-1.5 text-sm font-semibold text-gold hover:gap-3 transition-all">
                            {{ $settings['news_all_text'] ?? 'Semua Berita' }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>

                    <div class="space-y-6">
                        @foreach($beritas->take(3) as $berita)
                            <a href="{{ route('berita.show', $berita) }}" class="group flex flex-col sm:flex-row gap-5 p-4 bg-cream rounded-xl hover:shadow-md transition-all duration-300">
                                <div class="sm:w-48 flex-shrink-0 aspect-video sm:aspect-[4/3] rounded-lg overflow-hidden bg-navy/5">
                                    @if(!empty($berita->gambar_url))
                                        <img src="{{ $berita->gambar_url }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <svg class="w-8 h-8 text-navy/15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    @if(!empty($berita->kategori))
                                        <span class="inline-block px-2.5 py-0.5 bg-gold/10 text-gold text-xs font-semibold rounded-full">{{ $berita->kategori }}</span>
                                    @endif
                                    <h3 class="mt-2 font-bold text-navy group-hover:text-gold transition-colors line-clamp-2">{{ $berita->judul }}</h3>
                                    <p class="mt-1 text-sm text-navy/50">
                                        {{ $berita->tanggal_publish ? $berita->tanggal_publish->format('d M Y') : $berita->created_at->format('d M Y') }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="mt-6 sm:hidden text-center">
                        <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-gold">
                            {{ $settings['news_all_text'] ?? 'Semua Berita' }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            @endif

            {{-- Prestasi --}}
            @if(!empty($prestasis) && $prestasis->count())
                <div>
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <span class="inline-block px-4 py-1.5 bg-gold/10 text-gold font-semibold text-sm rounded-full mb-3">
                                {{ $settings['achievements_label'] ?? 'Prestasi' }}
                            </span>
                            <h2 class="text-2xl md:text-3xl font-black text-navy">{{ $settings['achievements_title'] ?? 'Prestasi' }}</h2>
                        </div>
                    </div>

                    <div class="space-y-4">
                        @foreach($prestasis->take(5) as $prestasi)
                            <a href="{{ route('prestasi.index') }}" class="group block p-4 bg-cream rounded-xl hover:shadow-md transition-all duration-300">
                                <div class="flex items-start gap-4">
                                    @if(!empty($prestasi->gambar_url))
                                        <div class="w-16 h-16 flex-shrink-0 rounded-lg overflow-hidden bg-navy/5">
                                            <img src="{{ $prestasi->gambar_url }}" alt="{{ $prestasi->nama_prestasi }}" class="w-full h-full object-cover">
                                        </div>
                                    @endif
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-bold text-navy text-sm group-hover:text-gold transition-colors line-clamp-2">{{ $prestasi->nama_prestasi }}</h4>
                                        <div class="mt-1.5 flex flex-wrap gap-1.5">
                                            @if(!empty($prestasi->tingkat))
                                                <span class="inline-block px-2 py-0.5 bg-navy/5 text-navy/60 text-xs rounded-full">{{ $prestasi->tingkat }}</span>
                                            @endif
                                            @if(!empty($prestasi->tahun))
                                                <span class="inline-block px-2 py-0.5 bg-navy/5 text-navy/60 text-xs rounded-full">{{ $prestasi->tahun }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
</section>
@endif

{{-- SPMB CTA Section --}}
<section class="py-20 md:py-28 bg-navy relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-navy-dark via-navy to-navy-light opacity-90"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-gold/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>

    <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-5xl font-black text-white leading-tight">
            {{ $settings['spmb_title'] ?? 'Siap Menjadi Bagian dari Kami?' }}
        </h2>
        @if(!empty($settings['spmb_subtitle']))
            <p class="mt-6 text-lg text-white/60 max-w-2xl mx-auto">
                {{ $settings['spmb_subtitle'] }}
            </p>
        @endif
        <div class="mt-10 flex flex-wrap justify-center gap-4">
            @if(!empty($settings['spmb_cta_url']))
                <a href="{{ $settings['spmb_cta_url'] }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gold hover:bg-gold-dark text-navy font-bold rounded-lg transition-all duration-300 shadow-lg shadow-gold/20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    {{ $settings['spmb_cta_text'] ?? 'Daftar Sekarang' }}
                </a>
            @endif
            <a href="/kontak" class="inline-flex items-center gap-2 px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-lg backdrop-blur-sm border border-white/20 transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                {{ $settings['spmb_contact_text'] ?? 'Hubungi Kami' }}
            </a>
        </div>
    </div>
</section>

@endsection
