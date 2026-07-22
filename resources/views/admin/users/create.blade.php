<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah User - SMKN 11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Tambah User Baru</h4>
                    </div>
                    <div class="card-body">
                        
                        <!-- Notifikasi Error Validasi -->
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.users.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required minlength="8">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Role Akses</label>
                                <select name="role" class="form-select" required>
                                    <option value="admin">Admin</option>
                                    <option value="user">User Biasa</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-success w-100 mb-2">Simpan User</button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary w-100">Batal</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>