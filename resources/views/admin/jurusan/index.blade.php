@extends('layouts.admin')

@section('title', 'Data Jurusan')

@section('content')

<div class="row row-cards">

    <div class="col-12">

        {{-- ALERT SUCCESS --}}
        @if(session('success'))

            <div class="alert alert-success alert-dismissible"
                 role="alert">

                <div>

                    <i class="ti ti-check me-2"></i>

                    {{ session('success') }}

                </div>

                <a class="btn-close"
                   data-bs-dismiss="alert"
                   aria-label="close"></a>

            </div>

        @endif


        {{-- CARD --}}
        <div class="card">

            {{-- HEADER --}}
            <div class="card-header">

                <h3 class="card-title">

                    <i class="ti ti-book-2 me-2"></i>

                    Data Jurusan

                </h3>

                <div class="card-actions">

                    <a href="{{ route('admin.jurusans.create') }}"
                       class="btn btn-primary">

                        <i class="ti ti-plus me-1"></i>

                        Tambah Jurusan

                    </a>

                </div>

            </div>


            {{-- TABLE --}}
            <div class="table-responsive">

                <table class="table table-vcenter card-table table-hover">

                    <thead>

                        <tr>

                            <th width="70">
                                No
                            </th>

                            <th width="130">
                                Gambar
                            </th>

                            <th>
                                Nama Jurusan
                            </th>

                            <th>
                                Singkatan
                            </th>

                            <th>
                                Slug
                            </th>

                            <th width="200">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($jurusans as $jurusan)

                            <tr>

                                <td>

                                    {{ $loop->iteration }}

                                </td>


                                <td>

                                    @if($jurusan->gambar)

                                        <img src="{{ asset('storage/' . $jurusan->gambar) }}"
                                             alt="{{ $jurusan->nama }}"
                                             class="avatar avatar-md rounded">

                                    @else

                                        <span class="avatar avatar-md bg-secondary-lt">

                                            <i class="ti ti-photo-off"></i>

                                        </span>

                                    @endif

                                </td>


                                <td>

                                    <strong>

                                        {{ $jurusan->nama }}

                                    </strong>

                                </td>


                                <td>

                                    <span class="badge bg-blue-lt">

                                        {{ $jurusan->singkatan }}

                                    </span>

                                </td>


                                <td>

                                    <span class="text-secondary">

                                        {{ $jurusan->slug }}

                                    </span>

                                </td>


                                <td>

                                    <div class="d-flex gap-2">

                                        <a href="{{ route('admin.jurusans.edit', $jurusan->id) }}"
                                           class="btn btn-sm btn-outline-warning">

                                            <i class="ti ti-edit me-1"></i>

                                            Edit

                                        </a>


                                        <form action="{{ route('admin.jurusans.destroy', $jurusan->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus data jurusan ini?')">

                                            @csrf

                                            @method('DELETE')


                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger">

                                                <i class="ti ti-trash me-1"></i>

                                                Hapus

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6"
                                    class="text-center py-5 text-secondary">

                                    <i class="ti ti-books fs-1 d-block mb-2"></i>

                                    Belum ada data jurusan.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection