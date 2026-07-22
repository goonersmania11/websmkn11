<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'nama_sekolah',
        'logo',
        'alamat',
        'deskripsi',
        'sejarah',
        'visi',
        'misi',
        'sambutan_kepala_sekolah',
        'foto_kepala_sekolah',
    ];
}