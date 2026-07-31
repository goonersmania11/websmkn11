@extends('layouts.public')

@section('title', 'Prestasi')
@section('subtitle', $settings['site_tagline'] ?? $profile->nama_sekolah ?? 'SMKN 11')

@section('content')
    <x-public.page-hero
        :title="$settings['achievements_hero_title'] ?? 'Prestasi Siswa'"
        :subtitle="$settings['achievements_hero_subtitle'] ?? 'Pencapaian membanggakan dari siswa-siswi sekolah.'"
    />

    @php
        $years = $achievements->pluck('tahun')->filter()->unique()->sortDesc()->values()->all();
        $levels = $achievements->pluck('tingkat')->filter()->unique()->values()->all();
    @endphp

    <section class="py-16 md:py-24 bg-cream"
             x-data="{ activeYear: 'all', activeLevel: 'all' }">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Filters --}}
            <div class="flex flex-wrap gap-4 mb-12">
                {{-- Year Filter --}}
                @if(count($years) > 0)
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="text-sm font-semibold text-navy/50">{{ $settings['filter_year'] ?? 'Tahun' }}:</span>
                        <button @click="activeYear = 'all'"
                                :class="activeYear === 'all' ? 'bg-navy text-white' : 'bg-white text-navy/60 hover:text-navy'"
                                class="px-4 py-2 rounded-full text-sm font-medium transition-all">
                            {{ $settings['filter_all'] ?? 'Semua' }}
                        </button>
                        @foreach($years as $year)
                            <button @click="activeYear = '{{ $year }}'"
                                    :class="activeYear === '{{ $year }}' ? 'bg-navy text-white' : 'bg-white text-navy/60 hover:text-navy'"
                                    class="px-4 py-2 rounded-full text-sm font-medium transition-all">
                                {{ $year }}
                            </button>
                        @endforeach
                    </div>
                @endif

                {{-- Level Filter --}}
                @if(count($levels) > 0)
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="text-sm font-semibold text-navy/50">{{ $settings['filter_level'] ?? 'Tingkat' }}:</span>
                        <button @click="activeLevel = 'all'"
                                :class="activeLevel === 'all' ? 'bg-navy text-white' : 'bg-white text-navy/60 hover:text-navy'"
                                class="px-4 py-2 rounded-full text-sm font-medium transition-all">
                            {{ $settings['filter_all'] ?? 'Semua' }}
                        </button>
                        @foreach($levels as $level)
                            <button @click="activeLevel = '{{ $level }}'"
                                    :class="activeLevel === '{{ $level }}' ? 'bg-navy text-white' : 'bg-white text-navy/60 hover:text-navy'"
                                    class="px-4 py-2 rounded-full text-sm font-medium transition-all">
                                {{ $level }}
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Achievements List --}}
            @if($achievements->isEmpty())
                <div class="text-center py-20">
                    <svg class="mx-auto w-16 h-16 text-navy/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                    </svg>
                    <p class="mt-4 text-navy/50 text-lg">{{ $settings['empty_achievements'] ?? 'Belum ada prestasi' }}</p>
                </div>
            @else
                <div class="grid gap-6">
                    @foreach($achievements as $achievement)
                        <div x-show="(activeYear === 'all' || activeYear === '{{ $achievement->tahun ?? '' }}') && (activeLevel === 'all' || activeLevel === '{{ $achievement->tingkat ?? '' }}')"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-all duration-300">
                            <div class="flex flex-col sm:flex-row sm:items-start gap-5">
                                {{-- Rank Badge --}}
                                <div class="flex-shrink-0">
                                    <div class="w-16 h-16 rounded-2xl bg-gold/10 flex items-center justify-center">
                                        <span class="text-2xl font-black text-gold">{{ $achievement->rank ?? '-' }}</span>
                                    </div>
                                </div>

                                {{-- Info --}}
                                <div class="flex-1 min-w-0">
                                    <div class="flex flex-wrap items-center gap-2 mb-2">
                                        @if($achievement->tingkat)
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-navy text-white">
                                                {{ $achievement->tingkat }}
                                            </span>
                                        @endif
                                        @if($achievement->tahun)
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-cream text-navy">
                                                {{ $achievement->tahun }}
                                            </span>
                                        @endif
                                    </div>
                                    <h3 class="text-lg font-bold text-navy">{{ $achievement->nama_prestasi }}</h3>
                                    @if($achievement->event)
                                        <p class="mt-1 text-sm text-navy/50">{{ $achievement->event }}</p>
                                    @endif
                                    @if($achievement->penerima)
                                        <div class="mt-3 flex items-start gap-2">
                                            <svg class="w-4 h-4 text-navy/30 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                            <span class="text-sm text-navy/60">{{ $achievement->penerima }}</span>
                                        </div>
                                    @endif
                                    @if($achievement->deskripsi)
                                        <p class="mt-3 text-sm text-navy/50 leading-relaxed line-clamp-2">
                                            {{ $achievement->deskripsi }}
                                        </p>
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
