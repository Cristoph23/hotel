<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderproduct;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $providers = Provider::pluck('name_prov', 'id');
        return view('products.create', compact('providers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_p' => 'required',
            'marca_p' => 'required',
            'price_p' => 'required',
            'stock_min' => 'required',
            'stock' => 'required',
        ]);

        $product = new Product();

        if ($request->hasFile('url')) {
            $file = $request->file('url');
            $destino = 'images/featureds/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('url')->move($destino, $filename);
            $product->url = $destino . $filename;
        }

        $product->name_p = $request->name_p;
        $product->marca_p = $request->marca_p;
        $product->price_p = $request->price_p;
        $product->stock_min = $request->stock_min;
        $product->stock = $request->stock;
        $product->provider_id = $request->provider_id;
        $product->tipo_venta = $request->tipo_venta;


        $product->save();
        return redirect()->route('product')->with('info', 'Se agrego el producto correctamente');
    }

    public function stock()
    {
        $products = Product::all();
        
        return view('products.stock', compact('products'));
    }

    public function dashboard()
    {
        $products = Product::count();
        $stock = Product::where('stock', '<=', 'stock_min')->count();
        return view('products.dashboard', compact('products', 'stock'));
    }

    public function reportes()
    {
        return view('products.reportes');
    }

    public function agregarstock(Product $product)
    {
        return view('products.agregarstock', compact('product'));
    }

    public function ventas()
    {
        $orders = Orderproduct::all();
        return view('products.ventas', compact('orders'));
    }
}
