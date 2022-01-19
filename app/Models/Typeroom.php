<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typeroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_room',
        'price_adult',
        'price_kid',
        'details_room'
    ];

    public function rooms(){
        return $this->hasMany(Room::class);
    }
}
