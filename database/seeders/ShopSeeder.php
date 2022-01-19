<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::create([
            'name_shop' => 'Salon de belleza 1'
        ]);

        Shop::create([
            'name_shop' => 'Salon de belleza 2'
        ]);
    }
}
