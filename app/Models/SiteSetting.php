<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = ['key', 'value', 'group', 'label'];

    public static function getValue(string $key, mixed $default = null): mixed
    {
        return Cache::remember("setting_{$key}", 3600, function () use ($key, $default) {
            $setting = static::where('key', $key)->first();

            return $setting?->value ?? $default;
        });
    }

    public static function setMany(array $settings): void
    {
        foreach ($settings as $key => $value) {
            static::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        Cache::forget('settings_all');
        foreach (array_keys($settings) as $key) {
            Cache::forget("setting_{$key}");
        }
    }

    public static function allGrouped(): array
    {
        return Cache::remember('settings_all', 3600, function () {
            return static::all()->groupBy('group')->toArray();
        });
    }
}
