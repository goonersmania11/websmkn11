@extends('layouts.admin')

@section('title', 'Tambah Konten')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Konten</h3>
    </div>
    <form action="{{ route('admin.content-items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            @include('admin.content-items.partials.form')
        </div>
        <div class="card-footer d-flex justify-content-end gap-2">
            <a href="{{ route('admin.content-items.index', ['type' => $type]) }}" class="btn btn-ghost">Batal</a>
            <button class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
