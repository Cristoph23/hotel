<?php

namespace App\Http\Controllers;

use App\Models\Impuesto;
use App\Http\Requests\StoreImpuestoRequest;
use App\Http\Requests\UpdateImpuestoRequest;

class ImpuestoController extends Controller
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
     * @param  \App\Http\Requests\StoreImpuestoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImpuestoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Impuesto  $impuesto
     * @return \Illuminate\Http\Response
     */
    public function show(Impuesto $impuesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Impuesto  $impuesto
     * @return \Illuminate\Http\Response
     */
    public function edit(Impuesto $impuesto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateImpuestoRequest  $request
     * @param  \App\Models\Impuesto  $impuesto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImpuestoRequest $request, Impuesto $impuesto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Impuesto  $impuesto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Impuesto $impuesto)
    {
        //
    }
}
