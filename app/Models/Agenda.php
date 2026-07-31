<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = ['judul', 'deskripsi', 'tanggal', 'waktu', 'lokasi', 'gambar'];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
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

    public function scopeUpcoming(Builder $query): Builder
    {
        return $query->where('tanggal', '>=', now()->toDateString())->orderBy('tanggal');
    }
}
