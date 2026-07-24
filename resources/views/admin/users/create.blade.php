@extends('layouts.admin')

@section('title', 'Tambah User')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card">
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
                @endif
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="mb-3"><label class="form-label">Nama Lengkap</label><input type="text" name="name" class="form-control" value="{{ old('name') }}" required></div>
                    <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control" value="{{ old('email') }}" required></div>
                    <div class="mb-3"><label class="form-label">Password</label><input type="password" name="password" class="form-control" required minlength="8"></div>
                    <div class="mb-4"><label class="form-label">Role Akses</label><select name="role" class="form-select" required><option value="admin">Admin</option><option value="user">User Biasa</option></select></div>
                    <button type="submit" class="btn btn-primary">Simpan User</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
