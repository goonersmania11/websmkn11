@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="row row-deck row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-primary">Selamat Datang, {{ auth()->user()->name }}!</h3>
                    <p class="mb-0">Anda berhasil login ke Admin Panel SMKN 11. Silakan gunakan menu di sebelah kiri untuk mengelola konten website.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
