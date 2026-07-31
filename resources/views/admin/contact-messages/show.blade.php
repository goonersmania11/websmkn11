@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $message->subject }}</h3>
        <div class="card-actions">
            <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-ghost">Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <strong>Dari:</strong> {{ $message->name }} &lt;{{ $message->email }}&gt;
        </div>
        <div class="mb-3">
            <strong>Tanggal:</strong> {{ $message->created_at->format('d M Y H:i') }}
        </div>
        <hr>
        <div class="whitespace-pre-wrap">{{ $message->message }}</div>
    </div>
</div>
@endsection
