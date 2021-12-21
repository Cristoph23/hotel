<?php

namespace App\Http\Controllers;

use App\Models\Typeroom;
use App\Http\Requests\StoreTyperoomRequest;
use App\Http\Requests\UpdateTyperoomRequest;

class TyperoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tipohabitaciones.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTyperoomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTyperoomRequest $request)
    {
        //
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
