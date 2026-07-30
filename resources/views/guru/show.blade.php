<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $guru->nama }} - {{ $profile->nama_sekolah ?? 'SMKN 11' }}</title>

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

        .profile-img {
            width: 250px;
            height: 250px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #fff;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .profile-img-placeholder {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            border: 5px solid #fff;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            background: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profile-img-placeholder i {
            font-size: 100px;
            color: #adb5bd;
        }

        .info-label {
            font-weight: 600;
            color: #0d47a1;
            min-width: 150px;
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
                    <a class="nav-link" href="{{ url('/#guru') }}">Guru</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<a href="{{ url('/#guru') }}" class="btn btn-outline-light btn-sm" style="position: absolute; top: 80px; left: 20px; z-index: 10;">
    <i class="bi bi-arrow-left"></i> Kembali
</a>

<section class="page-header text-center">
    <div class="container">
        <h1>Profil Guru</h1>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm">
                    <div class="card-body p-5">
                        <div class="row align-items-center">
                            <div class="col-md-4 text-center mb-4 mb-md-0">
                                @if($guru->foto)
                                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}" class="profile-img">
                                @else
                                    <div class="profile-img-placeholder mx-auto">
                                        <i class="bi bi-person-circle"></i>
                                    </div>
                                @endif
                                <h4 class="mt-3">{{ $guru->nama }}</h4>
                                <span class="badge bg-primary">{{ $guru->jabatan }}</span>
                            </div>

                            <div class="col-md-8">
                                <table class="table table-borderless">
                                    <tr>
                                        <td class="info-label">Nama Lengkap</td>
                                        <td>{{ $guru->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="info-label">NIP</td>
                                        <td>{{ $guru->nip ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="info-label">Bidang Studi</td>
                                        <td>{{ $guru->bidang_studi }}</td>
                                    </tr>
                                    <tr>
                                        <td class="info-label">Jabatan</td>
                                        <td>{{ $guru->jabatan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="info-label">Tempat, Tanggal Lahir</td>
                                        <td>{{ $guru->tempat_lahir ? $guru->tempat_lahir . ', ' : '' }}{{ $guru->tanggal_lahir ? $guru->tanggal_lahir->format('d-m-Y') : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="info-label">Jenis Kelamin</td>
                                        <td>{{ $guru->jenis_kelamin ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="info-label">Alamat</td>
                                        <td>{{ $guru->alamat ?? '-' }}</td>
                                    </tr>
                                    @if($guru->social_media)
                                    <tr>
                                        <td class="info-label">Social Media</td>
                                        <td>{{ $guru->social_media }}</td>
                                    </tr>
                                    @endif
                                </table>
                            </div>
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
