<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'nama_sekolah',
        'logo',
        'alamat',
        'phone',
        'email',
        'website',
        'facebook_url',
        'instagram_url',
        'youtube_url',
        'maps_embed_url',
        'deskripsi',
        'sejarah',
        'visi',
        'misi',
        'sambutan_kepala_sekolah',
        'foto_kepala_sekolah',
    ];

    public function getLogoUrlAttribute(): ?string
    {
        if (! $this->logo) {
            return null;
        }
        if (str_starts_with($this->logo, 'http')) {
            return $this->logo;
        }

        return asset('storage/'.$this->logo);
    }

    public function getFotoUrlAttribute(): ?string
    {
        if (! $this->foto_kepala_sekolah) {
            return null;
        }
        if (str_starts_with($this->foto_kepala_sekolah, 'http')) {
            return $this->foto_kepala_sekolah;
        }

        return asset('storage/'.$this->foto_kepala_sekolah);
    }
}
