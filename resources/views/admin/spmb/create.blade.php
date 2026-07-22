@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Tambah Informasi SPMB</h4>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('spmb.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Judul / Nama Gelombang</label>
                    <input type="text" class="form-control" name="judul" placeholder="Contoh: Penerimaan Siswa Baru Gelombang 1" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jadwal Pendaftaran</label>
                        <input type="text" class="form-control" name="jadwal" placeholder="Contoh: 1 Mei - 30 Juni 2026">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Link Form Pendaftaran (URL)</label>
                        <input type="url" class="form-control" name="link_pendaftaran" placeholder="https://spmb.smkn11.sch.id">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi Umun</label>
                    <textarea class="form-control" name="isi" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Persyaratan Pendaftaran</label>
                    <textarea class="form-control" name="persyaratan" rows="4" placeholder="Tuliskan berkas/syarat yang dibutuhkan..."></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alur Pendaftaran</label>
                    <textarea class="form-control" name="alur_pendaftaran" rows="4" placeholder="Jelaskan langkah-langkah pendaftarannya..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Informasi</button>
                <a href="{{ route('spmb.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection