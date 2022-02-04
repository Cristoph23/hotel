<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderproduct;
use App\Models\Orderproductdetail;
use App\Models\Reserva;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function index()
    {
        $hoy = Carbon::today();
        $reservas = Reserva::whereDate('end', $hoy)->get();
        return view('checkout.index', compact('reservas'));    
        
    }

    public function pagar(Reserva $reserva)
    {
        $orders = Orderproduct::where('reserva_id', $reserva->id)->get();
        foreach ($orders as $order) {
            $orderdetails = Orderproductdetail::where('orderproduct_id', $order->id)->get();
        }
        return view('checkout.pagar', compact('reserva', 'orders', 'orderdetails'));
    }
}
