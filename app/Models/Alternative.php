<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_alternative';

    protected $fillable = [
        'id_anggota',
        'id_kriteria',
        'nilai',
    ];
}
