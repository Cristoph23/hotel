<?php

namespace App\Http\Controllers;

use App\Models\Reservaservice;
use App\Http\Requests\StoreReservaserviceRequest;
use App\Http\Requests\UpdateReservaserviceRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservaserviceController extends Controller
{

    public function store(Request $request)
    {
        $request->validate(Reservaservice::$rules);
        $reserva = Reservaservice::create([
            'title' => $request->title,
            'reserva_id' => $request->reserva_id,
            'service_id' => $request->service_id,
            'start' => $request->start,
            'end' => $request->start
        ]);  
    }

    public function show()
    {
        $reservaservice = Reservaservice::all();
        return response()->json($reservaservice);
    }

    public function edit($id)
    {
        $reservaservice = Reservaservice::find($id);

        $reservaservice->start = Carbon::createFromFormat('Y-m-d H:i:s', $reservaservice->start)->format('Y-m-d');
        $reservaservice->end = Carbon::createFromFormat('Y-m-d H:i:s', $reservaservice->end)->format('Y-m-d');
        
        return response()->json($reservaservice);
    }

    public function destroy($id)
    {
        $reservaservice = Reservaservice::find($id)->delete();
        return response()->json($reservaservice);
    }

    public function pagar(Reservaservice $reservaservice)
    {
        return view('servicios.pagar', compact('reservaservice'));
    }

    public function pagado(Request $request, Reservaservice $reservaservice)
    {
        $reservaservice->update([
            'total' => $request->total
        ]);
        return redirect()->route('servicio.buscar')->with('info', 'El pago fue hecho correctamente');
    }

    public function cancelar(Reservaservice $reservaservice)
    {
        $reservaservice->delete();
        return redirect()->route('servicio.buscar')->with('info', 'Se cancelo la compra');

    }
}
