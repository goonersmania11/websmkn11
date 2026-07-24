@extends('layouts.admin')

@section('title', 'Data Profil Sekolah')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Data Profil Sekolah</h5>
            <a href="{{ route('admin.profiles.create') }}" class="btn btn-primary">
                <i class="ti ti-plus me-1"></i> Tambah Profil
            </a>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="50">No</th>
                        <th width="90">Logo</th>
                        <th>Nama Sekolah</th>
                        <th>Alamat</th>
                        <th>Deskripsi</th>
                        <th>Sejarah</th>
                        <th>Visi</th>
                        <th>Misi</th>
                        <th>Sambutan</th>
                        <th width="90">Foto KS</th>
                        <th width="130">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($profiles as $profile)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if($profile->logo)
                                <img src="{{ asset('storage/'.$profile->logo) }}"
                                     alt="Logo"
                                     class="rounded"
                                     style="width: 70px; height: 70px; object-fit: cover;">
                            @else
                                <span class="badge bg-label-secondary">-</span>
                            @endif
                        </td>
                        <td class="fw-semibold">{{ $profile->nama_sekolah }}</td>
                        <td>{{ Str::limit($profile->alamat, 80) }}</td>
                        <td>{{ Str::limit($profile->deskripsi, 80) }}</td>
                        <td>{{ Str::limit($profile->sejarah, 80) }}</td>
                        <td>{{ Str::limit($profile->visi, 80) }}</td>
                        <td>{{ Str::limit($profile->misi, 80) }}</td>
                        <td>{{ Str::limit($profile->sambutan_kepala_sekolah, 80) }}</td>
                        <td>
                            @if($profile->foto_kepala_sekolah)
                                <img src="{{ asset('storage/'.$profile->foto_kepala_sekolah) }}"
                                     alt="Foto KS"
                                     class="rounded"
                                     style="width: 70px; height: 70px; object-fit: cover;">
                            @else
                                <span class="badge bg-label-secondary">-</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.profiles.edit', $profile->id) }}"
                                   class="btn btn-sm btn-icon btn-outline-warning"
                                   title="Edit">
                                    <i class="ti ti-edit"></i>
                                </a>
                                <form action="{{ route('admin.profiles.destroy', $profile->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-icon btn-outline-danger"
                                            title="Hapus"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="11" class="text-center py-5">
                            <div class="mb-2">
                                <i class="ti ti-database-off" style="font-size: 2.5rem; color: #ccc;"></i>
                            </div>
                            <p class="mb-0 text-muted">Belum ada data profil sekolah.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
