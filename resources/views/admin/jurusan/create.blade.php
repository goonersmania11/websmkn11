@extends('layouts.admin')

@section('title', 'Tambah Jurusan')

@section('content')
<div class="container">
    <h4 class="mb-4">Tambah Jurusan</h4>

    <form action="{{ route('admin.jurusans.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama Jurusan</label>
            <input type="text" name="nama" class="form-control">
        </div>

        <div class="mb-3">
            <label>Singkatan</label>
            <input type="text" name="singkatan" class="form-control">
        </div>

        <div class="mb-3">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Visi</label>
            <textarea name="visi" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Misi</label>
            <textarea name="misi" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </form>
</div>
@endsection