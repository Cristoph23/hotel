<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'name_service' => 'Colocacion de uñas',
            'price_service' => 85,
            'shop_id' => 1
        ]);

        Service::create([
            'name_service' => 'Corte de cabello',
            'price_service' => 70,
            'shop_id' => 2

        ]);
    }
}
