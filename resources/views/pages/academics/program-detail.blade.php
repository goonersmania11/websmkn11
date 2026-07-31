@extends('layouts.public')

@section('title', $program->nama)
@section('subtitle', 'Program Keahlian')

@section('content')
    <x-public.page-hero
        :title="$program->nama"
        :subtitle="$program->singkatan"
    />

    <section class="py-16 md:py-24 bg-cream">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            {{-- Breadcrumb --}}
            <nav class="mb-8 text-sm text-navy/60">
                <a href="/" class="hover:text-navy transition">{{ $settings['breadcrumb_home'] ?? 'Beranda' }}</a>
                <span class="mx-2">/</span>
                <a href="{{ url('/akademik/program-keahlian') }}" class="hover:text-navy transition">{{ $settings['breadcrumb_programs'] ?? 'Program Keahlian' }}</a>
                <span class="mx-2">/</span>
                <span class="text-gold font-medium">{{ $program->nama }}</span>
            </nav>

            <div class="grid gap-10 lg:grid-cols-3">
                {{-- Main Content --}}
                <div class="lg:col-span-2 space-y-8">
                    {{-- Tabs Navigation --}}
                    <div x-data="{ activeTab: 'overview' }" class="bg-white rounded-2xl shadow-sm overflow-hidden">
                        <div class="flex border-b border-navy/10 overflow-x-auto">
                            <button @click="activeTab = 'overview'"
                                    :class="activeTab === 'overview' ? 'border-gold text-navy font-bold' : 'border-transparent text-navy/50 hover:text-navy'"
                                    class="flex-1 min-w-[140px] px-6 py-4 text-sm font-medium border-b-2 transition-colors text-center">
                                {{ $settings['tab_overview'] ?? 'Overview' }}
                            </button>
                            <button @click="activeTab = 'competencies'"
                                    :class="activeTab === 'competencies' ? 'border-gold text-navy font-bold' : 'border-transparent text-navy/50 hover:text-navy'"
                                    class="flex-1 min-w-[140px] px-6 py-4 text-sm font-medium border-b-2 transition-colors text-center">
                                {{ $settings['tab_competencies'] ?? 'Kompetensi' }}
                            </button>
                            <button @click="activeTab = 'career'"
                                    :class="activeTab === 'career' ? 'border-gold text-navy font-bold' : 'border-transparent text-navy/50 hover:text-navy'"
                                    class="flex-1 min-w-[140px] px-6 py-4 text-sm font-medium border-b-2 transition-colors text-center">
                                {{ $settings['tab_career'] ?? 'Prospek Karir' }}
                            </button>
                            <button @click="activeTab = 'facilities'"
                                    :class="activeTab === 'facilities' ? 'border-gold text-navy font-bold' : 'border-transparent text-navy/50 hover:text-navy'"
                                    class="flex-1 min-w-[140px] px-6 py-4 text-sm font-medium border-b-2 transition-colors text-center">
                                {{ $settings['tab_facilities'] ?? 'Fasilitas' }}
                            </button>
                        </div>

                        {{-- Overview Tab --}}
                        <div x-show="activeTab === 'overview'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="p-8">
                            @if($program->gambar_url)
                                <img src="{{ $program->gambar_url }}" alt="{{ $program->nama }}" class="w-full h-64 object-cover rounded-xl mb-6">
                            @endif
                            <div class="prose prose-navy max-w-none text-navy/80 leading-relaxed">
                                {!! $program->deskripsi !!}
                            </div>
                        </div>

                        {{-- Competencies Tab --}}
                        <div x-show="activeTab === 'competencies'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="p-8">
                            @if($program->competencies && count($program->competencies))
                                <ul class="space-y-4">
                                    @foreach($program->competencies as $competency)
                                        <li class="flex items-start gap-3">
                                            <span class="mt-1 flex-shrink-0 w-6 h-6 rounded-full bg-gold/20 flex items-center justify-center">
                                                <svg class="w-3.5 h-3.5 text-gold" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                            </span>
                                            <span class="text-navy/80 leading-relaxed">{{ $competency }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-navy/40 text-center py-8">{{ $settings['empty_competencies'] ?? 'Belum ada data kompetensi' }}</p>
                            @endif
                        </div>

                        {{-- Career Prospects Tab --}}
                        <div x-show="activeTab === 'career'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="p-8">
                            @if($program->career_prospects && count($program->career_prospects))
                                <ul class="space-y-4">
                                    @foreach($program->career_prospects as $career)
                                        <li class="flex items-start gap-3">
                                            <span class="mt-1 flex-shrink-0 w-6 h-6 rounded-full bg-navy/10 flex items-center justify-center">
                                                <svg class="w-3.5 h-3.5 text-navy" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                                </svg>
                                            </span>
                                            <span class="text-navy/80 leading-relaxed">{{ $career }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-navy/40 text-center py-8">{{ $settings['empty_careers'] ?? 'Belum ada data prospek karir' }}</p>
                            @endif
                        </div>

                        {{-- Facilities Tab --}}
                        <div x-show="activeTab === 'facilities'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="p-8">
                            @if($program->facilities && count($program->facilities))
                                <ul class="space-y-4">
                                    @foreach($program->facilities as $facility)
                                        <li class="flex items-start gap-3">
                                            <span class="mt-1 flex-shrink-0 w-6 h-6 rounded-full bg-gold/20 flex items-center justify-center">
                                                <svg class="w-3.5 h-3.5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                                </svg>
                                            </span>
                                            <span class="text-navy/80 leading-relaxed">{{ $facility }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-navy/40 text-center py-8">{{ $settings['empty_facilities'] ?? 'Belum ada data fasilitas' }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="space-y-6">
                    {{-- SPMB CTA --}}
                    <div class="bg-navy rounded-2xl p-6 text-white">
                        <h3 class="text-lg font-bold mb-3">{{ $settings['spmb_cta_title'] ?? 'Daftar SPMB' }}</h3>
                        <p class="text-white/70 text-sm leading-relaxed mb-5">
                            {{ $settings['spmb_cta_description'] ?? 'Tertarik dengan program ini? Segera daftar untuk menjadi bagian dari ' . $program->nama . '!' }}
                        </p>
                        <a href="{{ url($settings['spmb_url'] ?? '/spmb') }}"
                           class="block w-full text-center py-3 rounded-xl bg-gold text-navy font-bold hover:bg-gold-light transition">
                            {{ $settings['spmb_cta_button'] ?? 'Daftar Sekarang' }}
                        </a>
                    </div>

                    {{-- Quick Info --}}
                    <div class="bg-white rounded-2xl p-6 shadow-sm">
                        <h3 class="text-lg font-bold text-navy mb-4">{{ $settings['quick_info_title'] ?? 'Informasi Singkat' }}</h3>
                        <dl class="space-y-3 text-sm">
                            @if($program->singkatan)
                                <div class="flex justify-between">
                                    <dt class="text-navy/50">{{ $settings['label_abbreviation'] ?? 'Singkatan' }}</dt>
                                    <dd class="font-medium text-navy">{{ $program->singkatan }}</dd>
                                </div>
                            @endif
                            @if($program->competencies && count($program->competencies))
                                <div class="flex justify-between">
                                    <dt class="text-navy/50">{{ $settings['label_competency_count'] ?? 'Kompetensi' }}</dt>
                                    <dd class="font-medium text-navy">{{ count($program->competencies) }} {{ $settings['unit_items'] ?? 'item' }}</dd>
                                </div>
                            @endif
                            @if($program->career_prospects && count($program->career_prospects))
                                <div class="flex justify-between">
                                    <dt class="text-navy/50">{{ $settings['label_career_count'] ?? 'Prospek Karir' }}</dt>
                                    <dd class="font-medium text-navy">{{ count($program->career_prospects) }} {{ $settings['unit_careers'] ?? 'bidang' }}</dd>
                                </div>
                            @endif
                        </dl>
                    </div>

                    {{-- Other Programs --}}
                    @if(isset($otherPrograms) && $otherPrograms->count())
                        <div class="bg-white rounded-2xl p-6 shadow-sm">
                            <h3 class="text-lg font-bold text-navy mb-4">{{ $settings['other_programs_title'] ?? 'Program Lainnya' }}</h3>
                            <ul class="space-y-3">
                                @foreach($otherPrograms as $other)
                                    <li>
                                        <a href="{{ url('/akademik/program/' . $other->slug) }}"
                                           class="flex items-center gap-3 p-3 rounded-xl hover:bg-cream transition group">
                                            @if($other->singkatan)
                                                <span class="flex-shrink-0 w-10 h-10 rounded-lg bg-gold/10 flex items-center justify-center text-xs font-bold text-gold">
                                                    {{ $other->singkatan }}
                                                </span>
                                            @endif
                                            <span class="text-sm text-navy group-hover:text-gold transition">{{ $other->nama }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
