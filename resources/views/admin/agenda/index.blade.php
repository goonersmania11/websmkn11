@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Agenda Kegiatan</h4>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Agenda</h5>
            <a href="{{ route('agenda.create') }}" class="btn btn-primary btn-sm">Tambah Agenda</a>
        </div>
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
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if($agenda->gambar)
                                <img src="{{ asset('storage/' . $agenda->gambar) }}" class="rounded" width="50">
                            @else
                                <span class="badge bg-secondary">No Image</span>
                            @endif
                        </td>
                        <td><strong>{{ $agenda->judul }}</strong></td>
                        <td>{{ \Carbon\Carbon::parse($agenda->tanggal)->format('d M Y') }} - {{ $agenda->waktu }}<br><small class="text-muted">{{ $agenda->lokasi }}</small></td>
                        <td>
                            <div class="d-flex gap-2">
                                <a class="btn btn-sm btn-outline-warning" href="{{ route('agenda.edit', $agenda->id) }}">Edit</a>
                                <form action="{{ route('agenda.destroy', $agenda->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center py-4">Belum ada agenda.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection