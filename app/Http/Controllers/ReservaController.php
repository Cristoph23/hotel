<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Http\Requests\StoreReservaRequest;
use App\Http\Requests\UpdateReservaRequest;
use App\Models\Pago;
use App\Models\Room;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    
    public function index()
    {
        $recamara_suit = Room::where('typeroom_id', 1)->get();
        $recamara_individual = Room::where('typeroom_id', 2)->get();
        $recamara_matrimonial = Room::where('typeroom_id', 3)->get();
        $recamara_VIP = Room::where('typeroom_id', 4)->get();
        $recamara_prime = Room::where('typeroom_id', 5)->get();
        $recamara_mega = Room::where('typeroom_id', 6)->get();


        return view('reservas.index', compact('recamara_suit', 'recamara_individual', 'recamara_matrimonial', 'recamara_VIP', 'recamara_prime', 'recamara_mega'));
    }

    public function create(Room $room)
    {
        return view('reservas.reservar', compact('room'));
    }

   
    public function store(Request $request)
    {
        $request->validate(Reserva::$rules);
        $reserva = Reserva::create($request->all());  
    }

    public function show(Room $room)
    {
        $reserva = Reserva::where('room_id', $room->id)->get();
        return response()->json($reserva);
    }

   
    public function edit($id)
    {
        $reserva = Reserva::find($id);

        $reserva->start = Carbon::createFromFormat('Y-m-d H:i:s', $reserva->start)->format('Y-m-d');
        $reserva->end = Carbon::createFromFormat('Y-m-d H:i:s', $reserva->end)->format('Y-m-d');
        
        return response()->json($reserva);
    }

  
    public function update(Request $request, Reserva $reserva)
    {
        $request->validate(Reserva::$rules);
        $reserva->update($request->all());
        return response()->json($reserva);
    }

    public function destroy($id)
    {
        $reserva = Reserva::find($id)->delete();
        return response()->json($reserva);
    }

    public function pagar(Reserva $reserva)
    {
        return view('reservas.pagar', compact('reserva'));
    }

    public function pagado(Request $request, Reserva $reserva)
    {
        $room = Room::find($reserva->room_id);

        $reserva->total = $request->total;
        $reserva->status_pago = "Pagado";
        $reserva->tipo_pago = $request->tipo_pago;

        $reserva->save();

        $room->update([
            'status_r' => 'Ocupado'
        ]);

        Pago::create([
            'referencia' => 'Pago de habitacion',
            'pago' => $request->total,
            'fecha_pago' => Carbon::now()
        ]);
        
        $data = [
            'id' => $reserva->id,
            'nombre' => $reserva->nombre,
            'start' => $reserva->start,
            'end' => $reserva->end,
            'room_id' => $reserva->room_id,
            'total' => $reserva->total,
            'dias' => $reserva->dias,
            'price' => $reserva->room->typeroom->precio_h,

            'tipo' => $reserva->room->typeroom->tipo_h,

        ];
    
        return \PDF::loadView('reservas', $data)->stream('reserva.pdf');
        
    }

    public function lista()
    {
        $reservas = Reserva::all();

        return view('reservas.lista', compact('reservas'));
    }
       
}
