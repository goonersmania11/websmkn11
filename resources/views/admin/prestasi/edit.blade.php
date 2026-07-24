@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Prestasi /</span> Edit Data</h4>

    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Form Ubah Prestasi</h5>
                    <a href="{{ route('admin.prestasi.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.prestasi.update', $prestasi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label" for="nama_prestasi">Nama Prestasi</label>
                            <input type="text" class="form-control @error('nama_prestasi') is-invalid @enderror" id="nama_prestasi" name="nama_prestasi" value="{{ old('nama_prestasi', $prestasi->nama_prestasi) }}" required />
                            @error('nama_prestasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="tingkat">Tingkat</label>
                                <select class="form-select @error('tingkat') is-invalid @enderror" id="tingkat" name="tingkat" required>
                                    <option value="Sekolah" {{ old('tingkat', $prestasi->tingkat) == 'Sekolah' ? 'selected' : '' }}>Sekolah</option>
                                    <option value="Kecamatan" {{ old('tingkat', $prestasi->tingkat) == 'Kecamatan' ? 'selected' : '' }}>Kecamatan</option>
                                    <option value="Kabupaten/Kota" {{ old('tingkat', $prestasi->tingkat) == 'Kabupaten/Kota' ? 'selected' : '' }}>Kabupaten/Kota</option>
                                    <option value="Provinsi" {{ old('tingkat', $prestasi->tingkat) == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                                    <option value="Nasional" {{ old('tingkat', $prestasi->tingkat) == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                                    <option value="Internasional" {{ old('tingkat', $prestasi->tingkat) == 'Internasional' ? 'selected' : '' }}>Internasional</option>
                                </select>
                                @error('tingkat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="kategori">Kategori</label>
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" value="{{ old('kategori', $prestasi->kategori) }}" required />
                                @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="tahun">Tahun</label>
                                <input type="number" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" value="{{ old('tahun', $prestasi->tahun) }}" required />
                                @error('tahun') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="penerima">Nama Penerima / Siswa</label>
                            <input type="text" class="form-control @error('penerima') is-invalid @enderror" id="penerima" name="penerima" value="{{ old('penerima', $prestasi->penerima) }}" required />
                            @error('penerima') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="gambar">Foto Penghargaan / Dokumentasi</label>
                            @if($prestasi->gambar)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $prestasi->gambar) }}" alt="Gambar Lama" class="rounded d-block" width="150">
                                    <small class="text-muted">Gambar saat ini</small>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*" />
                            <small class="text-muted">Pilih file baru jika ingin mengganti gambar.</small>
                            @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="deskripsi">Deskripsi Singkat</label>
                            <textarea id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5" required>{{ old('deskripsi', $prestasi->deskripsi) }}</textarea>
                            @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Perbarui Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
