<?php

namespace App\Http\Controllers;

use App\Models\Modificador;
use App\Http\Requests\StoreModificadorRequest;
use App\Http\Requests\UpdateModificadorRequest;

class ModificadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreModificadorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModificadorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modificador  $modificador
     * @return \Illuminate\Http\Response
     */
    public function show(Modificador $modificador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modificador  $modificador
     * @return \Illuminate\Http\Response
     */
    public function edit(Modificador $modificador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateModificadorRequest  $request
     * @param  \App\Models\Modificador  $modificador
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModificadorRequest $request, Modificador $modificador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modificador  $modificador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modificador $modificador)
    {
        //
    }
}
