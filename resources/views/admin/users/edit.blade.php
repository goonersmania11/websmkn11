@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card">
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
                @endif
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3"><label class="form-label">Nama Lengkap</label><input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required></div>
                    <div class="mb-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required></div>
                    <div class="mb-3"><label class="form-label">Password Baru <span class="text-secondary">(kosongkan bila tidak diubah)</span></label><input type="password" name="password" class="form-control" minlength="8"></div>
                    <div class="mb-4"><label class="form-label">Role Akses</label><select name="role" class="form-select" required><option value="admin" @selected($user->role === 'admin')>Admin</option><option value="user" @selected($user->role === 'user')>User Biasa</option></select></div>
                    <button type="submit" class="btn btn-primary">Update User</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
