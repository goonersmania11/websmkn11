<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->nama_sekolah ?? 'SMKN 11' }} - Sekolah Menengah Kejuruan</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #0d47a1;
        }

        .navbar-brand,
        .nav-link {
            color: white !important;
        }

        .hero {
            min-height: 600px;
            background:
                linear-gradient(rgba(0, 51, 102, 0.75), rgba(0, 51, 102, 0.75)),
                url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1') center / cover;
            display: flex;
            align-items: center;
            color: white;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: bold;
        }

        .section-title {
            font-weight: bold;
            color: #0d47a1;
        }

        .feature-card {
            transition: 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-8px);
        }

        .icon-box {
            font-size: 45px;
            color: #0d47a1;
        }

        .news-card img {
            height: 200px;
            object-fit: cover;
        }

        .prestasi-card img {
            height: 180px;
            object-fit: cover;
        }

        .guru-card img {
            height: 200px;
            object-fit: cover;
        }

        footer {
            background-color: #0d47a1;
            color: white;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            @if($profile && $profile->logo)
                <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo" style="height: 30px;" class="me-2">
            @else
                <i class="bi bi-building"></i>
            @endif
            {{ $profile->nama_sekolah ?? 'SMKN 11' }}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#beranda">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#profil">Profil</a>
                </li>
                @if($jurusans->count())
                <li class="nav-item">
                    <a class="nav-link" href="#jurusan">Jurusan</a>
                </li>
                @endif
                @if($beritas->count())
                <li class="nav-item">
                    <a class="nav-link" href="#berita">Berita</a>
                </li>
                @endif
                @if($prestasis->count())
                <li class="nav-item">
                    <a class="nav-link" href="#prestasi">Prestasi</a>
                </li>
                @endif
                @if($gurus->count())
                <li class="nav-item">
                    <a class="nav-link" href="#guru">Guru</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="#kontak">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- HERO -->
<section id="beranda" class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h1>
                    Selamat Datang di
                    <br>
                    {{ $profile->nama_sekolah ?? 'SMKN 11' }}
                </h1>
                <p class="lead mt-3">
                    {{ $profile->deskripsi ?? 'Membangun Generasi Unggul, Kreatif, dan Siap Menghadapi Dunia Kerja.' }}
                </p>
                <a href="#profil" class="btn btn-light btn-lg mt-3">
                    Jelajahi Sekolah
                </a>
            </div>
        </div>
    </div>
</section>

<!-- PROFIL -->
<section id="profil" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Tentang {{ $profile->nama_sekolah ?? 'SMKN 11' }}</h2>
            <p class="text-muted">
                {{ $profile->deskripsi ?? 'Sekolah Menengah Kejuruan yang berkomitmen mencetak generasi kompeten dan berkarakter.' }}
            </p>
        </div>

        <div class="row align-items-center">
            <div class="col-md-6">
                <h3>Visi</h3>
                <p>{{ $profile->visi ?? '-' }}</p>

                <h3 class="mt-4">Misi</h3>
                <p>{{ $profile->misi ?? '-' }}</p>
            </div>

            <div class="col-md-6">
                <div class="row text-center">
                    <div class="col-6 mb-4">
                        <div class="icon-box">
                            <i class="bi bi-people"></i>
                        </div>
                        <h5>{{ $gurus->count() }} Guru</h5>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="icon-box">
                            <i class="bi bi-book"></i>
                        </div>
                        <h5>{{ $jurusans->count() }} Jurusan</h5>
                    </div>
                    <div class="col-6">
                        <div class="icon-box">
                            <i class="bi bi-award"></i>
                        </div>
                        <h5>{{ $prestasis->count() }} Prestasi</h5>
                    </div>
                    <div class="col-6">
                        <div class="icon-box">
                            <i class="bi bi-newspaper"></i>
                        </div>
                        <h5>{{ $beritas->count() }} Berita</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JURUSAN -->
@if($jurusans->count())
<section id="jurusan" class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Program Keahlian</h2>
            <p class="text-muted">Pilihan jurusan untuk mengembangkan kompetensi dan minat siswa.</p>
        </div>

        <div class="row g-4">
            @foreach($jurusans as $jurusan)
            <div class="col-md-4">
                <div class="card feature-card h-100 text-center p-4">
                    @if($jurusan->gambar)
                        <img src="{{ asset('storage/' . $jurusan->gambar) }}" alt="{{ $jurusan->nama }}" class="mb-3" style="height: 120px; object-fit: contain;">
                    @else
                        <div class="icon-box">
                            <i class="bi bi-bookmark-star"></i>
                        </div>
                    @endif
                    <h4 class="mt-3">{{ $jurusan->nama }}</h4>
                    <p class="text-muted small">{{ $jurusan->singkatan }}</p>
                    <p>{{ $jurusan->deskripsi }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- BERITA -->
@if($beritas->count())
<section id="berita" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Berita Terbaru</h2>
            <p class="text-muted">Informasi dan berita terbaru {{ $profile->nama_sekolah ?? 'SMKN 11' }}.</p>
        </div>

        <div class="row g-4">
            @foreach($beritas as $berita)
            <div class="col-md-4">
                <div class="card news-card h-100">
                    @if($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" alt="{{ $berita->judul }}">
                    @else
                        <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7" class="card-img-top" alt="{{ $berita->judul }}">
                    @endif
                    <div class="card-body">
                        <span class="badge bg-primary mb-2">{{ $berita->kategori }}</span>
                        <h5>{{ $berita->judul }}</h5>
                        <p class="text-muted small">
                            <i class="bi bi-calendar"></i>
                            {{ $berita->tanggal_publish ? \Carbon\Carbon::parse($berita->tanggal_publish)->format('d M Y') : $berita->created_at->format('d M Y') }}
                        </p>
                        <p>{{ Str::limit(strip_tags($berita->isi), 100) }}</p>
                        <a href="#" class="btn btn-primary">Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- PRESTASI -->
@if($prestasis->count())
<section id="prestasi" class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Prestasi Terbaru</h2>
            <p class="text-muted">Pencapaian membanggakan dari siswa {{ $profile->nama_sekolah ?? 'SMKN 11' }}.</p>
        </div>

        <div class="row g-4">
            @foreach($prestasis as $prestasi)
            <div class="col-md-4">
                <div class="card prestasi-card h-100">
                    @if($prestasi->gambar)
                        <img src="{{ asset('storage/' . $prestasi->gambar) }}" class="card-img-top" alt="{{ $prestasi->nama_prestasi }}">
                    @endif
                    <div class="card-body">
                        <div class="d-flex gap-2 mb-2">
                            <span class="badge bg-success">{{ $prestasi->tingkat }}</span>
                            <span class="badge bg-info">{{ $prestasi->kategori }}</span>
                            <span class="badge bg-secondary">{{ $prestasi->tahun }}</span>
                        </div>
                        <h5>{{ $prestasi->nama_prestasi }}</h5>
                        <p class="text-muted small">
                            <i class="bi bi-person"></i> {{ $prestasi->penerima }}
                        </p>
                        <p>{{ Str::limit($prestasi->deskripsi, 100) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- GURU -->
@if($gurus->count())
<section id="guru" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Tenaga Pendidik</h2>
            <p class="text-muted">Guru dan tenaga kependidikan profesional di {{ $profile->nama_sekolah ?? 'SMKN 11' }}.</p>
        </div>

        <div class="row g-4">
            @foreach($gurus as $guru)
            <div class="col-md-3 col-6">
                <div class="card guru-card h-100 text-center">
                    @if($guru->foto)
                        <img src="{{ asset('storage/' . $guru->foto) }}" class="card-img-top" alt="{{ $guru->nama }}">
                    @else
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="bi bi-person-circle" style="font-size: 80px; color: #ccc;"></i>
                        </div>
                    @endif
                    <div class="card-body">
                        <h6 class="card-title mb-1">{{ $guru->nama }}</h6>
                        <small class="text-muted">{{ $guru->bidang_studi }}</small>
                        <br>
                        <small class="badge bg-light text-dark mt-1">{{ $guru->jabatan }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- PENGUMUMAN & AGENDA -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-4">
            <!-- Pengumuman -->
            @if($pengumumans->count())
            <div class="col-md-6">
                <h3 class="section-title mb-4">
                    <i class="bi bi-megaphone"></i> Pengumuman
                </h3>
                <div class="list-group">
                    @foreach($pengumumans as $pengumuman)
                    <div class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="mb-1">{{ $pengumuman->judul }}</h6>
                                <small class="text-muted">
                                    <i class="bi bi-calendar"></i>
                                    {{ \Carbon\Carbon::parse($pengumuman->tanggal)->format('d M Y') }}
                                </small>
                            </div>
                            <span class="badge bg-success">Aktif</span>
                        </div>
                        <p class="mb-0 mt-2 small">{{ Str::limit($pengumuman->isi, 120) }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Agenda -->
            @if($agendas->count())
            <div class="col-md-6">
                <h3 class="section-title mb-4">
                    <i class="bi bi-calendar-event"></i> Agenda
                </h3>
                <div class="list-group">
                    @foreach($agendas as $agenda)
                    <div class="list-group-item list-group-item-action">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="mb-1">{{ $agenda->judul }}</h6>
                                <small class="text-muted">
                                    <i class="bi bi-clock"></i>
                                    {{ \Carbon\Carbon::parse($agenda->tanggal)->format('d M Y') }} - {{ $agenda->waktu }}
                                </small>
                            </div>
                            <span class="badge bg-info">
                                <i class="bi bi-geo-alt"></i> {{ $agenda->lokasi }}
                            </span>
                        </div>
                        <p class="mb-0 mt-2 small">{{ Str::limit($agenda->deskripsi, 120) }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-5 bg-primary text-white text-center">
    <div class="container">
        <h2>Siap Menjadi Bagian dari {{ $profile->nama_sekolah ?? 'SMKN 11' }}?</h2>
        <p>Wujudkan masa depan bersama kami.</p>
        <a href="#kontak" class="btn btn-light">Hubungi Kami</a>
    </div>
</section>

<!-- FOOTER -->
<footer id="kontak" class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>{{ $profile->nama_sekolah ?? 'SMKN 11' }}</h5>
                <p>{{ $profile->deskripsi ?? 'Sekolah Menengah Kejuruan untuk generasi masa depan.' }}</p>
            </div>
            <div class="col-md-6">
                <h5>Kontak</h5>
                <p class="mb-1">
                    <i class="bi bi-geo-alt"></i>
                    {{ $profile->alamat ?? 'Alamat Sekolah' }}
                </p>
                <p class="mb-1">
                    <i class="bi bi-envelope"></i>
                    admin@smkn11.sch.id
                </p>
                <p>
                    <i class="bi bi-telephone"></i>
                    (021) 123456
                </p>
            </div>
        </div>
        <hr>
        <div class="text-center">
            &copy; {{ date('Y') }} {{ $profile->nama_sekolah ?? 'SMKN 11' }}. All Rights Reserved.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
