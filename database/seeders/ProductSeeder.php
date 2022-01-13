<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name_p' => 'Jabon Chico',
            'marca_p' => 'Zote',
            'price_p' => 25,
            'stock_min' => 3,
            'stock' => 45,
            'url' => 'images/featureds/zote.jpg',
            'provider_id' => 1,
            'tipo_venta' => 'Vender'
        ]);

        Product::create([
            'name_p' => 'Toalla',
            'marca_p' => 'Juggy',
            'price_p' => 32,
            'stock_min' => 3,
            'stock' => 40,
            'url' => 'images/featureds/toalla.jpg',
            'provider_id' => 1,
            'tipo_venta' => 'Rentar'

        ]);

        Product::create([
            'name_p' => 'Pasta Dental',
            'marca_p' => 'Colgate',
            'price_p' => 45,
            'stock_min' => 2,
            'stock' => 10,
            'url' => 'images/featureds/pasta.jpg',
            'provider_id' => 1,
            'tipo_venta' => 'Vender'

        ]);

        Product::create([
            'name_p' => 'Shampoo',
            'marca_p' => 'Pantene',
            'price_p' => 145,
            'stock_min' => 2,
            'stock' => 10,
            'url' => 'images/featureds/pantene.jpg',
            'provider_id' => 1,
            'tipo_venta' => 'Vender'

        ]);

        Product::create([
            'name_p' => 'Crema Corporal',
            'marca_p' => 'Voe',
            'price_p' => 105,
            'stock_min' => 2,
            'stock' => 20,
            'url' => 'images/featureds/crema.jpg',
            'provider_id' => 1,
            'tipo_venta' => 'Vender'

        ]);

        Product::create([
            'name_p' => 'Calzonsillos Hombre',
            'marca_p' => 'Sin marca',
            'price_p' => 45,
            'stock_min' => 2,
            'stock' => 60,
            'url' => 'images/featureds/boxer.jpg',
            'provider_id' => 1,
            'tipo_venta' => 'Vender'

        ]);
    }
}
