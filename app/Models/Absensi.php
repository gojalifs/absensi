<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jenis',
        'photo_path',
        'latitude',
        'longitude',
        'izin',
        'created_at',
        'updated_at'
    ];
}
