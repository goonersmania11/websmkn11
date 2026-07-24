@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Tambah Agenda</h4>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.agenda.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Judul Agenda</label>
                    <input type="text" class="form-control" name="judul" required>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Waktu (Jam)</label>
                        <input type="time" class="form-control" name="waktu" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Lokasi</label>
                        <input type="text" class="form-control" name="lokasi" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Poster / Gambar (Opsional)</label>
                    <input type="file" class="form-control" name="gambar" accept="image/*">
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.agenda.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
