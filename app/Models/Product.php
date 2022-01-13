<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_p',
        'marca_p',
        'price_p',
        'stock_min',
        'stock',
        'provider_id',
        'url',
        'tipo_venta'
    ];

    public function provider(){
        return $this->belongsTo(Provider::class);
    }

    public function orderproductdetails()
    {
        return $this->hasMany(Orderproductdetail::class);
    }
}
