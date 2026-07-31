@extends('layouts.public')

@section('title', 'Galeri')
@section('subtitle', $settings['site_tagline'] ?? $profile->nama_sekolah ?? 'SMKN 11')

@section('content')
    <x-public.page-hero
        :title="$settings['gallery_hero_title'] ?? 'Galeri Foto'"
        :subtitle="$settings['gallery_hero_subtitle'] ?? 'Dokumentasi kegiatan dan momen-momen penting sekolah.'"
    />

    @php
        $categories = $galleryItems->pluck('category')->filter()->unique()->values()->all();
    @endphp

    <section class="py-16 md:py-24 bg-cream"
             x-data="{
                 activeCategory: 'all',
                 lightboxOpen: false,
                 lightboxImage: '',
                 lightboxCaption: '',
                 lightboxIndex: 0,
                 get filteredItems() {
                     return {{ $galleryItems->toJson() }}.filter(item =>
                         (this.activeCategory === 'all' || item.category === this.activeCategory)
                     );
                 },
                 openLightbox(index) {
                     this.lightboxIndex = index;
                     const item = this.filteredItems[index];
                     this.lightboxImage = item.image_url;
                     this.lightboxCaption = item.title;
                     this.lightboxOpen = true;
                 },
                 closeLightbox() {
                     this.lightboxOpen = false;
                 },
                 nextImage() {
                     this.lightboxIndex = (this.lightboxIndex + 1) % this.filteredItems.length;
                     const item = this.filteredItems[this.lightboxIndex];
                     this.lightboxImage = item.image_url;
                     this.lightboxCaption = item.title;
                 },
                 prevImage() {
                     this.lightboxIndex = (this.lightboxIndex - 1 + this.filteredItems.length) % this.filteredItems.length;
                     const item = this.filteredItems[this.lightboxIndex];
                     this.lightboxImage = item.image_url;
                     this.lightboxCaption = item.title;
                 }
             }">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

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

            {{-- Masonry Grid --}}
            @if($galleryItems->isEmpty())
                <div class="text-center py-20">
                    <svg class="mx-auto w-16 h-16 text-navy/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <p class="mt-4 text-navy/50 text-lg">{{ $settings['empty_gallery'] ?? 'Belum ada galeri' }}</p>
                </div>
            @else
                <div class="columns-1 sm:columns-2 lg:columns-3 gap-4 space-y-4">
                    @foreach($galleryItems as $item)
                        <div x-show="activeCategory === 'all' || activeCategory === '{{ $item->category ?? '' }}'"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             class="break-inside-avoid">
                            <button @click="openLightbox({{ $loop->index }})"
                                    class="relative block w-full rounded-2xl overflow-hidden group cursor-pointer shadow-sm hover:shadow-lg transition-all duration-300">
                                @if($item->image_url)
                                    <img src="{{ $item->image_url }}"
                                         alt="{{ $item->title }}"
                                         class="w-full object-cover group-hover:scale-105 transition-transform duration-500"
                                         style="min-height: 200px;">
                                @else
                                    <div class="w-full h-48 flex items-center justify-center bg-gradient-to-br from-navy/5 to-navy/10">
                                        <svg class="w-12 h-12 text-navy/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif
                                {{-- Caption Overlay --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-navy/80 via-navy/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-5">
                                    <div>
                                        <h4 class="text-white font-bold text-sm leading-snug">{{ $item->title }}</h4>
                                        @if($item->category)
                                            <span class="inline-block mt-2 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-gold/90 text-navy">
                                                {{ $item->category }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </button>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Lightbox Modal --}}
            <div x-show="lightboxOpen"
                 x-cloak
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 z-[100] flex items-center justify-center bg-navy/95 backdrop-blur-sm p-4"
                 @keydown.escape.window="closeLightbox()"
                 @keydown.left.window="prevImage()"
                 @keydown.right.window="nextImage()">

                {{-- Close Button --}}
                <button @click="closeLightbox()"
                        class="absolute top-4 right-4 z-10 w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-white/20 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                {{-- Prev Button --}}
                <button @click="prevImage()"
                        class="absolute left-4 z-10 w-12 h-12 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-white/20 transition"
                        x-show="filteredItems.length > 1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>

                {{-- Next Button --}}
                <button @click="nextImage()"
                        class="absolute right-4 z-10 w-12 h-12 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-white/20 transition"
                        x-show="filteredItems.length > 1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>

                {{-- Image --}}
                <div class="relative max-w-5xl w-full" @click.stop>
                    <img :src="lightboxImage" :alt="lightboxCaption"
                         class="w-full max-h-[80vh] object-contain rounded-xl">
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-center">
                        <p x-text="lightboxCaption" class="text-white font-bold text-lg drop-shadow-lg"></p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    @push('styles')
        <style>
            [x-cloak] { display: none !important; }
        </style>
    @endpush
@endsection
