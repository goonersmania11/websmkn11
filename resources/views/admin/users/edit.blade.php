<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit User - SMKN 11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h4 class="mb-0">Edit Data User</h4>
                    </div>
                    <div class="card-body">
                        
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Perhatikan penggunaan method POST dan @method('PUT') -->
                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password Baru <small class="text-muted">(Kosongkan jika tidak ingin diubah)</small></label>
                                <input type="password" name="password" class="form-control" minlength="8">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Role Akses</label>
                                <select name="role" class="form-select" required>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User Biasa</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100 mb-2">Update User</button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary w-100">Batal</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>