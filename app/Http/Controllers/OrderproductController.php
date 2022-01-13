<?php

namespace App\Http\Controllers;

use App\Models\Orderproduct;
use App\Http\Requests\StoreOrderproductRequest;
use App\Http\Requests\UpdateOrderproductRequest;
use App\Models\Orderproductdetail;
use App\Models\Product;
use App\Models\Reserva;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderproductController extends Controller
{
    
    public function index()
    {
        return view('products.buscar');
    }

    public function buscar(Request $request)
    {
        $reserva = Reserva::find($request->buscar);
        $products = Product::paginate(4);
        
        if ($request->buscar) {
            $orderproduct = Orderproduct::create([
                'reserva_id' => $request->buscar,
            ]);
        }
        
        return view('products.pedir', compact('reserva', 'products', 'orderproduct'));
    }
    
    public function agregarproduct(Request $request)
    {  
        $reserva = Reserva::find($request->buscar);
        $orderproduct = $request->orderproduct_id;

        $cantidad = Product::find($request->product_id); 
        if ($cantidad->stock > 0) {
            Orderproductdetail::create([
                'orderproduct_id' => $request->orderproduct_id,
                'product_id' => $request->product_id,
                'total' => $request->total,
                'quantity' => 1
            ]);
    
            
    
            $cantidad->update([
                'stock' => $cantidad->stock - 1
            ]);

            return redirect()->route('orderproduct.myorder', ['reserva' => $reserva, 'orderproduct' => $orderproduct])->with('info', 'Se agrego el producto correctamente');

        } else {
            return redirect()->route('orderproduct.myorder', ['reserva' => $reserva, 'orderproduct' => $orderproduct])->with('danger', 'Se agoto el producto ' . $cantidad->name_p);
        }
        

    }

    
    public function myorder(Reserva $reserva, Orderproduct $orderproduct)
    {
        $products = Product::paginate(4);
        $contador = Orderproductdetail::where('orderproduct_id', $orderproduct->id)->count();
        $miorden = Orderproductdetail::where('orderproduct_id', $orderproduct->id)->get();

        $suma = 0;
        foreach ($miorden as $precios) {
            $suma+=$precios->total;
        }

        return view('products.miorden', compact('products', 'reserva', 'orderproduct', 'contador', 'miorden', 'suma'));
    }

    
    public function editarcantidad(Request $request, Orderproductdetail $orderproductdetail)
    {
        $cantidad = Product::find($request->product_id);
        $resta = $request->quantity - $orderproductdetail->quantity;

        if ($orderproductdetail->product->stock < $resta) {
            return redirect()->back()->with('danger', 'Solo puedes comprar ' . $orderproductdetail->product->stock . ' productos mas de ' . $orderproductdetail->product->name_p);

        } else {
            $orderproductdetail->update([
                'quantity' => $request->quantity,
                'total' => $request->precio * $request->quantity 
            ]);
            $cantidad->update([
                'stock' => $cantidad->stock - $resta
            ]);
            return redirect()->back()->with('info', 'Se edito correctamente el producto');
        } 
    
    }

   
    public function eliminar(Orderproductdetail $orderproductdetail)
    {
        $producto = Product::find($orderproductdetail->product_id);

        $producto->update([
            'stock' => $producto->stock + $orderproductdetail->quantity
        ]);

        $orderproductdetail->delete();
        return redirect()->back()->with('info', 'Se elimino correctamente el producto');
    }

   
    public function buscador(Request $request)
    {
        $products = Product::where("nombre_p", "like", $request->buscar. "%")->take(4)->get();
        return view('products.miorden', compact('products'));
    }

    public function limpiarcarrito(Request $request)
    {
        
        $miorden = Orderproductdetail::where('orderproduct_id', $request->orden)->get();

        foreach ($miorden as $key => $orden) {            
            $producto = Product::find($orden->product->id);
            $producto->update([
                'stock' => $orden->product->stock + $orden->quantity
            ]);
        }

        Orderproductdetail::where('orderproduct_id', $request->orden)->delete();
        return redirect()->back()->with('info', 'Se limipio el carrito correctamente');

    }

    public function cancelar(Request $request)
    {
        $miorden = Orderproductdetail::where('orderproduct_id', $request->orden)->get();

        foreach ($miorden as $key => $orden) {            
            $producto = Product::find($orden->product->id);
            $producto->update([
                'stock' => $orden->product->stock + $orden->quantity
            ]);
        }

        Orderproductdetail::where('orderproduct_id', $request->orden)->delete();

        Orderproduct::find($request->orden)->delete();
        return redirect()->route('orderproduct')->with('info', 'Se cancelo la orden correctamente');
    }

    public function cobrar()
    {
        return view('products.cobrar');
    }
}
