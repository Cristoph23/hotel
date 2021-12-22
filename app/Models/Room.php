<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'typeroom_id',
        'capacidad',
        'status_r'
    ];

    public function typeroom(){
        return $this->belongsTo(Typeroom::class);
    }
}
