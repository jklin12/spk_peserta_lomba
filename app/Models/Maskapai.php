<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maskapai extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_maskapai';

    protected $fillable = [
        'nama_maskapai',
    ];
}
