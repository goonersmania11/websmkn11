<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spmb extends Model
{
    use HasFactory;

    protected $table = 'spmbs';

    protected $fillable = [
        'judul', 
        'isi', 
        'persyaratan', 
        'jadwal', 
        'alur_pendaftaran', 
        'link_pendaftaran'
    ];
}