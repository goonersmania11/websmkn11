@extends('layouts.public')

@section('title', 'Ekstrakurikuler')
@section('subtitle', $settings['site_tagline'] ?? $profile->nama_sekolah ?? 'SMKN 11')

@section('content')
    <x-public.page-hero
        :title="$settings['extracurriculars_hero_title'] ?? 'Kegiatan Ekstrakurikuler'"
        :subtitle="$settings['extracurriculars_hero_subtitle'] ?? 'Pengembangan minat dan bakat di luar kegiatan akademik.'"
    />

    @php
        $categories = $extracurriculars->pluck('category')->filter()->unique()->values()->all();
    @endphp

    <section class="py-16 md:py-24 bg-cream">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" x-data="{ activeCategory: 'all' }">

            {{-- Filter Buttons --}}
            @if(count($categories) > 0)
                <div class="flex flex-wrap justify-center gap-3 mb-12">
                    <button @click="activeCategory = 'all'"
                            :class="activeCategory === 'all' ? 'bg-navy text-white' : 'bg-white text-navy/60 hover:text-navy hover:bg-navy/5'"
                            class="px-5 py-2.5 rounded-full text-sm font-semibold transition-all duration-200">
                        {{ $settings['filter_all'] ?? 'Semua' }}
                    </button>
                    @foreach($categories as $category)
                        <button @click="activeCategory = '{{ $category }}'"
                                :class="activeCategory === '{{ $category }}' ? 'bg-navy text-white' : 'bg-white text-navy/60 hover:text-navy hover:bg-navy/5'"
                                class="px-5 py-2.5 rounded-full text-sm font-semibold transition-all duration-200">
                            {{ $category }}
                        </button>
                    @endforeach
                </div>
            @endif

            {{-- Extracurriculars Grid --}}
            @if($extracurriculars->isEmpty())
                <div class="text-center py-20">
                    <svg class="mx-auto w-16 h-16 text-navy/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <p class="mt-4 text-navy/50 text-lg">{{ $settings['empty_extracurriculars'] ?? 'Belum ada ekstrakurikuler' }}</p>
                </div>
            @else
                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($extracurriculars as $ekskul)
                        <div x-show="activeCategory === 'all' || activeCategory === '{{ $ekskul->category ?? '' }}'"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 group">
                            <div class="relative h-52 overflow-hidden bg-navy/5">
                                @if($ekskul->image_url)
                                    <img src="{{ $ekskul->image_url }}"
                                         alt="{{ $ekskul->title }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-navy/5 to-navy/10">
                                        <svg class="w-16 h-16 text-navy/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                    </div>
                                @endif
                                @if($ekskul->category)
                                    <span class="absolute top-3 left-3 inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gold text-navy">
                                        {{ $ekskul->category }}
                                    </span>
                                @endif
                            </div>
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-navy group-hover:text-gold transition-colors">
                                    {{ $ekskul->title }}
                                </h3>
                                @if($ekskul->summary)
                                    <p class="mt-3 text-navy/60 text-sm leading-relaxed line-clamp-2">
                                        {{ $ekskul->summary }}
                                    </p>
                                @endif
                                <div class="mt-4 flex flex-wrap items-center gap-4 text-xs text-navy/50">
                                    @if($ekskul->extra_1)
                                        <div class="flex items-center gap-1.5">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                            <span>{{ $ekskul->extra_1 }}</span>
                                        </div>
                                    @endif
                                    @if($ekskul->extra_2)
                                        <div class="flex items-center gap-1.5">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <span>{{ $ekskul->extra_2 }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
