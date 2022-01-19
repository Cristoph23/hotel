<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Typeroom;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function index()
    {
        $habitaciones = Room::all();
        $tipohabitaciones = Typeroom::pluck('type_room', 'id');
        return view('habitaciones.index', compact('habitaciones', 'tipohabitaciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'typeroom_id' => 'required',
            'capacidad' => 'required',
        ]);

        Room::create([
            'typeroom_id' => $request->typeroom_id,
            'capacidad' => $request->capacidad,
            'status_r' => 'Desocupado',
        ]);

        return redirect()->route('habitacion')->with('info', 'Se agrego la habitacion correctamente');
    }

    public function show(Room $room)
    {
        //
    }

    public function edit(Room $room)
    {
        //
    }

    public function update(UpdateRoomRequest $request, Room $room)
    {
        //
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('habitacion')->with('del', 'Se elimino correctamente el registro');
    }
}
