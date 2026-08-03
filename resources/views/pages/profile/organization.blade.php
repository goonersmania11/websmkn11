@extends('layouts.public')

@section('title', $settings['org_hero_title'] ?? 'Struktur Organisasi')

@section('content')

<x-public.page-hero
    :title="$settings['org_hero_title'] ?? 'Struktur Organisasi'"
    :subtitle="$settings['org_hero_subtitle'] ?? ''"
/>

{{-- Principal --}}
@if(!empty($principals) && count($principals) > 0)
<section class="py-16 md:py-24 bg-cream">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-black text-navy">
                {{ $settings['org_principal_title'] ?? 'Kepala Sekolah' }}
            </h2>
        </div>

        <div class="flex flex-wrap justify-center gap-8">
            @foreach($principals as $guru)
                <a href="{{ route('guru.show', $guru) }}" class="group text-center max-w-xs">
                    <div class="relative w-32 h-32 mx-auto rounded-full overflow-hidden bg-navy/5 ring-4 ring-gold/20 group-hover:ring-gold/40 transition-all duration-300">
                        @if(!empty($guru->foto_url))
                            <img src="{{ $guru->foto_url }}" alt="{{ $guru->nama }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-12 h-12 text-navy/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                        @endif
                    </div>
                    <h3 class="mt-4 font-bold text-navy group-hover:text-gold transition-colors">{{ $guru->nama }}</h3>
                    @if(!empty($guru->jabatan))
                        <p class="mt-1 text-sm text-navy/50">{{ $guru->jabatan }}</p>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Vice Principals --}}
@if(!empty($vicePrincipals) && count($vicePrincipals) > 0)
<section class="py-16 md:py-24 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-black text-navy">
                {{ $settings['org_vice_title'] ?? 'Wakil Kepala Sekolah' }}
            </h2>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 justify-items-center">
            @foreach($vicePrincipals as $guru)
                <a href="{{ route('guru.show', $guru) }}" class="group text-center w-full max-w-xs">
                    <div class="relative w-28 h-28 mx-auto rounded-full overflow-hidden bg-navy/5 ring-2 ring-navy/10 group-hover:ring-gold/40 transition-all duration-300">
                        @if(!empty($guru->foto_url))
                            <img src="{{ $guru->foto_url }}" alt="{{ $guru->nama }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-10 h-10 text-navy/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                        @endif
                    </div>
                    <h3 class="mt-4 font-bold text-navy group-hover:text-gold transition-colors">{{ $guru->nama }}</h3>
                    @if(!empty($guru->jabatan))
                        <p class="mt-1 text-sm text-navy/50">{{ $guru->jabatan }}</p>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Department Heads --}}
@if(!empty($departmentHeads) && count($departmentHeads) > 0)
<section class="py-16 md:py-24 bg-cream">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-black text-navy">
                {{ $settings['org_dept_title'] ?? 'Kepala Departemen' }}
            </h2>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($departmentHeads as $guru)
                <a href="{{ route('guru.show', $guru) }}" class="group bg-white p-5 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 text-center">
                    <div class="relative w-20 h-20 mx-auto rounded-full overflow-hidden bg-navy/5 ring-2 ring-navy/10 group-hover:ring-gold/40 transition-all duration-300">
                        @if(!empty($guru->foto_url))
                            <img src="{{ $guru->foto_url }}" alt="{{ $guru->nama }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-8 h-8 text-navy/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                        @endif
                    </div>
                    <h3 class="mt-3 font-bold text-navy text-sm group-hover:text-gold transition-colors">{{ $guru->nama }}</h3>
                    @if(!empty($guru->jabatan))
                        <p class="mt-1 text-xs text-navy/50">{{ $guru->jabatan }}</p>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- All Teachers --}}
@if(!empty($gurus) && count($gurus) > 0)
<section class="py-16 md:py-24 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-black text-navy">
                {{ $settings['org_teachers_title'] ?? 'Guru & Tenaga Kependidikan' }}
            </h2>
            <p class="mt-4 text-navy/60 max-w-2xl mx-auto">
                {{ $settings['org_teachers_subtitle'] ?? 'Tenaga pendidik profesional yang berdedikasi' }}
            </p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 md:gap-6">
            @foreach($gurus as $guru)
                <a href="{{ route('guru.show', $guru) }}" class="group bg-cream rounded-xl overflow-hidden hover:shadow-md transition-all duration-300">
                    <div class="aspect-[3/4] bg-navy/5 overflow-hidden">
                        @if(!empty($guru->foto_url))
                            <img src="{{ $guru->foto_url }}" alt="{{ $guru->nama }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-10 h-10 text-navy/15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-3 text-center">
                        <h4 class="font-bold text-navy text-sm group-hover:text-gold transition-colors line-clamp-2">{{ $guru->nama }}</h4>
                        @if(!empty($guru->jabatan))
                            <p class="mt-1 text-xs text-navy/50 line-clamp-1">{{ $guru->jabatan }}</p>
                        @endif
                        @if(!empty($guru->bidang_studi))
                            <p class="mt-0.5 text-xs text-gold line-clamp-1">{{ $guru->bidang_studi }}</p>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
