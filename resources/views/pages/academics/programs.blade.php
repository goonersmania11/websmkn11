@extends('layouts.public')

@section('title', 'Program Keahlian')
@section('subtitle', $settings['site_tagline'] ?? $profile->nama_sekolah ?? 'SMKN 11')

@section('content')
    <x-public.page-hero
        :title="$settings['academics_hero_title'] ?? 'Program Keahlian'"
        :subtitle="$settings['academics_hero_subtitle'] ?? 'Pilihan program keahlian untuk mengembangkan potensi dan kompetensi siswa.'"
    />

    <section class="py-16 md:py-24 bg-cream">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @if($programs->isEmpty())
                <div class="text-center py-20">
                    <svg class="mx-auto w-16 h-16 text-navy/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    <p class="mt-4 text-navy/50 text-lg">{{ $settings['empty_programs_message'] ?? 'Belum ada program keahlian' }}</p>
                </div>
            @else
                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($programs as $program)
                        <a href="{{ url('/akademik/program/' . $program->slug) }}"
                           class="group block bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300">
                            <div class="relative h-52 overflow-hidden bg-navy/5">
                                @if($program->gambar_url)
                                    <img src="{{ $program->gambar_url }}"
                                         alt="{{ $program->nama }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-navy/5 to-navy/10">
                                        <svg class="w-16 h-16 text-navy/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                    </div>
                                @endif
                                @if($program->singkatan)
                                    <span class="absolute top-3 left-3 inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gold text-navy">
                                        {{ $program->singkatan }}
                                    </span>
                                @endif
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-navy group-hover:text-gold transition-colors">
                                    {{ $program->nama }}
                                </h3>
                                @if($program->short_description)
                                    <p class="mt-3 text-navy/60 text-sm leading-relaxed line-clamp-3">
                                        {{ $program->short_description }}
                                    </p>
                                @endif
                                <div class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-gold group-hover:gap-2 transition-all">
                                    {{ $settings['read_more_text'] ?? 'Selengkapnya' }}
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
