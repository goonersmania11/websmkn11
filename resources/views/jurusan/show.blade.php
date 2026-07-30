<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $jurusan->nama }} - {{ $profile->nama_sekolah ?? 'SMKN 11' }}</title>

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
            background: linear-gradient(rgba(0, 51, 102, 0.85), rgba(0, 51, 102, 0.85)), center / cover;
            padding: 70px 0;
            color: white;
        }

        .jurusan-logo {
            max-height: 200px;
            object-fit: contain;
        }

        .vm-card {
            border-left: 4px solid #0d47a1;
            border-radius: 8px;
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
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/#jurusan') }}">Jurusan</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<a href="{{ url('/#jurusan') }}" class="btn btn-outline-light btn-sm" style="position: absolute; top: 80px; left: 20px; z-index: 10;">
    <i class="bi bi-arrow-left"></i> Kembali
</a>

<section class="page-header text-center">
    <div class="container">
        @if($jurusan->gambar)
            <img src="{{ asset('storage/' . $jurusan->gambar) }}" alt="{{ $jurusan->nama }}" class="jurusan-logo mb-3 bg-white p-2 rounded" style="max-height: 120px;">
        @endif
        <h1>{{ $jurusan->nama }}</h1>
        <p class="lead">{{ $jurusan->singkatan }}</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <h3 class="mb-3">Tentang {{ $jurusan->nama }}</h3>
                <p>{{ $jurusan->deskripsi }}</p>
            </div>

            <div class="col-lg-4">
                <div class="card vm-card p-4">
                    <h5><i class="bi bi-eye"></i> Visi</h5>
                    <p>{{ $jurusan->visi ?? 'Belum ada visi.' }}</p>

                    <h5 class="mt-4"><i class="bi bi-bullseye"></i> Misi</h5>
                    <p>{{ $jurusan->misi ?? 'Belum ada misi.' }}</p>
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
