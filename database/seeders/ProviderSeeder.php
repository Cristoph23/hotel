<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provider::create([
            'name_prov' => 'Zote',
            'telefono' => '5544778899'
        ]);

        Provider::create([
            'name_prov' => 'Papelito Mojado',
            'telefono' => '7718758965'
        ]);
    }
}
