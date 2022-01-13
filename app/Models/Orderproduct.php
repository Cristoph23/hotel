<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderproduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'reserva_id',
        'total',
    ];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }

    public function orderproductdetails()
    {
        return $this->hasMany(Orderproductdetail::class);
    }
}
