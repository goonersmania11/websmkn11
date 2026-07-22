@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Edit Informasi SPMB</h4>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('spmb.update', $spmb->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Judul / Nama Gelombang</label>
                    <input type="text" class="form-control" name="judul" value="{{ $spmb->judul }}" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jadwal Pendaftaran</label>
                        <input type="text" class="form-control" name="jadwal" value="{{ $spmb->jadwal }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Link Form Pendaftaran (URL)</label>
                        <input type="url" class="form-control" name="link_pendaftaran" value="{{ $spmb->link_pendaftaran }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi Umum</label>
                    <textarea class="form-control" name="isi" rows="4" required>{{ $spmb->isi }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Persyaratan Pendaftaran</label>
                    <textarea class="form-control" name="persyaratan" rows="4">{{ $spmb->persyaratan }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alur Pendaftaran</label>
                    <textarea class="form-control" name="alur_pendaftaran" rows="4">{{ $spmb->alur_pendaftaran }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui Informasi</button>
                <a href="{{ route('spmb.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection