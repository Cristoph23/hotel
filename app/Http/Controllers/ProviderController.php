<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    
    public function index()
    {
        $providers = Provider::all();
        return view('providers.index', compact('providers'));
    }
  
    public function create()
    {
        return view('providers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_prov' => 'required',
        ]);

        Provider::create($request->all());
        return redirect()->route('provider')->with('info', 'Se agrego el provedor correctamente');
    }
   
    public function show(Provider $provider)
    {
        //
    }

    public function edit(Provider $provider)
    {
        //
    }

    public function update(UpdateProviderRequest $request, Provider $provider)
    {
        //
    }

    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->route('provider')->with('info', 'Se elimino el provedor correctamente');

    }
}
