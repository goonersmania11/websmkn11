<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
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
            'nama_sekolah' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'alamat' => 'required',
            'deskripsi' => 'nullable',
            'sejarah' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'sambutan_kepala_sekolah' => 'required',
            'foto_kepala_sekolah' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
