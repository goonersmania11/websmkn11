@extends('layouts.public')

@section('title', 'Penerimaan Siswa Baru')
@section('subtitle', 'SPMB')

@section('content')
    @component('components.public.page-hero', [
        'title' => $settings['spmb_title'] ?? 'Penerimaan Siswa Baru (SPMB)',
        'subtitle' => $profile->nama_sekolah ?? 'SMKN 11',
    ])
    @endcomponent

    <section class="py-16 md:py-20 bg-cream">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-16">

            {{-- Status & Info --}}
            <div class="grid gap-8 lg:grid-cols-2">
                <div class="bg-white rounded-2xl shadow-sm p-8">
                    <div class="flex items-center gap-3 mb-6">
                        <h2 class="text-2xl font-black text-navy">Informasi SPMB</h2>
                        @if(isset($settings['spmb_status']))
                            @if($settings['spmb_status'] === 'dibuka')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5 animate-pulse"></span>
                                    Dibuka
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500 mr-1.5"></span>
                                    Ditutup
                                </span>
                            @endif
                        @endif
                    </div>
                    @if($settings['spmb_description'] ?? null)
                        <div class="text-navy/70 leading-relaxed mb-6">
                            {!! $settings['spmb_description'] !!}
                        </div>
                    @endif
                    @if($settings['spmb_latest_info'] ?? null)
                        <div class="p-4 rounded-xl bg-gold/10 border border-gold/20">
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-gold shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div class="text-sm text-navy/80">{!! $settings['spmb_latest_info'] !!}</div>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Requirements --}}
                <div class="bg-white rounded-2xl shadow-sm p-8">
                    <h2 class="text-2xl font-black text-navy mb-6">Persyaratan</h2>
                    @if($requirements->count())
                        <ul class="space-y-3">
                            @foreach($requirements as $req)
                                <li class="flex items-start gap-3 text-navy/70">
                                    <span class="shrink-0 mt-1 w-6 h-6 rounded-full bg-navy/10 flex items-center justify-center text-xs font-bold text-navy">
                                        {{ $loop->iteration }}
                                    </span>
                                    <span class="leading-relaxed">{{ $req->title }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-navy/50 text-sm">Persyaratan akan segera diinformasikan.</p>
                    @endif
                </div>
            </div>

            {{-- Schedule Timeline --}}
            @if($schedules->count())
                <div class="bg-white rounded-2xl shadow-sm p-8 md:p-10">
                    <h2 class="text-2xl font-black text-navy mb-8 text-center">Jadwal</h2>
                    <div class="relative">
                        <div class="absolute left-4 md:left-1/2 top-0 bottom-0 w-0.5 bg-navy/10 -translate-x-1/2"></div>
                        <div class="space-y-8">
                            @foreach($schedules as $schedule)
                                <div class="relative flex items-start gap-6 {{ $loop->iteration % 2 === 0 ? 'md:flex-row-reverse md:text-right' : '' }}">
                                    <div class="absolute left-4 md:left-1/2 w-4 h-4 rounded-full bg-gold border-4 border-cream -translate-x-1/2 z-10 mt-1"></div>
                                    <div class="ml-12 md:ml-0 md:w-1/2 {{ $loop->iteration % 2 === 0 ? 'md:pl-12' : 'md:pr-12' }}">
                                        <div class="bg-cream/50 rounded-xl p-5">
                                            @if($schedule->extra_1)
                                                <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-semibold bg-navy/10 text-navy mb-2">
                                                    {{ $schedule->extra_1 }}
                                                </span>
                                            @endif
                                            <h3 class="text-base font-bold text-navy mb-1">{{ $schedule->title }}</h3>
                                            @if($schedule->extra_2)
                                                <p class="text-sm text-navy/60">{{ $schedule->extra_2 }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            {{-- Flow Steps --}}
            @if($flowSteps->count())
                <div>
                    <h2 class="text-2xl font-black text-navy mb-8 text-center">Alur Pendaftaran</h2>
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                        @foreach($flowSteps as $step)
                            <div class="relative bg-white rounded-2xl shadow-sm p-6 text-center">
                                <div class="w-12 h-12 rounded-full bg-navy text-white flex items-center justify-center text-lg font-black mx-auto mb-4">
                                    {{ $loop->iteration }}
                                </div>
                                <h3 class="text-base font-bold text-navy mb-2">{{ $step->title }}</h3>
                                <p class="text-sm text-navy/60 leading-relaxed">{{ $step->body }}</p>
                                @if(!$loop->last)
                                    <div class="hidden sm:block absolute top-10 -right-3 text-navy/20">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- FAQ --}}
            @if($faqs->count())
                <div class="max-w-3xl mx-auto" x-data="{ openId: null }">
                    <h2 class="text-2xl font-black text-navy mb-8 text-center">Pertanyaan Umum</h2>
                    <div class="space-y-4">
                        @foreach($faqs as $faq)
                            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                                <button
                                    @click="openId = openId === {{ $faq->id }} ? null : {{ $faq->id }}"
                                    class="w-full flex items-center justify-between p-5 text-left"
                                >
                                    <span class="text-base font-semibold text-navy">{{ $faq->title }}</span>
                                    <svg
                                        class="w-5 h-5 text-navy/40 shrink-0 ml-4 transition-transform duration-200"
                                        :class="openId === {{ $faq->id }} && 'rotate-180'"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </button>
                                <div
                                    x-show="openId === {{ $faq->id }}"
                                    x-collapse
                                    class="px-5 pb-5"
                                >
                                    <div class="text-navy/70 leading-relaxed text-sm">{!! $faq->body !!}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- CTA --}}
            @if($settings['spmb_portal_url'] ?? null)
                <div class="bg-navy rounded-2xl p-8 md:p-12 text-center">
                    <h2 class="text-2xl md:text-3xl font-black text-white mb-3">Siap Mendaftar?</h2>
                    <p class="text-white/60 mb-8 max-w-xl mx-auto">Daftarkan diri Anda melalui portal resmi penerimaan siswa baru.</p>
                    <a
                        href="{{ $settings['spmb_portal_url'] }}"
                        target="_blank"
                        class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-gold text-navy text-base font-bold hover:bg-gold-light transition-all duration-200 shadow-lg shadow-gold/20"
                    >
                        Daftar di Portal Resmi
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                    </a>
                </div>
            @endif

        </div>
    </section>
@endsection
