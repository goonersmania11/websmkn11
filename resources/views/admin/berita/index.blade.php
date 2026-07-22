@extends('admin.layouts.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Admin /</span> Berita
    </h4>


    {{-- PESAN SUCCESS --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible" role="alert">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">
            </button>

        </div>

    @endif


    <div class="card">

        {{-- HEADER --}}
        <div class="card-header d-flex justify-content-between align-items-center">

            <h5 class="mb-0">
                Daftar Berita SMK Negeri 11
            </h5>

            <a href="{{ route('admin.berita.create') }}"
               class="btn btn-primary btn-sm">

                <i class="bx bx-plus me-1"></i>

                Tambah Berita

            </a>

        </div>


        {{-- TABLE --}}
        <div class="table-responsive text-nowrap">

            <table class="table table-hover">

                <thead>

                    <tr>

                        <th>No</th>

                        <th>Gambar</th>

                        <th>Judul</th>

                        <th>Kategori</th>

                        <th>Status</th>

                        <th>Penulis</th>

                        <th>Aksi</th>

                    </tr>

                </thead>


                <tbody class="table-border-bottom-0">

                    @forelse($beritas as $index => $berita)

                        <tr>

                            <td>
                                {{ $index + 1 }}
                            </td>


                            <td>

                                @if($berita->gambar)

                                    <img
                                        src="{{ asset('storage/' . $berita->gambar) }}"
                                        alt="Gambar Berita"
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

                                    {{ Str::limit($berita->judul, 40) }}

                                </strong>

                            </td>


                            <td>

                                {{ $berita->kategori }}

                            </td>


                            <td>

                                <span class="badge
                                    {{ $berita->status == 'Published'
                                        ? 'bg-label-success'
                                        : 'bg-label-warning'
                                    }}">

                                    {{ $berita->status }}

                                </span>

                            </td>


                            <td>

                                {{ $berita->user->name ?? 'Admin' }}

                            </td>


                            <td>

                                <div class="d-flex gap-2">


                                    {{-- EDIT --}}

                                    <a
                                        class="btn btn-sm btn-outline-warning"
                                        href="{{ route('admin.berita.edit', $berita->id) }}"
                                    >

                                        <i class="bx bx-edit-alt me-1"></i>

                                        Edit

                                    </a>


                                    {{-- DELETE --}}

                                    <form
                                        action="{{ route('admin.berita.destroy', $berita->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')"
                                    >

                                        @csrf

                                        @method('DELETE')


                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-outline-danger"
                                        >

                                            <i class="bx bx-trash me-1"></i>

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

                                Belum ada data berita.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection