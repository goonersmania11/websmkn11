@extends('layouts.admin')

@section('title', 'Pesan Masuk')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Pesan dari Pengunjung</h3>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Subjek</th>
                        <th>Tanggal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $msg)
                        <tr class="{{ $msg->is_read ? '' : 'table-light' }}">
                            <td>
                                @if($msg->is_read)
                                    <span class="badge bg-gray-lt">Dibaca</span>
                                @else
                                    <span class="badge bg-blue-lt">Baru</span>
                                @endif
                            </td>
                            <td>{{ $msg->name }}</td>
                            <td>{{ $msg->email }}</td>
                            <td>{{ $msg->subject }}</td>
                            <td>{{ $msg->created_at->format('d M Y H:i') }}</td>
                            <td>
                                <div class="btn-list">
                                    <a href="{{ route('admin.contact-messages.show', $msg) }}" class="btn btn-ghost btn-sm">
                                        <i class="ti ti-eye"></i>
                                    </a>
                                    @if(!$msg->is_read)
                                        <form action="{{ route('admin.contact-messages.mark-read', $msg) }}" method="POST" class="d-inline">
                                            @csrf @method('PUT')
                                            <button class="btn btn-ghost btn-sm" title="Tandai dibaca"><i class="ti ti-check"></i></button>
                                        </form>
                                    @endif
                                    <form action="{{ route('admin.contact-messages.destroy', $msg) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pesan ini?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-ghost btn-sm text-danger"><i class="ti ti-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-secondary">Belum ada pesan</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $messages->links() }}
    </div>
</div>
@endsection
