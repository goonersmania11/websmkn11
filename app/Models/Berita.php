<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Menentukan nama tabel (opsional, tapi aman karena jamak dari berita secara default beritas)
    protected $table = 'beritas';

    // Kolom yang boleh diisi melalui form (Mass Assignment)
    protected $fillable = [
        'user_id',
        'judul',
        'slug',
        'isi',
        'gambar',
        'kategori',
        'status',
        'tanggal_publish'
    ];

    // Menghubungkan berita dengan user/admin yang menulisnya
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}