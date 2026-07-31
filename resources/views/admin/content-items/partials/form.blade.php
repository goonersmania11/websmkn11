@php $item = $item ?? null; @endphp

<div class="mb-3">
    <label class="form-label">Tipe <span class="text-danger">*</span></label>
    <select name="type" class="form-select" required {{ $item ? 'disabled' : '' }}>
        @foreach($types as $key => $label)
            <option value="{{ $key }}" {{ ($item->type ?? old('type', $type ?? '')) === $key ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>
    @if($item)
        <input type="hidden" name="type" value="{{ $item->type }}">
    @endif
</div>

<div class="mb-3">
    <label class="form-label">Judul <span class="text-danger">*</span></label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $item->title ?? '') }}" required>
    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
</div>

<div class="mb-3">
    <label class="form-label">Ringkasan</label>
    <textarea name="summary" class="form-control" rows="2">{{ old('summary', $item->summary ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Isi / Deskripsi</label>
    <textarea name="body" class="form-control" rows="5">{{ old('body', $item->body ?? '') }}</textarea>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Kategori</label>
        <input type="text" name="category" class="form-control" value="{{ old('category', $item->category ?? '') }}" placeholder="contoh: Akademik, Olahraga">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Ikon (class Tabler)</label>
        <input type="text" name="icon" class="form-control" value="{{ old('icon', $item->icon ?? '') }}" placeholder="contoh: ti ti-trophy">
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Gambar</label>
        <input type="file" name="image" class="form-control" accept="image/*">
        @if($item?->image)
            <div class="mt-2"><img src="{{ $item->image_url }}" class="h-20 rounded object-cover"></div>
        @endif
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Tanggal Acara</label>
        <input type="date" name="event_date" class="form-control" value="{{ old('event_date', $item?->event_date?->format('Y-m-d') ?? '') }}">
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label">Ekstra 1</label>
        <input type="text" name="extra_1" class="form-control" value="{{ old('extra_1', $item->extra_1 ?? '') }}" placeholder="Misal: tahun, tanggal, atau data tambahan">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Ekstra 2</label>
        <input type="text" name="extra_2" class="form-control" value="{{ old('extra_2', $item->extra_2 ?? '') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Ekstra 3</label>
        <input type="text" name="extra_3" class="form-control" value="{{ old('extra_3', $item->extra_3 ?? '') }}">
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Urutan</label>
        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $item->sort_order ?? 0) }}" min="0">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Status</label>
        <select name="is_published" class="form-select">
            <option value="1" {{ ($item->is_published ?? true) ? 'selected' : '' }}>Aktif</option>
            <option value="0" {{ isset($item) && !$item->is_published ? 'selected' : '' }}>Draft</option>
        </select>
    </div>
</div>
