@extends('layouts.admin')

@section('title', 'Pengaturan Website')

@section('content')
<form action="{{ route('admin.settings.update') }}" method="POST">
    @csrf @method('PUT')

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @foreach($schema as $group => $fields)
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">{{ ucfirst(str_replace('_', ' ', $group)) }}</h3>
            </div>
            <div class="card-body">
                @foreach($fields as $key => $field)
                    <div class="mb-3">
                        <label class="form-label">{{ $field['label'] }}</label>
                        @if($field['type'] === 'textarea')
                            <textarea name="settings[{{ $key }}]" class="form-control" rows="3">{{ old("settings.{$key}", $settings[$key] ?? '') }}</textarea>
                        @elseif($field['type'] === 'select')
                            <select name="settings[{{ $key }}]" class="form-select">
                                @foreach($field['options'] as $optVal => $optLabel)
                                    <option value="{{ $optVal }}" {{ ($settings[$key] ?? '') === $optVal ? 'selected' : '' }}>{{ $optLabel }}</option>
                                @endforeach
                            </select>
                        @else
                            <input type="{{ $field['type'] }}" name="settings[{{ $key }}]" class="form-control" value="{{ old("settings.{$key}", $settings[$key] ?? '') }}">
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-end">
        <button class="btn btn-primary px-4">Simpan Pengaturan</button>
    </div>
</form>
@endsection
