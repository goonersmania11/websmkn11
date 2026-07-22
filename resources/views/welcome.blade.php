<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="UTF-8">

```
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SMKN 11 - Sekolah Menengah Kejuruan</title>

<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
            linear-gradient(
                rgba(0, 51, 102, 0.75),
                rgba(0, 51, 102, 0.75)
            ),

            url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1')
            center / cover;

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

    footer {
        background-color: #0d47a1;
        color: white;
    }

</style>
```

</head>

<body>

```
<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg sticky-top">

    <div class="container">

        <a class="navbar-brand fw-bold"
           href="#">

            <i class="bi bi-building"></i>

            SMKN 11

        </a>


        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">

            <span class="navbar-toggler-icon"></span>

        </button>


        <div class="collapse navbar-collapse"
             id="navbarMenu">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">

                    <a class="nav-link"
                       href="#beranda">

                        Beranda

                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link"
                       href="#profil">

                        Profil

                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link"
                       href="#jurusan">

                        Jurusan

                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link"
                       href="#berita">

                        Berita

                    </a>

                </li>


                <li class="nav-item">

                    <a class="nav-link"
                       href="#kontak">

                        Kontak

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>


<!-- HERO -->

<section id="beranda"
         class="hero">

    <div class="container">

        <div class="row">

            <div class="col-lg-7">

                <h1>

                    Selamat Datang di
                    <br>

                    SMKN 11

                </h1>


                <p class="lead mt-3">

                    Membangun Generasi Unggul,
                    Kreatif, dan Siap Menghadapi Dunia Kerja.

                </p>


                <a href="#profil"
                   class="btn btn-light btn-lg mt-3">

                    Jelajahi Sekolah

                </a>

            </div>

        </div>

    </div>

</section>


<!-- PROFIL -->

<section id="profil"
         class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">

                Tentang SMKN 11

            </h2>


            <p class="text-muted">

                Sekolah Menengah Kejuruan yang berkomitmen
                mencetak generasi kompeten dan berkarakter.

            </p>

        </div>


        <div class="row align-items-center">


            <div class="col-md-6">

                <h3>

                    Pendidikan Berkualitas

                </h3>


                <p>

                    SMKN 11 berkomitmen memberikan pendidikan
                    kejuruan yang berkualitas dengan mengembangkan
                    kompetensi siswa sesuai kebutuhan dunia industri.

                </p>


                <p>

                    Kami mengembangkan potensi siswa melalui
                    pembelajaran, kegiatan ekstrakurikuler,
                    dan pengalaman praktik.

                </p>

            </div>


            <div class="col-md-6">

                <div class="row text-center">


                    <div class="col-6 mb-4">

                        <div class="icon-box">

                            <i class="bi bi-people"></i>

                        </div>


                        <h5>

                            Siswa Aktif

                        </h5>

                    </div>


                    <div class="col-6 mb-4">

                        <div class="icon-box">

                            <i class="bi bi-person-workspace"></i>

                        </div>


                        <h5>

                            Guru Profesional

                        </h5>

                    </div>


                    <div class="col-6">

                        <div class="icon-box">

                            <i class="bi bi-award"></i>

                        </div>


                        <h5>

                            Berprestasi

                        </h5>

                    </div>


                    <div class="col-6">

                        <div class="icon-box">

                            <i class="bi bi-building"></i>

                        </div>


                        <h5>

                            Fasilitas Lengkap

                        </h5>

                    </div>


                </div>

            </div>

        </div>

    </div>

</section>


<!-- JURUSAN -->

<section id="jurusan"
         class="py-5 bg-white">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">

                Program Keahlian

            </h2>


            <p class="text-muted">

                Pilihan jurusan untuk mengembangkan
                kompetensi dan minat siswa.

            </p>

        </div>


        <div class="row g-4">


            <div class="col-md-4">

                <div class="card feature-card h-100 text-center p-4">

                    <div class="icon-box">

                        <i class="bi bi-code-slash"></i>

                    </div>


                    <h4 class="mt-3">

                        Rekayasa Perangkat Lunak

                    </h4>


                    <p>

                        Mempelajari pemrograman,
                        website, aplikasi, dan teknologi digital.

                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="card feature-card h-100 text-center p-4">

                    <div class="icon-box">

                        <i class="bi bi-pc-display"></i>

                    </div>


                    <h4 class="mt-3">

                        Teknik Komputer dan Jaringan

                    </h4>


                    <p>

                        Mempelajari jaringan komputer,
                        server, dan teknologi informasi.

                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="card feature-card h-100 text-center p-4">

                    <div class="icon-box">

                        <i class="bi bi-lightbulb"></i>

                    </div>


                    <h4 class="mt-3">

                        Program Keahlian

                    </h4>


                    <p>

                        Mengembangkan keterampilan
                        sesuai kebutuhan dunia kerja.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- BERITA -->

<section id="berita"
         class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">

                Berita Terbaru

            </h2>


            <p class="text-muted">

                Informasi dan berita terbaru SMKN 11.

            </p>

        </div>


        <div class="row g-4">


            <div class="col-md-4">

                <div class="card news-card h-100">

                    <img
                        src="https://images.unsplash.com/photo-1509062522246-3755977927d7"
                        class="card-img-top"
                        alt="Kegiatan Sekolah"
                    >


                    <div class="card-body">

                        <h5>

                            Kegiatan Sekolah

                        </h5>


                        <p>

                            Berbagai kegiatan positif
                            yang dilakukan oleh siswa.

                        </p>


                        <a href="#"
                           class="btn btn-primary">

                            Selengkapnya

                        </a>

                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div class="card news-card h-100">

                    <img
                        src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655"
                        class="card-img-top"
                        alt="Prestasi Siswa"
                    >


                    <div class="card-body">

                        <h5>

                            Prestasi Siswa

                        </h5>


                        <p>

                            Prestasi membanggakan
                            dari siswa SMKN 11.

                        </p>


                        <a href="#"
                           class="btn btn-primary">

                            Selengkapnya

                        </a>

                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div class="card news-card h-100">

                    <img
                        src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f"
                        class="card-img-top"
                        alt="Informasi Sekolah"
                    >


                    <div class="card-body">

                        <h5>

                            Informasi Sekolah

                        </h5>


                        <p>

                            Informasi terbaru mengenai
                            kegiatan sekolah.

                        </p>


                        <a href="#"
                           class="btn btn-primary">

                            Selengkapnya

                        </a>

                    </div>

                </div>

            </div>


        </div>

    </div>

</section>


<!-- CTA -->

<section class="py-5 bg-primary text-white text-center">

    <div class="container">

        <h2>

            Siap Menjadi Bagian dari SMKN 11?

        </h2>


        <p>

            Wujudkan masa depan bersama kami.

        </p>


        <a href="#kontak"
           class="btn btn-light">

            Hubungi Kami

        </a>

    </div>

</section>


<!-- FOOTER -->

<footer id="kontak"
        class="py-4">

    <div class="container">

        <div class="row">


            <div class="col-md-6">

                <h5>

                    SMKN 11

                </h5>


                <p>

                    Sekolah Menengah Kejuruan
                    untuk generasi masa depan.

                </p>

            </div>


            <div class="col-md-6">

                <h5>

                    Kontak

                </h5>


                <p class="mb-1">

                    <i class="bi bi-geo-alt"></i>

                    Alamat Sekolah

                </p>


                <p class="mb-1">

                    <i class="bi bi-envelope"></i>

                    Email Sekolah

                </p>


                <p>

                    <i class="bi bi-telephone"></i>

                    Nomor Telepon

                </p>

            </div>

        </div>


        <hr>


        <div class="text-center">

            © {{ date('Y') }}

            SMKN 11.

            All Rights Reserved.

        </div>

    </div>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>
```

</body>

</html>
