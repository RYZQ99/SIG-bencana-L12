<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bencana extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_bencana',
        'lokasi',
        'tingkat_kerentanan',
        'warna',
        'geojson_path'
    ];
}
