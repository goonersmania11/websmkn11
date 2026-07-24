@extends('layouts.admin')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">


    <h4 class="fw-bold py-3 mb-4">

        <span class="text-muted fw-light">
            Admin /
        </span>

        Agenda Kegiatan

    </h4>


    <div class="card">


        {{-- HEADER --}}

        <div class="card-header d-flex justify-content-between align-items-center">

            <h5 class="mb-0">

                Daftar Agenda

            </h5>


            <a
                href="{{ route('admin.agenda.create') }}"
                class="btn btn-primary btn-sm"
            >

<i class="ti ti-plus me-1"></i>

                Tambah Agenda

            </a>

        </div>


        {{-- TABLE --}}

        <div class="table-responsive text-nowrap">

            <table class="table table-hover">

                <thead>

                    <tr>

                        <th>No</th>

                        <th>Poster</th>

                        <th>Judul</th>

                        <th>Waktu & Lokasi</th>

                        <th>Aksi</th>

                    </tr>

                </thead>


                <tbody class="table-border-bottom-0">

                    @forelse($agendas as $index => $agenda)

                        <tr>


                            <td>

                                {{ $index + 1 }}

                            </td>


                            <td>

                                @if($agenda->gambar)

                                    <img
                                        src="{{ asset('storage/' . $agenda->gambar) }}"
                                        class="rounded"
                                        width="50"
                                        alt="Poster Agenda"
                                    >

                                @else

                                    <span class="badge bg-secondary">

                                        No Image

                                    </span>

                                @endif

                            </td>


                            <td>

                                <strong>

                                    {{ $agenda->judul }}

                                </strong>

                            </td>


                            <td>

                                {{ \Carbon\Carbon::parse($agenda->tanggal)->format('d M Y') }}

                                -

                                {{ $agenda->waktu }}

                                <br>

                                <small class="text-muted">

                                    {{ $agenda->lokasi }}

                                </small>

                            </td>


                            <td>

                                <div class="d-flex gap-2">


                                    {{-- EDIT --}}

                                    <a
                                        class="btn btn-sm btn-outline-warning"
                                        href="{{ route('admin.agenda.edit', $agenda->id) }}"
                                    >

<i class="ti ti-edit me-1"></i>

                                        Edit

                                    </a>


                                    {{-- DELETE --}}

                                    <form
                                        action="{{ route('admin.agenda.destroy', $agenda->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Hapus agenda ini?')"
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

                                Belum ada agenda.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
