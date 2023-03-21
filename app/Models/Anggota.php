<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_anggota';

    protected $fillable = [
        'nim',
        'nama_lengkap',
        'tanggal_lahir',
        'tempat_lahir',
        'alamat',
        'agama',
        'no_telepon',
    ];
}
