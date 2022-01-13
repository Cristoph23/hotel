<?php

namespace Database\Seeders;

use App\Models\Impuesto;
use Illuminate\Database\Seeder;

class ImpuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Impuesto::create([
            'porcentaje' => 12
        ]);

        Impuesto::create([
            'porcentaje' => 16
        ]);
    }
}
