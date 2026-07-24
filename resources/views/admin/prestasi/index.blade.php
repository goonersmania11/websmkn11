@extends('layouts.admin')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">

        <span class="text-muted fw-light">
            Admin /
        </span>

        Prestasi

    </h4>


    {{-- SUCCESS MESSAGE --}}

    @if(session('success'))

        <div class="alert alert-success alert-dismissible" role="alert">

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            >
            </button>

        </div>

    @endif


    <div class="card">


        {{-- HEADER --}}

        <div class="card-header d-flex justify-content-between align-items-center">

            <h5 class="mb-0">

                Daftar Prestasi Siswa SMK Negeri 11

            </h5>


            <a
                href="{{ route('admin.prestasi.create') }}"
                class="btn btn-primary btn-sm"
            >

<i class="ti ti-plus me-1"></i>

                Tambah Prestasi

            </a>

        </div>


        {{-- TABLE --}}

        <div class="table-responsive text-nowrap">

            <table class="table table-hover">

                <thead>

                    <tr>

                        <th>No</th>

                        <th>Gambar</th>

                        <th>Nama Prestasi</th>

                        <th>Tingkat</th>

                        <th>Tahun</th>

                        <th>Penerima</th>

                        <th>Aksi</th>

                    </tr>

                </thead>


                <tbody class="table-border-bottom-0">

                    @forelse($prestasis as $index => $prestasi)

                        <tr>


                            <td>

                                {{ $index + 1 }}

                            </td>


                            <td>

                                @if($prestasi->gambar)

                                    <img
                                        src="{{ asset('storage/' . $prestasi->gambar) }}"
                                        alt="Gambar Prestasi"
                                        class="rounded"
                                        width="60"
                                    >

                                @else

                                    <span class="badge bg-label-secondary">

                                        No Image

                                    </span>

                                @endif

                            </td>


                            <td>

                                <strong>

                                    {{ $prestasi->nama_prestasi }}

                                </strong>

                            </td>


                            <td>

                                <span class="badge bg-label-info">

                                    {{ $prestasi->tingkat }}

                                </span>

                            </td>


                            <td>

                                {{ $prestasi->tahun }}

                            </td>


                            <td>

                                {{ $prestasi->penerima }}

                            </td>


                            <td>

                                <div class="d-flex gap-2">


                                    {{-- EDIT --}}

                                    <a
                                        class="btn btn-sm btn-outline-warning"
                                        href="{{ route('admin.prestasi.edit', $prestasi->id) }}"
                                    >

<i class="ti ti-edit me-1"></i>

                                        Edit

                                    </a>


                                    {{-- DELETE --}}

                                    <form
                                        action="{{ route('admin.prestasi.destroy', $prestasi->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data prestasi ini?')"
                                    >

                                        @csrf

                                        @method('DELETE')


                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-outline-danger"
                                        >

<i class="ti ti-trash me-1"></i>

                                            Hapus

                                        </button>

                                    </form>


                                </div>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="text-center py-4"
                            >

                                Belum ada data prestasi.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
