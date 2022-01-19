<?php

namespace App\Http\Controllers;

use App\Models\Typeroom;
use App\Http\Requests\StoreTyperoomRequest;
use App\Http\Requests\UpdateTyperoomRequest;
use Illuminate\Http\Request;

class TyperoomController extends Controller
{

    public function index()
    {
        $tipos = Typeroom::all();

        return view('tipohabitaciones.index', compact('tipos'));
    }

    public function store(Request $request)
    {
            // $request->validate([
            //     'tipo_h' => 'required',
            //     'precio_h' => 'required',
            //     'detalles_h' => 'required'
            // ]);

        Typeroom::create($request->all());

        return redirect()->route('tipohabitacion')->with('info', 'Se agrego el tipo de habitacion correctamente');
    }

    public function show(Typeroom $typeroom)
    {
        //
    }

    public function edit(Typeroom $typeroom)
    {
        //
    }

    public function update(UpdateTyperoomRequest $request, Typeroom $typeroom)
    {
        //
    }

    public function destroy(Typeroom $typeroom)
    {
        $typeroom->delete();
        return redirect()->route('tipohabitacion')->with('del', 'Se elimino correctamente el registro');
    }
}
