@extends('layouts.public')

@section('title', 'FAQ')
@section('subtitle', 'Pertanyaan yang Sering Diajukan')

@section('content')
    @component('components.public.page-hero', [
        'title' => 'FAQ',
        'subtitle' => 'Temukan jawaban atas pertanyaan yang sering diajukan',
    ])
    @endcomponent

    @php
        $categories = $faqs->pluck('category')->filter()->unique()->values()->all();
    @endphp

    <section class="py-16 md:py-20 bg-cream" x-data="{
        search: '',
        activeCategory: 'Semua',
        get filteredFaqs() {
            let items = this.activeCategory === 'Semua'
                ? $refs.faqData
                : $refs.faqData.filter(f => f.category === this.activeCategory);
            if (this.search) {
                const q = this.search.toLowerCase();
                items = items.filter(f => f.title.toLowerCase().includes(q) || f.body.toLowerCase().includes(q));
            }
            return items;
        }
    }">
        <script type="application/json" x-ref="faqData">
            {!! $faqs->map(fn($faq) => ['id' => $faq->id, 'title' => $faq->title, 'body' => $faq->body, 'category' => $faq->category])->toJson() !!}
        </script>

        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">

            @if($faqs->count())
                {{-- Category Filters --}}
                @if($categories->count())
                    <div class="flex flex-wrap gap-2 mb-8 justify-center">
                        <button
                            @click="activeCategory = 'Semua'"
                            :class="activeCategory === 'Semua' ? 'bg-navy text-white' : 'bg-white text-navy/70 hover:bg-navy/5'"
                            class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-200"
                        >
                            Semua
                        </button>
                        @foreach($categories as $cat)
                            <button
                                @click="activeCategory = '{{ $cat }}'"
                                :class="activeCategory === '{{ $cat }}' ? 'bg-navy text-white' : 'bg-white text-navy/70 hover:bg-navy/5'"
                                class="px-4 py-2 rounded-full text-sm font-medium transition-all duration-200"
                            >
                                {{ $cat }}
                            </button>
                        @endforeach
                    </div>
                @endif

                {{-- Search --}}
                <div class="relative mb-10">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-navy/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input
                        type="text"
                        x-model="search"
                        placeholder="Cari pertanyaan..."
                        class="w-full pl-12 pr-4 py-3.5 rounded-xl bg-white border border-navy/10 text-navy placeholder-navy/40 focus:outline-none focus:ring-2 focus:ring-gold/50 focus:border-gold transition"
                    >
                </div>

                {{-- FAQ Items --}}
                <div class="space-y-4">
                    <template x-for="faq in filteredFaqs" :key="faq.id">
                        <div
                            class="bg-white rounded-xl shadow-sm overflow-hidden"
                            x-data="{ open: false }"
                        >
                            <button
                                @click="open = !open"
                                class="w-full flex items-center justify-between p-5 text-left"
                            >
                                <div class="flex items-start gap-3 flex-1 min-w-0">
                                    <span class="shrink-0 mt-0.5 w-7 h-7 rounded-full bg-gold/20 text-navy flex items-center justify-center">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" :class="open && 'rotate-180'">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </span>
                                    <span class="text-base font-semibold text-navy" x-text="faq.title"></span>
                                </div>
                                <svg
                                    class="w-5 h-5 text-navy/40 shrink-0 ml-4 transition-transform duration-200"
                                    :class="open && 'rotate-180'"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            <div
                                x-show="open"
                                x-collapse
                                class="px-5 pb-5 pl-[3.25rem]"
                            >
                                <div class="text-navy/70 leading-relaxed text-sm" x-html="faq.body"></div>
                            </div>
                        </div>
                    </template>

                    <div x-show="filteredFaqs.length === 0" class="text-center py-12">
                        <svg class="mx-auto w-12 h-12 text-navy/20 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <p class="text-navy/50">Tidak ada FAQ yang cocok dengan pencarian Anda.</p>
                    </div>
                </div>
            @else
                <div class="text-center py-20">
                    <svg class="mx-auto w-16 h-16 text-navy/20 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-navy/70 mb-2">Belum ada FAQ</h3>
                    <p class="text-navy/50">FAQ akan segera tersedia.</p>
                </div>
            @endif

        </div>
    </section>
@endsection
