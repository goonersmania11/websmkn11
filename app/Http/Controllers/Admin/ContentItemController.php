<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContentItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContentItemController extends Controller
{
    private const ALLOWED_TYPES = [
        'facility' => 'Fasilitas',
        'extracurricular' => 'Ekstrakurikuler',
        'gallery' => 'Galeri',
        'faq' => 'FAQ',
        'history' => 'Sejarah',
        'core_value' => 'Nilai Inti',
        'home_slide' => 'Slide Beranda',
        'statistic' => 'Statistik',
        'spmb_requirement' => 'Persyaratan SPMB',
        'spmb_schedule' => 'Jadwal SPMB',
        'spmb_flow' => 'Alur SPMB',
        'spmb_faq' => 'FAQ SPMB',
    ];

    public function index(Request $request)
    {
        $type = $request->input('type');
        $query = ContentItem::query();

        if ($type && array_key_exists($type, self::ALLOWED_TYPES)) {
            $query->where('type', $type);
        }

        $items = $query->orderBy('type')->orderBy('sort_order')->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.content-items.index', compact('items', 'type'));
    }

    public function create(Request $request)
    {
        $type = $request->input('type', 'facility');

        return view('admin.content-items.create', [
            'type' => $type,
            'types' => self::ALLOWED_TYPES,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|string|in:'.implode(',', array_keys(self::ALLOWED_TYPES)),
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string|max:1000',
            'body' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'icon' => 'nullable|string|max:100',
            'event_date' => 'nullable|date',
            'extra_1' => 'nullable|string|max:255',
            'extra_2' => 'nullable|string|max:255',
            'extra_3' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_published' => 'nullable',
        ]);

        $data['is_published'] = $request->boolean('is_published');
        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('content-items', 'public');
        }

        ContentItem::create($data);

        return redirect()
            ->route('admin.content-items.index', ['type' => $data['type']])
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(ContentItem $contentItem)
    {
        return view('admin.content-items.edit', [
            'item' => $contentItem,
            'types' => self::ALLOWED_TYPES,
        ]);
    }

    public function update(Request $request, ContentItem $contentItem)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string|max:1000',
            'body' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'icon' => 'nullable|string|max:100',
            'event_date' => 'nullable|date',
            'extra_1' => 'nullable|string|max:255',
            'extra_2' => 'nullable|string|max:255',
            'extra_3' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_published' => 'nullable',
        ]);

        $data['is_published'] = $request->boolean('is_published');
        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('image')) {
            if ($contentItem->image && Storage::disk('public')->exists($contentItem->image)) {
                Storage::disk('public')->delete($contentItem->image);
            }
            $data['image'] = $request->file('image')->store('content-items', 'public');
        }

        $contentItem->update($data);

        return redirect()
            ->route('admin.content-items.index', ['type' => $contentItem->type])
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(ContentItem $contentItem)
    {
        $type = $contentItem->type;

        if ($contentItem->image && Storage::disk('public')->exists($contentItem->image)) {
            Storage::disk('public')->delete($contentItem->image);
        }

        $contentItem->delete();

        return redirect()
            ->route('admin.content-items.index', ['type' => $type])
            ->with('success', 'Data berhasil dihapus.');
    }
}
