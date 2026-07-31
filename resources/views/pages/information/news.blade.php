@extends('layouts.public')

@section('title', 'Berita')
@section('subtitle', 'Informasi Terbaru')

@section('content')
    @component('components.public.page-hero', [
        'title' => 'Berita',
        'subtitle' => 'Informasi dan kabar terbaru dari ' . ($profile->nama_sekolah ?? 'SMKN 11'),
    ])
    @endcomponent

    <section class="py-16 md:py-20 bg-cream">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            @if($beritas->count())
                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($beritas as $berita)
                        <a href="{{ route('berita.show', $berita->slug) }}" class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300">
                            <div class="relative h-52 overflow-hidden">
                                @if($berita->gambar_url)
                                    <img
                                        src="{{ $berita->gambar_url }}"
                                        alt="{{ $berita->judul }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    >
                                @else
                                    <div class="w-full h-full bg-navy/10 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-navy/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                        </svg>
                                    </div>
                                @endif
                                <span class="absolute top-3 left-3 inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-gold text-navy">
                                    {{ $berita->kategori }}
                                </span>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-navy group-hover:text-gold transition-colors line-clamp-2 mb-2">
                                    {{ $berita->judul }}
                                </h3>
                                <p class="text-sm text-navy/60 line-clamp-3 mb-4">
                                    {{ Str::limit(strip_tags($berita->isi), 120) }}
                                </p>
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-navy/50">
                                        {{ \Carbon\Carbon::parse($berita->tanggal_publish ?? $berita->created_at)->locale('id')->isoFormat('D MMMM YYYY') }}
                                    </span>
                                    <span class="text-xs font-medium text-gold group-hover:translate-x-1 transition-transform inline-flex items-center gap-1">
                                        Selengkapnya
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                @if(method_exists($beritas, 'links') && $beritas->hasPages())
                    <div class="mt-12">
                        {{ $beritas->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-20">
                    <svg class="mx-auto w-16 h-16 text-navy/20 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-navy/70 mb-2">Belum ada berita</h3>
                    <p class="text-navy/50">Berita terbaru akan segera hadir.</p>
                </div>
            @endif

        </div>
    </section>
@endsection
