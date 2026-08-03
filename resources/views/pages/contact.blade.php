@extends('layouts.public')

@section('title', 'Kontak')
@section('subtitle', 'Hubungi Kami')

@section('content')
    @component('components.public.page-hero', [
        'title' => 'Kontak',
        'subtitle' => 'Hubungi kami untuk informasi lebih lanjut',
    ])
    @endcomponent

    <section class="py-16 md:py-20 bg-cream">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Flash Messages --}}
            @if(session('success'))
                <div class="mb-8 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm flex items-center gap-3">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-8 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid gap-10 lg:grid-cols-2">

                {{-- Form --}}
                <div class="bg-white rounded-2xl shadow-sm p-8">
                    <h2 class="text-2xl font-black text-navy mb-2">Kirim Pesan</h2>
                    <p class="text-navy/60 text-sm mb-8">Isi form di bawah ini dan kami akan segera merespons.</p>

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-medium text-navy mb-1.5">Nama Lengkap</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                placeholder="Masukkan nama Anda"
                                class="w-full px-4 py-3 rounded-xl bg-cream/50 border border-navy/10 text-navy placeholder-navy/40 focus:outline-none focus:ring-2 focus:ring-gold/50 focus:border-gold transition"
                            >
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-navy mb-1.5">Email</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                placeholder="Masukkan email Anda"
                                class="w-full px-4 py-3 rounded-xl bg-cream/50 border border-navy/10 text-navy placeholder-navy/40 focus:outline-none focus:ring-2 focus:ring-gold/50 focus:border-gold transition"
                            >
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-navy mb-1.5">Subjek</label>
                            <input
                                type="text"
                                id="subject"
                                name="subject"
                                value="{{ old('subject') }}"
                                required
                                placeholder="Subjek pesan"
                                class="w-full px-4 py-3 rounded-xl bg-cream/50 border border-navy/10 text-navy placeholder-navy/40 focus:outline-none focus:ring-2 focus:ring-gold/50 focus:border-gold transition"
                            >
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-navy mb-1.5">Pesan</label>
                            <textarea
                                id="message"
                                name="message"
                                rows="5"
                                required
                                placeholder="Tuliskan pesan Anda..."
                                class="w-full px-4 py-3 rounded-xl bg-cream/50 border border-navy/10 text-navy placeholder-navy/40 focus:outline-none focus:ring-2 focus:ring-gold/50 focus:border-gold transition resize-none"
                            >{{ old('message') }}</textarea>
                        </div>

                        <button
                            type="submit"
                            class="w-full px-6 py-3.5 rounded-xl bg-navy text-white font-bold hover:bg-navy-light transition-colors duration-200"
                        >
                            Kirim Pesan
                        </button>
                    </form>
                </div>

                {{-- Info --}}
                <div class="space-y-6">
                    <div class="bg-white rounded-2xl shadow-sm p-8">
                        <h2 class="text-2xl font-black text-navy mb-6">Informasi Kontak</h2>
                        <div class="space-y-5">
                            @if($profile->alamat ?? null)
                                <div class="flex items-start gap-4">
                                    <div class="shrink-0 w-10 h-10 rounded-lg bg-navy/5 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-navy" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-semibold text-navy mb-0.5">Alamat</h3>
                                        <p class="text-sm text-navy/60">{{ $profile->alamat }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($profile->phone ?? null)
                                <div class="flex items-start gap-4">
                                    <div class="shrink-0 w-10 h-10 rounded-lg bg-navy/5 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-navy" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-semibold text-navy mb-0.5">Telepon</h3>
                                        <p class="text-sm text-navy/60">{{ $profile->phone }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($profile->email ?? null)
                                <div class="flex items-start gap-4">
                                    <div class="shrink-0 w-10 h-10 rounded-lg bg-navy/5 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-navy" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-semibold text-navy mb-0.5">Email</h3>
                                        <p class="text-sm text-navy/60">{{ $profile->email }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($settings['service_hours'] ?? null)
                                <div class="flex items-start gap-4">
                                    <div class="shrink-0 w-10 h-10 rounded-lg bg-navy/5 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-navy" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-sm font-semibold text-navy mb-0.5">Jam Operasional</h3>
                                        <p class="text-sm text-navy/60">{{ $settings['service_hours'] }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Google Maps --}}
                    @if($profile->maps_embed_url ?? null)
                        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                            <iframe
                                src="{{ $profile->maps_embed_url }}"
                                width="100%"
                                height="300"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                            ></iframe>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>
@endsection
