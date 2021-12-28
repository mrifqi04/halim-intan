<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fus extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_polisi',
        'model',
        'no_chassis',
        'nama_customer',
        'no_telp',
        'alamat',
        'catatan',
        'is_ajukan'
    ];
}
