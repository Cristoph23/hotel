<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Http\Requests\StoreReservaRequest;
use App\Http\Requests\UpdateReservaRequest;
use App\Models\Room;
use App\Models\Typeroom;
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

   
    public function edit(Reserva $reserva)
    {
        //
    }

  
    public function update(UpdateReservaRequest $request, Reserva $reserva)
    {
        //
    }

    public function destroy(Reserva $reserva)
    {
        //
    }
}
