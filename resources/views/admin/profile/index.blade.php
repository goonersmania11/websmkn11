@extends('layouts.app')

@section('title', 'Data Profil Sekolah')

@section('content')

<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data Profil Sekolah</h4>

        <a href="{{ route('admin.profiles.create') }}" class="btn btn-primary">
            Tambah Profil
        </a>
    </div>

    <table class="table table-bordered table-hover align-middle">

        <thead>
            <tr>
                <th>No</th>
                <th>Logo</th>
                <th>Nama Sekolah</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($profiles as $profile)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td width="120">
                    @if($profile->logo)
                        <img src="{{ asset('storage/'.$profile->logo) }}"
                             width="80">
                    @else
                        -
                    @endif
                </td>

                <td>{{ $profile->nama_sekolah }}</td>

                <td>{{ Str::limit($profile->alamat, 60) }}</td>

                <td>

                    <a href="{{ route('admin.profiles.edit', $profile->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('admin.profiles.destroy', $profile->id) }}"
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
                <td colspan="5" class="text-center">
                    Belum ada data profil sekolah.
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection