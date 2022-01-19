<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservaservice extends Model
{
    use HasFactory;

    static $rules=[
        'title' => 'required',
        'reserva_id' => 'required',
        'service_id' => 'required',
        'start' => 'required',
    ];

    protected $fillable = [
        'title',
        'reserva_id',
        'service_id',
        'total',
        'start',
        'end',
        'shop_id'
    ];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
   
}
