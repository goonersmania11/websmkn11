<div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input id="nama" type="text" name="nama" class="form-control" value="{{ old('nama', $guru->nama ?? '') }}">
</div>

<div class="mb-3">
    <label for="nip" class="form-label">NIP</label>
    <input id="nip" type="text" name="nip" class="form-control" value="{{ old('nip', $guru->nip ?? '') }}">
</div>

<div class="mb-3">
    <label for="bidang_studi" class="form-label">Bidang Studi</label>
    <input id="bidang_studi" type="text" name="bidang_studi" class="form-control" value="{{ old('bidang_studi', $guru->bidang_studi ?? '') }}">
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
        <input id="tempat_lahir" type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $guru->tempat_lahir ?? '') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
        <input id="tanggal_lahir" type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', isset($guru) ? $guru->tanggal_lahir->format('Y-m-d') : '') }}">
    </div>
</div>

<div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea id="alamat" name="alamat" class="form-control" rows="3">{{ old('alamat', $guru->alamat ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="social_media" class="form-label">Social Media</label>
    <input id="social_media" type="text" name="social_media" class="form-control" value="{{ old('social_media', $guru->social_media ?? '') }}">
</div>

<div class="mb-3">
    <label for="jabatan" class="form-label">Jabatan</label>
    <input id="jabatan" type="text" name="jabatan" class="form-control" value="{{ old('jabatan', $guru->jabatan ?? '') }}">
</div>

<div class="mb-3">
    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
    <select id="jenis_kelamin" name="jenis_kelamin" class="form-select">
        <option value="">Pilih jenis kelamin</option>
        @foreach(['Laki-laki', 'Perempuan'] as $jenisKelamin)
            <option value="{{ $jenisKelamin }}" @selected(old('jenis_kelamin', $guru->jenis_kelamin ?? '') === $jenisKelamin)>{{ $jenisKelamin }}</option>
        @endforeach
    </select>
</div>

@isset($guru)
    <div class="mb-3">
        <label class="form-label">Foto Saat Ini</label><br>
        @if($guru->foto)
            <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto {{ $guru->nama }}" width="120" class="rounded border">
        @else
            <span class="text-muted">Belum ada foto.</span>
        @endif
    </div>
@endisset

<div class="mb-3">
    <label for="foto" class="form-label">@isset($guru) Ganti @endisset Foto</label>
    <input id="foto" type="file" name="foto" class="form-control" accept="image/jpeg,image/png">
</div>
