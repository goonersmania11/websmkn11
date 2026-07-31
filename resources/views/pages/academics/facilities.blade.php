@extends('layouts.public')

@section('title', 'Fasilitas')
@section('subtitle', $settings['site_tagline'] ?? $profile->nama_sekolah ?? 'SMKN 11')

@section('content')
    <x-public.page-hero
        :title="$settings['facilities_hero_title'] ?? 'Fasilitas Sekolah'"
        :subtitle="$settings['facilities_hero_subtitle'] ?? 'Fasilitas pendukung untuk menunjang kegiatan belajar mengajar.'"
    />

    @php
        $categories = $facilities->pluck('category')->filter()->unique()->values()->all();
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

            {{-- Facilities Grid --}}
            @if($facilities->isEmpty())
                <div class="text-center py-20">
                    <svg class="mx-auto w-16 h-16 text-navy/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <p class="mt-4 text-navy/50 text-lg">{{ $settings['empty_facilities'] ?? 'Belum ada fasilitas' }}</p>
                </div>
            @else
                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($facilities as $facility)
                        <div x-show="activeCategory === 'all' || activeCategory === '{{ $facility->category ?? '' }}'"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 group">
                            <div class="relative h-52 overflow-hidden bg-navy/5">
                                @if($facility->image_url)
                                    <img src="{{ $facility->image_url }}"
                                         alt="{{ $facility->title }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-navy/5 to-navy/10">
                                        <svg class="w-16 h-16 text-navy/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                    </div>
                                @endif
                                @if($facility->category)
                                    <span class="absolute top-3 left-3 inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gold text-navy">
                                        {{ $facility->category }}
                                    </span>
                                @endif
                            </div>
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-navy group-hover:text-gold transition-colors">
                                    {{ $facility->title }}
                                </h3>
                                @if($facility->summary)
                                    <p class="mt-3 text-navy/60 text-sm leading-relaxed line-clamp-3">
                                        {{ $facility->summary }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
