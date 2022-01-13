<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_service',
        'price_service'
    ];

    public function reservaservices()
    {
        return $this->hasMany(Reservaservice::class);
    }
}
