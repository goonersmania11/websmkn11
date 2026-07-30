<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pengumuman->judul }} - {{ $profile->nama_sekolah ?? 'SMKN 11' }}</title>

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

        .page-header {
            background: linear-gradient(rgba(0, 51, 102, 0.8), rgba(0, 51, 102, 0.8)), center / cover;
            padding: 60px 0;
            color: white;
        }

        .pengumuman-content {
            font-size: 1.05rem;
            line-height: 1.8;
        }

        footer {
            background-color: #0d47a1;
            color: white;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
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
                    <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<a href="{{ url('/') }}" class="btn btn-outline-light btn-sm" style="position: absolute; top: 80px; left: 20px; z-index: 10;">
    <i class="bi bi-arrow-left"></i> Kembali
</a>

<section class="page-header">
    <div class="container">
        <h1>{{ $pengumuman->judul }}</h1>
        <div class="d-flex align-items-center gap-3 mt-2">
            <small><i class="bi bi-calendar"></i> {{ \Carbon\Carbon::parse($pengumuman->tanggal)->format('d M Y') }}</small>
            <span class="badge bg-success">{{ $pengumuman->status }}</span>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body p-5">
                        <div class="pengumuman-content">
                            {!! nl2br(e($pengumuman->isi)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="py-4">
    <div class="container text-center">
        <p class="mb-0">&copy; {{ date('Y') }} {{ $profile->nama_sekolah ?? 'SMKN 11' }}. All Rights Reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
