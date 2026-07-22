<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $profiles = Profile::latest()->get();
    return view('admin.profile.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('admin.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(StoreProfileRequest $request)
   {
    $data = $request->validated();
    if ($request->hasFile('logo')) {
        $data['logo'] = $request->file('logo')->store('profile', 'public');
    }
    if ($request->hasFile('foto_kepala_sekolah')) {
        $data['foto_kepala_sekolah'] = $request->file('foto_kepala_sekolah')->store('profile', 'public');
    }
    Profile::create($data);
    return redirect()
        ->route('admin.profiles.index')
        ->with('success', 'Profil sekolah berhasil ditambahkan.');
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
    public function edit(Profile $profile)
    {
    return view('admin.profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(UpdateProfileRequest $request, Profile $profile)
    {
    $data = $request->validated();
    if ($request->hasFile('logo')) {
        if ($profile->logo &&
            Storage::disk('public')->exists($profile->logo)) {
            Storage::disk('public')->delete($profile->logo);
        }
        $data['logo'] = $request->file('logo')->store('profile', 'public');
    }
    if ($request->hasFile('foto_kepala_sekolah')) {
        if ($profile->foto_kepala_sekolah &&
            Storage::disk('public')->exists($profile->foto_kepala_sekolah)) {

            Storage::disk('public')->delete($profile->foto_kepala_sekolah);
        }
        $data['foto_kepala_sekolah'] = $request->file('foto_kepala_sekolah')->store('profile', 'public');
    }
    $profile->update($data);
    return redirect()
        ->route('admin.profiles.index')
        ->with('success', 'Profil sekolah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
    if ($profile->logo &&
        Storage::disk('public')->exists($profile->logo)) {
        Storage::disk('public')->delete($profile->logo);
    }
    if ($profile->foto_kepala_sekolah &&
        Storage::disk('public')->exists($profile->foto_kepala_sekolah)) {
        Storage::disk('public')->delete($profile->foto_kepala_sekolah);
    }
    $profile->delete();
    return redirect()
        ->route('admin.profiles.index')
        ->with('success', 'Profil sekolah berhasil dihapus.');
    }
}
