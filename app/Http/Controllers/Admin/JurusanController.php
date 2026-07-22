<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Http\Requests\StoreJurusanRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateJurusanRequest;


class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $jurusans = Jurusan::latest()->get();
    return view('admin.jurusan.index', compact('jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('admin.jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJurusanRequest $request)
    {
    $data = $request->validated();
    if ($request->hasFile('gambar')) {
        $data['gambar'] = $request->file('gambar')->store('jurusan', 'public');
    }
    Jurusan::create($data);
    return redirect()
        ->route('admin.jurusans.index')
        ->with('success', 'Data jurusan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusan)
    {
    return view('admin.jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJurusanRequest $request, Jurusan $jurusan)
   {
    $data = $request->validated();
    if ($request->hasFile('gambar')) {

        if ($jurusan->gambar && Storage::disk('public')->exists($jurusan->gambar)) {
            Storage::disk('public')->delete($jurusan->gambar);
        }
        $data['gambar'] = $request->file('gambar')->store('jurusan', 'public');
    }
    $jurusan->update($data);
    return redirect()
        ->route('admin.jurusans.index')
        ->with('success', 'Data jurusan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
   {
    if ($jurusan->gambar &&
        Storage::disk('public')->exists($jurusan->gambar)) {
        Storage::disk('public')->delete($jurusan->gambar);
    }
    $jurusan->delete();
    return redirect()
        ->route('admin.jurusans.index')
        ->with('success', 'Data jurusan berhasil dihapus.');
    }
}
