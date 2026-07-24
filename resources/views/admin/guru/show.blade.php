@extends('layouts.admin')

@section('title', 'Detail Guru')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Detail Guru</h4>
        <a href="{{ route('admin.gurus.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 mb-3">
                    @if($guru->foto)
                        <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto {{ $guru->nama }}" class="img-fluid rounded border">
                    @else
                        <p class="text-muted">Belum ada foto.</p>
                    @endif
                </div>
                <div class="col-md-9">
                    <table class="table table-borderless mb-0">
                        <tr><th width="220">Nama</th><td>{{ $guru->nama }}</td></tr>
                        <tr><th>NIP</th><td>{{ $guru->nip }}</td></tr>
                        <tr><th>Bidang Studi</th><td>{{ $guru->bidang_studi }}</td></tr>
                        <tr><th>Tempat, Tanggal Lahir</th><td>{{ $guru->tempat_lahir }}, {{ $guru->tanggal_lahir->format('d-m-Y') }}</td></tr>
                        <tr><th>Jenis Kelamin</th><td>{{ $guru->jenis_kelamin }}</td></tr>
                        <tr><th>Jabatan</th><td>{{ $guru->jabatan }}</td></tr>
                        <tr><th>Social Media</th><td>{{ $guru->social_media ?: '-' }}</td></tr>
                        <tr><th>Alamat</th><td>{!! nl2br(e($guru->alamat)) !!}</td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
