<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportGuruRequest;
use App\Http\Requests\StoreGuruRequest;
use App\Http\Requests\UpdateGuruRequest;
use App\Models\Guru;
use App\Services\GuruExcelService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::latest()->get();

        return view('admin.guru.index', compact('gurus'));
    }

    public function template(GuruExcelService $service)
    {
        return $service->template();
    }

    public function export(GuruExcelService $service)
    {
        return $service->export();
    }

    public function importPreview(ImportGuruRequest $request, GuruExcelService $service)
    {
        $file = $request->file('file');
        $path = $file->store('guru_imports', 'local');
        $token = basename($path);

        $preview = $service->preview(storage_path('app/private/'.$path));

        return view('admin.guru.import-preview', compact('preview', 'token'));
    }

    public function import(Request $request, GuruExcelService $service)
    {
        $token = $request->validate(['file_token' => ['required', 'string', 'regex:/^[a-zA-Z0-9_\-.]+$/']])['file_token'];
        $path = 'guru_imports/'.$token;
        $fullPath = storage_path('app/private/'.$path);

        abort_unless(is_file($fullPath), 404);

        $result = $service->import($fullPath);

        if (is_file($fullPath)) {
            @unlink($fullPath);
        }

        return redirect()
            ->route('admin.gurus.index')
            ->with('import_result', $result);
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
