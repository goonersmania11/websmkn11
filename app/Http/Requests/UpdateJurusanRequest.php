<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;


class UpdateJurusanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
    return [
        'nama' => 'required|string|max:255',
        'singkatan' => 'required|max:50',
        'deskripsi' => 'required',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'visi' => 'required',
        'misi' => 'required',
    ];
    }
}
