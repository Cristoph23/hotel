<?php

namespace App\Http\Controllers;

use App\Models\Impuesto;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $habitaciones = Room::all();
        $habitaciones_o = Room::where('status_r', 'Ocupado')->get();
        return view('welcome', compact('habitaciones_o', 'habitaciones')); 
    }

    public function configuraciones()
    {
        return view('configuracion.index');
    }

    public function iva()
    {
        $impuestos = Impuesto::all();
        return view('configuracion.iva', compact('impuestos'));
    }

    public function agregariva(Request $request)
    {
        Impuesto::create($request->all());
        return redirect()->route('configuraciones.iva')->with('info', 'Se agrego un nuevo IVA correctamente.');
    }

    public function editariva(Impuesto $impuesto, Request $request)
    {
        $impuesto->update($request->all());
        return redirect()->route('configuraciones.iva')->with('info', 'Se edito el IVA correctamente.');
    }

    public function eliminariva(Impuesto $impuesto)
    {
        $impuesto->delete();
        return redirect()->route('configuraciones.iva')->with('info', 'Se elimino el IVA correctamente.');
    }

}
