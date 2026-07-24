<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_guru';

    protected $fillable = [
        'nama',
        'nip',
        'bidang_studi',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'social_media',
        'jabatan',
        'foto',
        'jenis_kelamin',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_lahir' => 'date',
        ];
    }
}
