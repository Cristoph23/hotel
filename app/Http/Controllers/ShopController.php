<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index()
    {
        $shops = Shop::all();
        return view('shops.index', compact('shops'));
    }

    public function create()
    {
        return view('shops.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_shop' => 'required'
        ]);

        Shop::create($request->all());
        return redirect()->route('shop')->with('info', 'Se agrego la tienda correctamente');
    }

    public function show(Shop $shop)
    {
        //
    }

    public function edit(Shop $shop)
    {
        //
    }

    public function update(UpdateShopRequest $request, Shop $shop)
    {
        //
    }

    public function destroy(Shop $shop)
    {
        //
    }
}
