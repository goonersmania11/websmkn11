@extends('layouts.app')

@section('title', 'Edit Profil Sekolah')

@section('content')

<div class="container">

    <h4 class="mb-4">Edit Profil Sekolah</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.profiles.update', $profile->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Sekolah</label>
            <input type="text"
                   name="nama_sekolah"
                   class="form-control"
                   value="{{ old('nama_sekolah', $profile->nama_sekolah) }}">
        </div>

        <div class="mb-3">
            <label>Logo Saat Ini</label><br>

            @if($profile->logo)
                <img src="{{ asset('storage/'.$profile->logo) }}"
                     width="120"
                     class="mb-2 border rounded">
            @endif

            <input type="file"
                   name="logo"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat"
                      class="form-control">{{ old('alamat', $profile->alamat) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi"
                      class="form-control">{{ old('deskripsi', $profile->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Sejarah</label>
            <textarea name="sejarah"
                      rows="5"
                      class="form-control">{{ old('sejarah', $profile->sejarah) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Visi</label>
            <textarea name="visi"
                      class="form-control">{{ old('visi', $profile->visi) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Misi</label>
            <textarea name="misi"
                      rows="5"
                      class="form-control">{{ old('misi', $profile->misi) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Sambutan Kepala Sekolah</label>
            <textarea name="sambutan_kepala_sekolah"
                      rows="6"
                      class="form-control">{{ old('sambutan_kepala_sekolah', $profile->sambutan_kepala_sekolah) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Foto Kepala Sekolah Saat Ini</label><br>

            @if($profile->foto_kepala_sekolah)
                <img src="{{ asset('storage/'.$profile->foto_kepala_sekolah) }}"
                     width="120"
                     class="mb-2 border rounded">
            @endif

            <input type="file"
                   name="foto_kepala_sekolah"
                   class="form-control">
        </div>

        <button class="btn btn-primary">
            Update
        </button>

        <a href="{{ route('admin.profiles.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection