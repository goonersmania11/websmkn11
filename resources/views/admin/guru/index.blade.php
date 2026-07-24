@extends('layouts.admin')

@section('title', 'Data Guru')

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Daftar Guru SMK Negeri 11</h3>
            <a href="{{ route('admin.gurus.create') }}" class="btn btn-primary btn-sm"><i class="ti ti-plus me-1"></i> Tambah Guru</a>
        </div>
        <div class="table-responsive">
            <table class="table table-vcenter card-table table-hover">
                <thead>
                    <tr><th>No</th><th>Foto</th><th>Nama</th><th>NIP</th><th>Bidang Studi</th><th>Jabatan</th><th class="w-1">Aksi</th></tr>
                </thead>
                <tbody>
                    @forelse($gurus as $guru)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>@if($guru->foto)<img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto {{ $guru->nama }}" width="56" class="rounded border">@else<span class="avatar avatar-sm bg-secondary-lt"><i class="ti ti-user"></i></span>@endif</td>
                            <td class="fw-semibold">{{ $guru->nama }}</td><td>{{ $guru->nip }}</td><td>{{ $guru->bidang_studi }}</td><td>{{ $guru->jabatan }}</td>
                            <td><div class="btn-list flex-nowrap">
                                <a href="{{ route('admin.gurus.show', $guru) }}" class="btn btn-sm btn-outline-info"><i class="ti ti-eye me-1"></i>Detail</a>
                                <a href="{{ route('admin.gurus.edit', $guru) }}" class="btn btn-sm btn-outline-warning"><i class="ti ti-edit me-1"></i>Edit</a>
                                <form action="{{ route('admin.gurus.destroy', $guru) }}" method="POST" class="d-inline">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="ti ti-trash me-1"></i>Hapus</button></form>
                            </div></td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center py-5 text-secondary">Belum ada data guru.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
