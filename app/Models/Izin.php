<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'keterangan',
        'photo_path',
        'catatan',
        'created_at',
        'updated_at'
    ];
}
