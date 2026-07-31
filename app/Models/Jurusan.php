<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $fillable = [
        'nama', 'slug', 'singkatan', 'deskripsi', 'short_description',
        'gambar', 'icon', 'visi', 'misi',
        'competencies', 'career_prospects', 'facilities',
        'is_published', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'competencies' => 'array',
            'career_prospects' => 'array',
            'facilities' => 'array',
            'is_published' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
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

    public function gurus()
    {
        return $this->hasMany(Guru::class, 'jurusan_id');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('nama');
    }
}
