@extends('layouts.admin')

@section('title', 'Edit Konten')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Form Edit: {{ $item->title }}</h3>
    </div>
    <form action="{{ route('admin.content-items.update', $item) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="card-body">
            @include('admin.content-items.partials.form', ['item' => $item])
        </div>
        <div class="card-footer d-flex justify-content-end gap-2">
            <a href="{{ route('admin.content-items.index', ['type' => $item->type]) }}" class="btn btn-ghost">Batal</a>
            <button class="btn btn-primary">Perbarui</button>
        </div>
    </form>
</div>
@endsection
