@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Informasi SPMB / PPDB</h4>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Informasi SPMB</h5>
            <a href="{{ route('spmb.create') }}" class="btn btn-primary btn-sm">Tambah Info SPMB</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Informasi</th>
                        <th>Jadwal</th>
                        <th>Link Pendaftaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($spmbs as $index => $spmb)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><strong>{{ $spmb->judul }}</strong></td>
                        <td>{{ $spmb->jadwal ?? '-' }}</td>
                        <td>
                            @if($spmb->link_pendaftaran)
                                <a href="{{ $spmb->link_pendaftaran }}" target="_blank" class="btn btn-xs btn-outline-primary">Buka Link</a>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a class="btn btn-sm btn-outline-warning" href="{{ route('spmb.edit', $spmb->id) }}">Edit</a>
                                <form action="{{ route('spmb.destroy', $spmb->id) }}" method="POST" onsubmit="return confirm('Hapus informasi ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center py-4">Belum ada informasi SPMB/PPDB.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection