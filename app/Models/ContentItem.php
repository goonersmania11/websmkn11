<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ContentItem extends Model
{
    protected $fillable = [
        'type', 'title', 'slug', 'summary', 'body', 'category',
        'image', 'icon', 'event_date', 'extra_1', 'extra_2', 'extra_3',
        'sort_order', 'is_published',
    ];

    protected function casts(): array
    {
        return [
            'event_date' => 'date',
            'is_published' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image) {
            return null;
        }
        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }

        return asset('storage/'.$this->image);
    }

    public function scopeType(Builder $query, string $type): Builder
    {
        return $query->where('type', $type);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    public static function boot(): void
    {
        parent::boot();

        static::creating(function (ContentItem $item) {
            if (! $item->slug && $item->title) {
                $base = Str::slug($item->title);
                $slug = $base;
                $count = 1;
                while (static::where('type', $item->type)->where('slug', $slug)->exists()) {
                    $slug = $base.'-'.++$count;
                }
                $item->slug = $slug;
            }
        });
    }
}
