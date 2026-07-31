<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'beritas';

    protected $fillable = [
        'user_id', 'judul', 'slug', 'isi', 'gambar', 'kategori',
        'status', 'tanggal_publish',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_publish' => 'date',
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'Published');
    }

    public function scopeLatestPublished(Builder $query): Builder
    {
        return $query->published()->latest('tanggal_publish');
    }
}
