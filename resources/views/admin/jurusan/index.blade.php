@extends('layouts.admin')

@section('title', 'Data Jurusan')

@section('content')

<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <h4>Data Jurusan</h4>

        <a href="{{ route('admin.jurusans.create') }}"
            class="btn btn-primary">
            Tambah Jurusan
        </a>
    </div>

    <table class="table table-bordered table-hover align-middle">

        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Singkatan</th>
                <th>Slug</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($jurusans as $jurusan)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td width="120">

                    @if($jurusan->gambar)

                        <img
                            src="{{ asset('storage/'.$jurusan->gambar) }}"
                            width="90">

                    @else

                        -

                    @endif

                </td>

                <td>{{ $jurusan->nama }}</td>

                <td>{{ $jurusan->singkatan }}</td>

                <td>{{ $jurusan->slug }}</td>

                <td>

                    <a href="{{ route('admin.jurusans.edit',$jurusan->id) }}"
                        class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form
                        action="{{ route('admin.jurusans.destroy',$jurusan->id) }}"
                        method="POST"
                        class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">

                            Hapus

                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="6" class="text-center">
                    Belum ada data jurusan.
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection