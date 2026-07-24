@extends('layouts.admin')

@section('title', 'Manajemen User')

@section('content')
<h4 class="fw-bold py-3 mb-4">Manajemen User</h4>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar User Sistem</h5>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Tambah User</a>
    </div>

    <div class="card-body">
        <!-- Notifikasi Sukses -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><strong>{{ $user->name }}</strong></td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge bg-{{ $user->role == 'admin' ? 'success' : 'info' }}-lt text-{{ $user->role == 'admin' ? 'success' : 'info' }} me-1">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
