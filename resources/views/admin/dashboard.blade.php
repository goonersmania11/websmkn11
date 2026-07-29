@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    @php
        $stats = [
            ['label' => 'User', 'count' => \App\Models\User::count(), 'color' => 'primary'],
            ['label' => 'Profil', 'count' => \App\Models\Profile::count(), 'color' => 'success'],
            ['label' => 'Jurusan', 'count' => \App\Models\Jurusan::count(), 'color' => 'info'],
            ['label' => 'Guru', 'count' => \App\Models\Guru::count(), 'color' => 'warning'],
            ['label' => 'Berita', 'count' => \App\Models\Berita::count(), 'color' => 'danger'],
            ['label' => 'Prestasi', 'count' => \App\Models\Prestasi::count(), 'color' => 'purple'],
            ['label' => 'Pengumuman', 'count' => \App\Models\Pengumuman::count(), 'color' => 'teal'],
            ['label' => 'Agenda', 'count' => \App\Models\Agenda::count(), 'color' => 'secondary'],
        ];
    @endphp

    <div class="row row-deck row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-primary">Selamat Datang, {{ auth()->user()->name }}!</h3>
                    <p class="mb-0">Anda berhasil login ke Admin Panel SMKN 11. Berikut ringkasan data yang saat ini tersedia di sistem.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cards mt-3">
        @foreach ($stats as $stat)
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <div class="subheader">{{ $stat['label'] }}</div>
                                <div class="h1 mb-0">{{ $stat['count'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
