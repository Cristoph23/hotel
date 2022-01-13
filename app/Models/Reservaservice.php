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
        'services_id' => 'required',
        'start' => 'required',
    ];

    protected $fillable = [
        'title',
        'reserva_id',
        'services_id',
        'start',
        'end'
    ];

    public function reserva()
    {
        $this->belongsTo(Reserva::class);
    }

    public function service()
    {
        $this->belongsTo(Service::class);
    }

   
}
