@extends('layouts.public')

@section('title', $settings['vm_hero_title'] ?? 'Visi & Misi')

@section('content')

<x-public.page-hero
    :title="$settings['vm_hero_title'] ?? 'Visi & Misi'"
    :subtitle="$settings['vm_hero_subtitle'] ?? ''"
/>

{{-- Vision --}}
@if(!empty($profile->visi))
<section class="py-16 md:py-24 bg-cream">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <div class="bg-navy rounded-2xl p-8 md:p-12 text-center shadow-xl">
            <div class="w-14 h-14 mx-auto mb-6 bg-gold/20 rounded-xl flex items-center justify-center">
                <svg class="w-7 h-7 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            </div>
            <h2 class="text-2xl md:text-3xl font-black text-white mb-6">
                {{ $settings['vision_title'] ?? 'Visi' }}
            </h2>
            <p class="text-lg md:text-xl text-white/80 leading-relaxed max-w-3xl mx-auto">
                {{ $profile->visi }}
            </p>
        </div>
    </div>
</section>
@endif

{{-- Missions --}}
@if(!empty($missions) && count($missions) > 0)
<section class="py-16 md:py-24 bg-white">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-black text-navy">
                {{ $settings['mission_title'] ?? 'Misi' }}
            </h2>
        </div>

        <div class="space-y-4">
            @foreach($missions as $index => $mission)
                <div class="flex items-start gap-4 p-6 bg-cream rounded-xl">
                    <div class="flex-shrink-0 w-10 h-10 bg-gold rounded-lg flex items-center justify-center">
                        <span class="text-navy font-black text-sm">{{ $index + 1 }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-navy/60 leading-relaxed">{{ trim($mission) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Core Values --}}
@if(!empty($values) && count($values) > 0)
<section class="py-16 md:py-24 bg-cream">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-black text-navy">
                {{ $settings['values_title'] ?? 'Nilai-Nilai Inti' }}
            </h2>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($values as $value)
                <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300">
                    @if(!empty($value->icon))
                        <div class="w-12 h-12 bg-navy/5 rounded-xl flex items-center justify-center mb-4">
                            <i class="{{ $value->icon }} text-gold text-xl"></i>
                        </div>
                    @endif
                    @if(!empty($value->title))
                        <h3 class="font-bold text-navy text-lg">{{ $value->title }}</h3>
                    @endif
                    @if(!empty($value->body))
                        <p class="mt-2 text-navy/60 text-sm leading-relaxed">{{ $value->body }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
