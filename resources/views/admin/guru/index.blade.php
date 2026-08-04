@extends('layouts.admin')

@section('title', 'Data Guru')

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    @if(session('import_result'))
        @php($importResult = session('import_result'))
        <div class="alert alert-{{ $importResult['success'] > 0 && empty($importResult['errors']) ? 'success' : ($importResult['success'] > 0 ? 'warning' : 'danger') }} alert-dismissible" role="alert">
            <strong>{{ $importResult['success'] }} data berhasil diimport.</strong>
            @if(!empty($importResult['errors']))
                <br>{{ count($importResult['errors']) }} data gagal diimport.
            @endif
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>

        @if(!empty($importResult['errors']))
            <div class="card mb-3">
                <div class="card-header"><h3 class="card-title mb-0">Detail Error Import</h3></div>
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-hover">
                        <thead>
                            <tr><th>Baris</th><th>Nama</th><th>NIP</th><th>Alasan</th></tr>
                        </thead>
                        <tbody>
                            @foreach($importResult['errors'] as $error)
                                <tr>
                                    <td>{{ $error['row'] }}</td>
                                    <td>{{ $error['nama'] }}</td>
                                    <td>{{ $error['nip'] }}</td>
                                    <td>
                                        <ul class="mb-0">
                                            @foreach($error['errors'] as $reason)
                                                <li>{{ $reason }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
            <h3 class="card-title mb-0">Daftar Guru SMK Negeri 11</h3>
            <div class="btn-list">
                <a href="{{ route('admin.gurus.export') }}" class="btn btn-outline-success btn-sm"><i class="ti ti-download me-1"></i> Export</a>
                <a href="{{ route('admin.gurus.import.template') }}" class="btn btn-outline-secondary btn-sm"><i class="ti ti-file-spreadsheet me-1"></i> Template</a>
                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#importModal"><i class="ti ti-upload me-1"></i> Import</button>
                <a href="{{ route('admin.gurus.create') }}" class="btn btn-primary btn-sm"><i class="ti ti-plus me-1"></i> Tambah Guru</a>
            </div>
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

    {{-- Modal Import --}}
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="importForm" action="{{ route('admin.gurus.import.preview') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">Import Data Guru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-secondary">Unggah file Excel (.xlsx). Gunakan <a href="{{ route('admin.gurus.import.template') }}">template</a> sebagai panduan format kolom.</p>
                        <div class="mb-3">
                            <input type="file" class="form-control" name="file" accept=".xlsx" required>
                        </div>
                        @error('file')
                            <div class="alert alert-danger py-2">{{ $message }}</div>
                        @enderror
                        <div id="importLoading" class="d-none text-center py-3">
                            <div class="spinner-border text-primary" role="status"></div>
                            <div class="mt-2 text-secondary">Memproses file...</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-info" id="importSubmitBtn"><i class="ti ti-upload me-1"></i> Preview</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('importForm').addEventListener('submit', function () {
            document.getElementById('importLoading').classList.remove('d-none');
            document.getElementById('importSubmitBtn').disabled = true;
        });
    </script>
@endsection
