<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderproductdetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderproduct_id',
        'product_id',
        'quantity',
        'total'
    ];

    public function orderproduct(){
        return $this->belongsTo(Orderproduct::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
