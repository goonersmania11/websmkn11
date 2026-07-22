@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Berita /</span> Edit Berita</h4>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Form Ubah Berita</h5>
                    <a href="{{ route('berita.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label" for="judul">Judul Berita</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $berita->judul) }}" required />
                            @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="kategori">Kategori</label>
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" value="{{ old('kategori', $berita->kategori) }}" required />
                                @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="status">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                    <option value="Draft" {{ old('status', $berita->status) == 'Draft' ? 'selected' : '' }}>Draft (Simpan Sementara)</option>
                                    <option value="Published" {{ old('status', $berita->status) == 'Published' ? 'selected' : '' }}>Published (Terbitkan)</option>
                                </select>
                                @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="gambar">Gambar Utama</label>
                            @if($berita->gambar)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Lama" class="rounded d-block" width="150">
                                    <small class="text-muted">Gambar saat ini</small>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*" />
                            <small class="text-muted">Pilih file baru jika ingin mengganti gambar.</small>
                            @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="isi">Isi Berita</label>
                            <textarea id="isi" class="form-control @error('isi') is-invalid @enderror" name="isi" rows="8" required>{{ old('isi', $berita->isi) }}</textarea>
                            @error('isi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Perbarui Berita</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection