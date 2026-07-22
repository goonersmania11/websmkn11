<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    // 1. TAMPILKAN SEMUA BERITA
    public function index()
    {
        $beritas = Berita::with('user')->latest()->get();
        return view('admin.berita.index', compact('beritas'));
    }

    // 2. TAMPILKAN FORM TAMBAH BERITA
    public function create()
    {
        return view('admin.berita.create');
    }

    // 3. PROSES SIMPAN BERITA BARU
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'kategori' => 'required|string|max:100',
            'status' => 'required|in:Draft,Published',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();
        
        // Logika membuat slug otomatis dari judul
        $data['slug'] = Str::slug($request->judul);
        
        // Ambil ID admin yang sedang login (jika auth belum siap, sementara gunakan ID 1)
        $data['user_id'] = auth()->id() ?? 1; 

        // Atur tanggal publish otomatis jika statusnya langsung Published
        $data['tanggal_publish'] = $request->status == 'Published' ? now() : null;

        // Logika Upload Gambar ke storage/app/public/berita
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function show(Berita $berita)
    {
        // Fitur show biasanya opsional di admin panel, lewati saja atau arahkan ke edit
        return redirect()->route('admin.berita.edit', $berita->id);
    }

    // 4. TAMPILKAN FORM EDIT BERITA
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    // 5. PROSES UPDATE BERITA
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'kategori' => 'required|string|max:100',
            'status' => 'required|in:Draft,Published',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul); // Perbarui slug jika judul berubah

        // Atur tanggal publish berdasarkan perubahan status
        if ($request->status == 'Published' && !$berita->tanggal_publish) {
            $data['tanggal_publish'] = now();
        } elseif ($request->status == 'Draft') {
            $data['tanggal_publish'] = null;
        }

        // Logika Update Gambar
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama di folder storage jika ada
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            // Simpan gambar baru
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    // 6. PROSES HAPUS BERITA
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Hapus file gambar fisiknya agar storage tidak penuh
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
