@extends('layouts.app')

@section('title', 'Edit Jurusan')

@section('content')

<div class="container">

    <h4 class="mb-4">Edit Jurusan</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.jurusans.update', $jurusan->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Jurusan</label>
            <input
                type="text"
                name="nama"
                class="form-control"
                value="{{ old('nama', $jurusan->nama) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Singkatan</label>
            <input
                type="text"
                name="singkatan"
                class="form-control"
                value="{{ old('singkatan', $jurusan->singkatan) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Slug</label>
            <input
                type="text"
                name="slug"
                class="form-control"
                value="{{ old('slug', $jurusan->slug) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea
                name="deskripsi"
                class="form-control"
                rows="4">{{ old('deskripsi', $jurusan->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Visi</label>
            <textarea
                name="visi"
                class="form-control"
                rows="3">{{ old('visi', $jurusan->visi) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Misi</label>
            <textarea
                name="misi"
                class="form-control"
                rows="3">{{ old('misi', $jurusan->misi) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar Saat Ini</label><br>

            @if ($jurusan->gambar)
                <img src="{{ asset('storage/' . $jurusan->gambar) }}"
                     alt="Gambar Jurusan"
                     width="150"
                     class="mb-3 rounded border">
            @else
                <p class="text-muted">Belum ada gambar.</p>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Ganti Gambar</label>
            <input
                type="file"
                name="gambar"
                class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            Update
        </button>

        <a href="{{ route('admin.jurusans.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection