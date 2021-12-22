<?php

namespace App\Http\Controllers;

use App\Models\Typeroom;
use App\Http\Requests\StoreTyperoomRequest;
use App\Http\Requests\UpdateTyperoomRequest;
use Illuminate\Http\Request;

class TyperoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = Typeroom::all();

        return view('tipohabitaciones.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipohabitaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTyperoomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_h' => 'required',
            'precio_h' => 'required',
            'detalles_h' => 'required'
        ]);

        Typeroom::create($request->all());

        return redirect()->route('tipohabitacion')->with('info', 'Se agrego el tipo de habitacion correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Typeroom  $typeroom
     * @return \Illuminate\Http\Response
     */
    public function show(Typeroom $typeroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Typeroom  $typeroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Typeroom $typeroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTyperoomRequest  $request
     * @param  \App\Models\Typeroom  $typeroom
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTyperoomRequest $request, Typeroom $typeroom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Typeroom  $typeroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Typeroom $typeroom)
    {
        //
    }
}
