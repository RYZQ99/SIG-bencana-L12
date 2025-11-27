<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeojsonFile extends Model
{
    protected $fillable = ['name', 'filename', 'is_active'];
}
