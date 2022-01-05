<?php

namespace App\Http\Controllers;

use App\Models\Seeting;
use App\Http\Requests\StoreSeetingRequest;
use App\Http\Requests\UpdateSeetingRequest;

class SeetingController extends Controller
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
     * @param  \App\Http\Requests\StoreSeetingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSeetingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seeting  $seeting
     * @return \Illuminate\Http\Response
     */
    public function show(Seeting $seeting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seeting  $seeting
     * @return \Illuminate\Http\Response
     */
    public function edit(Seeting $seeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSeetingRequest  $request
     * @param  \App\Models\Seeting  $seeting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSeetingRequest $request, Seeting $seeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seeting  $seeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seeting $seeting)
    {
        //
    }
}
