@extends('layouts.public')

@section('title', $guru->nama)
@section('subtitle', 'Profil Guru')

@section('content')
    <x-public.page-hero
        :title="$guru->nama"
        :subtitle="$guru->jabatan"
    />

    <section class="py-12 md:py-16 bg-cream">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <nav class="mb-8 text-sm text-navy/60">
                <a href="{{ url('/') }}" class="hover:text-navy transition">Beranda</a>
                <span class="mx-2">/</span>
                <a href="{{ url('/profil/struktur-organisasi') }}" class="hover:text-navy transition">Struktur Organisasi</a>
                <span class="mx-2">/</span>
                <span class="text-gold font-medium">{{ $guru->nama }}</span>
            </nav>

            <div class="grid gap-8 lg:grid-cols-[280px_1fr]">
                <aside class="bg-navy rounded-2xl p-6 text-center text-white h-fit">
                    <div class="mx-auto w-40 h-40 rounded-full overflow-hidden bg-white/10 ring-4 ring-gold/30">
                        @if($guru->foto_url)
                            <img src="{{ $guru->foto_url }}" alt="{{ $guru->nama }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <h1 class="mt-6 text-xl font-black">{{ $guru->nama }}</h1>
                    <p class="mt-2 inline-flex rounded-full bg-gold px-3 py-1 text-sm font-semibold text-navy">{{ $guru->jabatan }}</p>

                    @if($guru->bidang_studi)
                        <p class="mt-4 text-sm text-white/70">{{ $guru->bidang_studi }}</p>
                    @endif
                </aside>

                <article class="bg-white rounded-2xl shadow-sm p-6 md:p-8">
                    <div class="flex items-center gap-3 mb-8">
                        <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-gold/15 text-gold">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A4 4 0 017 10h10a4 4 0 011.879 7.804M15 10a3 3 0 10-6 0 3 3 0 006 0z"/>
                            </svg>
                        </span>
                        <div>
                            <p class="text-sm text-navy/50">Profil Pendidik</p>
                            <h2 class="text-xl font-bold text-navy">Informasi Guru</h2>
                        </div>
                    </div>

                    <dl class="divide-y divide-navy/10">
                        <div class="grid gap-1 py-4 sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-navy/50">Nama Lengkap</dt>
                            <dd class="sm:col-span-2 font-semibold text-navy">{{ $guru->nama }}</dd>
                        </div>
                        <div class="grid gap-1 py-4 sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-navy/50">NIP</dt>
                            <dd class="sm:col-span-2 text-navy/80">{{ $guru->nip ?: '-' }}</dd>
                        </div>
                        <div class="grid gap-1 py-4 sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-navy/50">Bidang Studi</dt>
                            <dd class="sm:col-span-2 text-navy/80">{{ $guru->bidang_studi ?: '-' }}</dd>
                        </div>
                        <div class="grid gap-1 py-4 sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-navy/50">Jabatan</dt>
                            <dd class="sm:col-span-2 text-navy/80">{{ $guru->jabatan ?: '-' }}</dd>
                        </div>
                        <div class="grid gap-1 py-4 sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-navy/50">Tempat, Tanggal Lahir</dt>
                            <dd class="sm:col-span-2 text-navy/80">
                                @if($guru->tempat_lahir || $guru->tanggal_lahir)
                                    {{ $guru->tempat_lahir }}{{ $guru->tempat_lahir && $guru->tanggal_lahir ? ', ' : '' }}{{ $guru->tanggal_lahir?->translatedFormat('d F Y') }}
                                @else
                                    -
                                @endif
                            </dd>
                        </div>
                        <div class="grid gap-1 py-4 sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-navy/50">Jenis Kelamin</dt>
                            <dd class="sm:col-span-2 text-navy/80">{{ $guru->jenis_kelamin ?: '-' }}</dd>
                        </div>
                        <div class="grid gap-1 py-4 sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-navy/50">Alamat</dt>
                            <dd class="sm:col-span-2 text-navy/80 leading-relaxed">{{ $guru->alamat ?: '-' }}</dd>
                        </div>
                        @if($guru->social_media)
                            <div class="grid gap-1 py-4 sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-navy/50">Media Sosial</dt>
                                <dd class="sm:col-span-2 text-navy/80 break-all">{{ $guru->social_media }}</dd>
                            </div>
                        @endif
                    </dl>

                    <div class="mt-8 pt-6 border-t border-navy/10">
                        <a href="{{ url('/profil/struktur-organisasi') }}" class="inline-flex items-center gap-2 rounded-lg bg-navy px-5 py-3 text-sm font-semibold text-white hover:bg-navy-light transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                            Kembali ke Struktur Organisasi
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>
@endsection
