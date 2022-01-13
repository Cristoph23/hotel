<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Reserva;
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
        return view('servicios.create');
    }

    
    public function store(Request $request)
    {
        Service::create($request->all());
        return redirect()->route('servicio')->with('info', 'Se agrego el servicio correctamente');
    }

    public function buscar()
    {
        return view('servicios.buscar');
    }

    public function buscador(Request $request)
    {
        $reserva = Reserva::find($request->buscar);
        $services = Service::pluck('name_service', 'id');
        return view('servicios.reservar', compact('reserva', 'services'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        //
    }

    public function destroy(Service $service)
    {
        //
    }
}
