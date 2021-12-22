<?php

namespace Database\Seeders;

use App\Models\Typeroom;
use Illuminate\Database\Seeder;

class TyperoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Typeroom::create([
            'tipo_h' => 'Recamara Suit',
            'precio_h' => '3200',
            'detalles_h' => 'Cama matrimonial, dos baños, vista al mar, blacon'
        ]);

        Typeroom::create([
            'tipo_h' => 'Recamara Inidividual',
            'precio_h' => '1000',
            'detalles_h' => 'Cama inidividual, cocina, baño'
        ]);
    }
}
