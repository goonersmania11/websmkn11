@extends('layouts.admin')

@section('title', 'Koleksi Konten')

@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h3 class="card-title">Daftar Konten</h3>
        <a href="{{ route('admin.content-items.create', ['type' => $type ?? 'facility']) }}" class="btn btn-primary">
            <i class="ti ti-plus me-2"></i> Tambah
        </a>
    </div>
    <div class="card-body">
        <form method="GET" class="mb-3">
            <div class="btn-group">
                <a href="{{ route('admin.content-items.index') }}" class="btn btn-sm {{ !$type ? 'btn-primary' : 'btn-ghost' }}">Semua</a>
                @foreach(['facility' => 'Fasilitas','extracurricular' => 'Eskul','gallery' => 'Galeri','faq' => 'FAQ','history' => 'Sejarah','core_value' => 'Nilai Inti','home_slide' => 'Slide','statistic' => 'Statistik','spmb_requirement' => 'Persyaratan SPMB','spmb_schedule' => 'Jadwal SPMB','spmb_flow' => 'Alur SPMB','spmb_faq' => 'FAQ SPMB'] as $t => $label)
                    <a href="{{ route('admin.content-items.index', ['type' => $t]) }}" class="btn btn-sm {{ ($type ?? '') === $t ? 'btn-primary' : 'btn-ghost' }}">{{ $label }}</a>
                @endforeach
            </div>
        </form>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Tipe</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Urutan</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td><span class="badge bg-blue-lt">{{ $item->type }}</span></td>
                            <td>{{ $item->category ?? '-' }}</td>
                            <td>
                                @if($item->is_published)
                                    <span class="badge bg-green-lt">Aktif</span>
                                @else
                                    <span class="badge bg-gray-lt">Draft</span>
                                @endif
                            </td>
                            <td>{{ $item->sort_order }}</td>
                            <td>
                                <div class="btn-list">
                                    <a href="{{ route('admin.content-items.edit', $item) }}" class="btn btn-ghost btn-sm">
                                        <i class="ti ti-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.content-items.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-ghost btn-sm text-danger"><i class="ti ti-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-secondary">Belum ada data</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $items->withQueryString()->links() }}
    </div>
</div>
@endsection
