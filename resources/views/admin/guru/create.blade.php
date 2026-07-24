@extends('layouts.admin')

@section('title', 'Tambah Guru')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center"><h3 class="card-title mb-0">Form Tambah Guru</h3><a href="{{ route('admin.gurus.index') }}" class="btn btn-secondary btn-sm"><i class="ti ti-arrow-left me-1"></i>Kembali</a></div>
    <div class="card-body">
        @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        <form action="{{ route('admin.gurus.store') }}" method="POST" enctype="multipart/form-data">@csrf @include('admin.guru.partials.form')<button type="submit" class="btn btn-primary"><i class="ti ti-device-floppy me-1"></i>Simpan Guru</button></form>
    </div>
</div>
@endsection
