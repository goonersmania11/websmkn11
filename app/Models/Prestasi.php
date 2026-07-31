<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $fillable = [
        'nama_prestasi', 'tingkat', 'kategori', 'tahun', 'event',
        'rank', 'penerima', 'deskripsi', 'gambar', 'is_published',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
        ];
    }

    public function getGambarUrlAttribute(): ?string
    {
        if (! $this->gambar) {
            return null;
        }
        if (str_starts_with($this->gambar, 'http')) {
            return $this->gambar;
        }

        return asset('storage/'.$this->gambar);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }
}
