@extends('layouts.admin')

@section('title', 'Tambah Jurusan')

@section('content')

<div class="row row-cards">

    <div class="col-12">

        <div class="card">

            <div class="card-header">

                <h3 class="card-title">

                    <i class="ti ti-plus me-2"></i>

                    Tambah Jurusan

                </h3>

                <div class="card-actions">

                    <a href="{{ route('admin.jurusans.index') }}"
                       class="btn btn-secondary">

                        <i class="ti ti-arrow-left me-1"></i>

                        Kembali

                    </a>

                </div>

            </div>


            <div class="card-body">

                @if ($errors->any())

                    <div class="alert alert-danger">

                        <h4 class="alert-title">

                            Terdapat kesalahan!

                        </h4>

                        <ul class="mb-0">

                            @foreach ($errors->all() as $error)

                                <li>

                                    {{ $error }}

                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <form action="{{ route('admin.jurusans.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf


                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label required">

                                Nama Jurusan

                            </label>

                            <input type="text"
                                   name="nama"
                                   class="form-control @error('nama') is-invalid @enderror"
                                   value="{{ old('nama') }}"
                                   placeholder="Contoh: Rekayasa Perangkat Lunak">

                            @error('nama')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>


                        <div class="col-md-6 mb-3">

                            <label class="form-label required">

                                Singkatan

                            </label>

                            <input type="text"
                                   name="singkatan"
                                   class="form-control @error('singkatan') is-invalid @enderror"
                                   value="{{ old('singkatan') }}"
                                   placeholder="Contoh: RPL">

                            @error('singkatan')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>


                        <div class="col-md-6 mb-3">

                            <label class="form-label required">

                                Slug

                            </label>

                            <input type="text"
                                   name="slug"
                                   class="form-control @error('slug') is-invalid @enderror"
                                   value="{{ old('slug') }}"
                                   placeholder="contoh-rekayasa-perangkat-lunak">

                            @error('slug')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>


                        <div class="col-12 mb-3">

                            <label class="form-label">

                                Deskripsi

                            </label>

                            <textarea name="deskripsi"
                                      rows="5"
                                      class="form-control @error('deskripsi') is-invalid @enderror"
                                      placeholder="Masukkan deskripsi jurusan">{{ old('deskripsi') }}</textarea>

                            @error('deskripsi')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>


                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Visi

                            </label>

                            <textarea name="visi"
                                      rows="5"
                                      class="form-control @error('visi') is-invalid @enderror"
                                      placeholder="Masukkan visi jurusan">{{ old('visi') }}</textarea>

                            @error('visi')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>


                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Misi

                            </label>

                            <textarea name="misi"
                                      rows="5"
                                      class="form-control @error('misi') is-invalid @enderror"
                                      placeholder="Masukkan misi jurusan">{{ old('misi') }}</textarea>

                            @error('misi')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>


                        <div class="col-12 mb-3">

                            <label class="form-label">

                                Gambar Jurusan

                            </label>

                            <input type="file"
                                   name="gambar"
                                   class="form-control @error('gambar') is-invalid @enderror"
                                   accept="image/*">

                            <div class="form-hint">

                                Upload gambar jurusan.

                            </div>

                            @error('gambar')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                    </div>


                    <div class="border-top pt-3 mt-3">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="ti ti-device-floppy me-1"></i>

                            Simpan Jurusan

                        </button>


                        <a href="{{ route('admin.jurusans.index') }}"
                           class="btn btn-link">

                            Batal

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection