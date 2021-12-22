<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typeroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_h',
        'precio_h',
        'detalles_h'
    ];

    public function rooms(){
        return $this->hasMany(Room::class);
    }
}
