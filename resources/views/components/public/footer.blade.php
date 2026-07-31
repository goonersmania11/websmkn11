@php
    $profile = $profile ?? \App\Models\Profile::first();
    $siteName = $profile->nama_sekolah ?? 'SMKN 11';
    $logoUrl = $profile?->logo_url ?? asset('assets/logo.png');
    $programs = \App\Models\Jurusan::published()->ordered()->limit(6)->get();
@endphp

<footer class="bg-navy text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">

            <div class="sm:col-span-2 lg:col-span-1">
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ $logoUrl }}" alt="{{ $siteName }}" class="h-10 w-auto" onerror="this.style.display='none'">
                    <span class="font-bold text-lg">{{ $siteName }}</span>
                </div>
                <p class="text-white/70 text-sm leading-relaxed">
                    {{ $profile->deskripsi ?? 'Sekolah menengah kejuruan unggul yang menyiapkan lulusan kompeten dan berkarakter.' }}
                </p>
                <div class="flex gap-3 mt-4">
                    @if($profile?->facebook_url)
                        <a href="{{ $profile->facebook_url }}" target="_blank" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-gold/80 transition" aria-label="Facebook">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                    @endif
                    @if($profile?->instagram_url)
                        <a href="{{ $profile->instagram_url }}" target="_blank" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-gold/80 transition" aria-label="Instagram">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/></svg>
                        </a>
                    @endif
                    @if($profile?->youtube_url)
                        <a href="{{ $profile->youtube_url }}" target="_blank" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-gold/80 transition" aria-label="YouTube">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    @endif
                </div>
            </div>

            <div>
                <h3 class="font-bold text-gold mb-4 uppercase tracking-wider text-sm">Tautan Cepat</h3>
                <ul class="space-y-2 text-sm text-white/70">
                    <li><a href="/profil/sejarah" class="hover:text-white transition">Sejarah</a></li>
                    <li><a href="/profil/visi-misi" class="hover:text-white transition">Visi & Misi</a></li>
                    <li><a href="/profil/struktur-organisasi" class="hover:text-white transition">Struktur Organisasi</a></li>
                    <li><a href="/informasi/berita" class="hover:text-white transition">Berita</a></li>
                    <li><a href="/informasi/faq" class="hover:text-white transition">FAQ</a></li>
                    <li><a href="/kontak" class="hover:text-white transition">Kontak</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold text-gold mb-4 uppercase tracking-wider text-sm">Program Keahlian</h3>
                <ul class="space-y-2 text-sm text-white/70">
                    @forelse($programs as $prog)
                        <li><a href="/akademik/program/{{ $prog->slug }}" class="hover:text-white transition">{{ $prog->nama }}</a></li>
                    @empty
                        <li class="text-white/40">Belum ada data</li>
                    @endforelse
                </ul>
            </div>

            <div>
                <h3 class="font-bold text-gold mb-4 uppercase tracking-wider text-sm">Kontak</h3>
                <ul class="space-y-3 text-sm text-white/70">
                    @if($profile?->address)
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>{{ $profile->address }}</span>
                        </li>
                    @endif
                    @if($profile?->phone)
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>{{ $profile->phone }}</span>
                        </li>
                    @endif
                    @if($profile?->email)
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span>{{ $profile->email }}</span>
                        </li>
                    @endif
                </ul>
            </div>

        </div>
    </div>

    <div class="border-t border-white/10 py-6 text-center text-sm text-white/50">
        &copy; {{ date('Y') }} {{ $siteName }}. Hak Cipta Dilindungi.
    </div>
</footer>
