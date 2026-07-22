<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreJurusanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
    return [
        'nama' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:jurusans,slug',
        'singkatan' => 'required|string|max:50',
        'deskripsi' => 'required',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'visi' => 'required',
        'misi' => 'required',
    ];
    }
}
