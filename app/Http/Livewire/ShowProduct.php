<?php

namespace App\Http\Livewire;

use App\Models\Orderproduct;
use App\Models\Product;
use App\Models\Reserva;
use Livewire\Component;

class ShowProduct extends Component
{
    public function render(Reserva $reserva, Orderproduct $orderproduct)
    {
        $products = Product::all();
        return view('livewire.show-product', compact('products', 'reserva', 'orderproduct'));
    }
}
