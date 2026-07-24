@extends('layouts.admin')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">


    <h4 class="fw-bold py-3 mb-4">

        <span class="text-muted fw-light">
            Admin /
        </span>

        Pengumuman

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

                Daftar Pengumuman

            </h5>


            <a
                href="{{ route('admin.pengumuman.create') }}"
                class="btn btn-primary btn-sm"
            >

<i class="ti ti-plus me-1"></i>

                Tambah Pengumuman

            </a>

        </div>


        {{-- TABLE --}}

        <div class="table-responsive text-nowrap">

            <table class="table table-hover">

                <thead>

                    <tr>

                        <th>No</th>

                        <th>Judul</th>

                        <th>Tanggal</th>

                        <th>Status</th>

                        <th>Aksi</th>

                    </tr>

                </thead>


                <tbody class="table-border-bottom-0">

                    @forelse($pengumumans as $index => $pengumuman)

                        <tr>


                            <td>

                                {{ $index + 1 }}

                            </td>


                            <td>

                                <strong>

                                    {{ $pengumuman->judul }}

                                </strong>

                            </td>


                            <td>

                                {{ \Carbon\Carbon::parse($pengumuman->tanggal)->format('d M Y') }}

                            </td>


                            <td>

                                <span class="badge
                                    {{ $pengumuman->status == 'Aktif'
                                        ? 'bg-label-success'
                                        : 'bg-label-secondary'
                                    }}">

                                    {{ $pengumuman->status }}

                                </span>

                            </td>


                            <td>

                                <div class="d-flex gap-2">


                                    {{-- EDIT --}}

                                    <a
                                        class="btn btn-sm btn-outline-warning"
                                        href="{{ route('admin.pengumuman.edit', $pengumuman->id) }}"
                                    >

<i class="ti ti-edit me-1"></i>

                                        Edit

                                    </a>


                                    {{-- DELETE --}}

                                    <form
                                        action="{{ route('admin.pengumuman.destroy', $pengumuman->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Hapus pengumuman ini?')"
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
                                colspan="5"
                                class="text-center py-4"
                            >

                                Belum ada pengumuman.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
