<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Reserva;
use App\Models\Shop;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
   
    public function index()
    {
        $services = Service::all();
        return view('servicios.index', compact('services'));
    }
   
    public function create()
    {
        $shops = Shop::pluck('name_shop', 'id');
        return view('servicios.create', compact('shops'));
    }

    
    public function store(Request $request)
    {
        Service::create($request->all());
        return redirect()->route('servicio')->with('info', 'Se agrego el servicio correctamente');
    }

    public function buscar()
    {
        $shops = Shop::pluck('name_shop', 'id');
        return view('servicios.buscar', compact('shops'));
    }

    public function buscador(Request $request)
    {
        $reserva = Reserva::find($request->buscar);
        $shop = Shop::find($request->shop);
        $services = Service::where('shop_id', $shop->id)->get();
        $misservicios = $services->pluck('name_service', 'id');
        return view('servicios.reservar', compact('reserva', 'misservicios', 'shop'));
    }

}
