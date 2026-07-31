@extends('layouts.public')

@section('title', $berita->judul)
@section('subtitle', 'Berita')

@section('content')
    @component('components.public.page-hero', [
        'title' => $berita->judul,
        'subtitle' => $berita->kategori,
    ])
    @endcomponent

    <section class="py-12 md:py-16 bg-cream">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <nav class="mb-8 text-sm text-navy/60">
                <a href="{{ route('berita.index') }}" class="hover:text-navy transition">Berita</a>
                <span class="mx-2">/</span>
                <span class="text-navy font-medium">{{ $berita->judul }}</span>
            </nav>

            <div class="grid gap-10 lg:grid-cols-[1fr_320px]">

                {{-- Main Article --}}
                <article class="bg-white rounded-2xl shadow-sm overflow-hidden">
                    @if($berita->gambar_url)
                        <div class="relative h-64 md:h-80">
                            <img
                                src="{{ $berita->gambar_url }}"
                                alt="{{ $berita->judul }}"
                                class="w-full h-full object-cover"
                            >
                        </div>
                    @endif

                    <div class="p-6 md:p-10">
                        <div class="flex flex-wrap items-center gap-3 mb-6 text-sm text-navy/60">
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                {{ $berita->user->name ?? 'Admin' }}
                            </span>
                            <span class="w-1 h-1 rounded-full bg-navy/30"></span>
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ \Carbon\Carbon::parse($berita->tanggal_publish ?? $berita->created_at)->locale('id')->isoFormat('D MMMM YYYY') }}
                            </span>
                            <span class="w-1 h-1 rounded-full bg-navy/30"></span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gold/20 text-navy">
                                {{ $berita->kategori }}
                            </span>
                        </div>

                        <h1 class="text-2xl md:text-3xl font-black text-navy mb-8 leading-tight">
                            {{ $berita->judul }}
                        </h1>

                        <div class="prose prose-lg max-w-none text-navy/80 prose-headings:text-navy prose-a:text-gold hover:prose-a:text-gold/80 prose-img:rounded-xl">
                            {!! $berita->isi !!}
                        </div>

                        <div class="mt-10 pt-6 border-t border-navy/10">
                            <button
                                onclick="navigator.clipboard.writeText(window.location.href).then(() => { this.textContent = 'Tautan disalin!'; setTimeout(() => { this.textContent = 'Salin URL'; }, 2000); })"
                                class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-medium bg-navy/5 text-navy hover:bg-navy/10 transition"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                                Salin URL
                            </button>
                        </div>
                    </div>
                </article>

                {{-- Sidebar --}}
                <aside class="space-y-6">
                    @if($related->count())
                        <div class="bg-white rounded-2xl shadow-sm p-6">
                            <h3 class="text-lg font-bold text-navy mb-4">Berita Terkait</h3>
                            <div class="space-y-4">
                                @foreach($related as $item)
                                    <a href="{{ route('berita.show', $item->slug) }}" class="group flex gap-3">
                                        <div class="shrink-0 w-20 h-20 rounded-lg overflow-hidden bg-navy/5">
                                            @if($item->gambar_url)
                                                <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center">
                                                    <svg class="w-6 h-6 text-navy/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h4 class="text-sm font-semibold text-navy group-hover:text-gold transition-colors line-clamp-2">{{ $item->judul }}</h4>
                                            <span class="text-xs text-navy/50 mt-1 block">
                                                {{ \Carbon\Carbon::parse($item->tanggal_publish ?? $item->created_at)->locale('id')->isoFormat('D MMMM YYYY') }}
                                            </span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="bg-navy rounded-2xl p-6 text-center">
                        <h3 class="text-lg font-bold text-white mb-2">Berita Terbaru</h3>
                        <p class="text-white/60 text-sm mb-4">Ikuti perkembangan terkini dari {{ $profile->nama_sekolah ?? 'SMKN 11' }}.</p>
                        <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-gold text-navy text-sm font-bold hover:bg-gold-light transition">
                            Lihat Semua Berita
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </aside>

            </div>
        </div>
    </section>
@endsection
