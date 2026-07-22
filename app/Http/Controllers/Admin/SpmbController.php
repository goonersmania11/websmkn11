<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Spmb;
use Illuminate\Http\Request;

class SpmbController extends Controller
{
    public function index()
    {
        $spmbs = Spmb::latest()->get();
        return view('admin.spmb.index', compact('spmbs'));
    }

    public function create()
    {
        return view('admin.spmb.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'persyaratan' => 'nullable|string',
            'jadwal' => 'nullable|string|max:255',
            'alur_pendaftaran' => 'nullable|string',
            'link_pendaftaran' => 'nullable|url|max:255',
        ]);

        Spmb::create($data);
        return redirect()->route('spmb.index')->with('success', 'Data Info SPMB berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $spmb = Spmb::findOrFail($id);
        return view('admin.spmb.edit', compact('spmb'));
    }

    public function update(Request $request, $id)
    {
        $spmb = Spmb::findOrFail($id);
        
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'persyaratan' => 'nullable|string',
            'jadwal' => 'nullable|string|max:255',
            'alur_pendaftaran' => 'nullable|string',
            'link_pendaftaran' => 'nullable|url|max:255',
        ]);

        $spmb->update($data);
        return redirect()->route('spmb.index')->with('success', 'Data Info SPMB berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Spmb::findOrFail($id)->delete();
        return redirect()->route('spmb.index')->with('success', 'Data Info SPMB berhasil dihapus!');
    }
}