<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGuruRequest;
use App\Http\Requests\UpdateGuruRequest;
use App\Models\Guru;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::latest()->get();

        return view('admin.guru.index', compact('gurus'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(StoreGuruRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        Guru::create($data);

        return redirect()
            ->route('admin.gurus.index')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function show(Guru $guru)
    {
        return view('admin.guru.show', compact('guru'));
    }

    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(UpdateGuruRequest $request, Guru $guru)
    {
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }

            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        $guru->update($data);

        return redirect()
            ->route('admin.gurus.index')
            ->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy(Guru $guru)
    {
        if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect()
            ->route('admin.gurus.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}
