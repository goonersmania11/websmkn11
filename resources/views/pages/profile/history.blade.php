@extends('layouts.public')

@section('title', $settings['history_hero_title'] ?? 'Sejarah Sekolah')

@section('content')

<x-public.page-hero
    :title="$settings['history_hero_title'] ?? 'Sejarah Sekolah'"
    :subtitle="$settings['history_hero_subtitle'] ?? ''"
/>

@if(!empty($settings['history_body']))
<section class="py-16 md:py-24 bg-white">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <div class="prose prose-navy max-w-none text-navy/70 leading-relaxed">
            {!! $settings['history_body'] !!}
        </div>
    </div>
</section>
@endif

@if(!empty($milestones) && count($milestones) > 0)
<section class="py-16 md:py-24 bg-cream">
    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-black text-navy">
                {{ $settings['timeline_title'] ?? 'Linimasa Perjalanan' }}
            </h2>
        </div>

        <div class="relative">
            <div class="absolute left-6 md:left-1/2 top-0 bottom-0 w-0.5 bg-navy/10 -translate-x-1/2"></div>

            @foreach($milestones as $index => $item)
                <div class="relative flex items-start gap-8 mb-12 {{ $index % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }}">
                    <div class="hidden md:block md:w-1/2 {{ $index % 2 === 0 ? 'text-right pr-12' : 'text-left pl-12' }}">
                        @if(!empty($item->extra_1))
                            <span class="inline-block px-3 py-1 bg-gold/10 text-gold font-bold text-sm rounded-full">{{ $item->extra_1 }}</span>
                        @endif
                        <h3 class="mt-3 text-xl font-bold text-navy">{{ $item->title }}</h3>
                        @if(!empty($item->body))
                            <p class="mt-2 text-navy/60 leading-relaxed">{{ $item->body }}</p>
                        @endif
                    </div>

                    <div class="absolute left-6 md:left-1/2 -translate-x-1/2 w-3 h-3 bg-gold rounded-full ring-4 ring-cream z-10 mt-1.5"></div>

                    <div class="md:hidden pl-12 flex-1">
                        @if(!empty($item->extra_1))
                            <span class="inline-block px-3 py-1 bg-gold/10 text-gold font-bold text-sm rounded-full">{{ $item->extra_1 }}</span>
                        @endif
                        <h3 class="mt-3 text-xl font-bold text-navy">{{ $item->title }}</h3>
                        @if(!empty($item->body))
                            <p class="mt-2 text-navy/60 leading-relaxed">{{ $item->body }}</p>
                        @endif
                    </div>

                    <div class="hidden md:block md:w-1/2"></div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
