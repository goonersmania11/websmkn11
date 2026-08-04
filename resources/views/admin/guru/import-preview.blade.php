@extends('layouts.admin')

@section('title', 'Preview Import Guru')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Preview Data Import</h3>
            <a href="{{ route('admin.gurus.index') }}" class="btn btn-secondary btn-sm"><i class="ti ti-arrow-left me-1"></i>Kembali</a>
        </div>
        <div class="card-body">
            <div class="alert alert-info">
                Total {{ $preview['total'] }} baris data terdeteksi. Berikut 10 baris pertama:
            </div>

            @if($preview['total'] === 0)
                <div class="alert alert-warning">File tidak berisi data. Tidak ada baris yang akan diimport.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Bidang Studi</th>
                                <th>Jabatan</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Social Media</th>
                                <th>Jenis Kelamin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($preview['rows'] as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row['Nama'] ?? '' }}</td>
                                    <td>{{ $row['NIP'] ?? '' }}</td>
                                    <td>{{ $row['Bidang Studi'] ?? '' }}</td>
                                    <td>{{ $row['Jabatan'] ?? '' }}</td>
                                    <td>{{ $row['Tempat Lahir'] ?? '' }}</td>
                                    <td>{{ $row['Tanggal Lahir'] ?? '' }}</td>
                                    <td>{{ $row['Alamat'] ?? '' }}</td>
                                    <td>{{ $row['Social Media'] ?? '' }}</td>
                                    <td>{{ $row['Jenis Kelamin'] ?? '' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($preview['total'] > 10)
                    <div class="text-secondary mb-3">... dan {{ $preview['total'] - 10 }} baris lainnya.</div>
                @endif

                <div class="d-flex gap-2">
                    <form action="{{ route('admin.gurus.import') }}" method="POST">
                        @csrf
                        <input type="hidden" name="file_token" value="{{ $token }}">
                        <button type="submit" class="btn btn-success"><i class="ti ti-device-floppy me-1"></i>Konfirmasi Import</button>
                    </form>
                    <a href="{{ route('admin.gurus.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            @endif
        </div>
    </div>
@endsection
