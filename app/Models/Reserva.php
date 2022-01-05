<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    
    static $rules=[
        'title' => 'required',
        'nombre' => 'required',
        'room_id' => 'required',
        'dias' => 'required',
        'start' => 'required',
        'end' => 'required'
    ];

    protected $fillable = [
        'title',
        'nombre',
        'room_id',
        'dias',
        'total',
        'start',
        'status_pago',
        'end'
    ];

    public function room(){
        return $this->belongsTo(Room::class);
    }
}
