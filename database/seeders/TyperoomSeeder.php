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

        
        Typeroom::create([
            'tipo_h' => 'Recamara Matrimonial',
            'precio_h' => '1400',
            'detalles_h' => 'Cama matrimonial, cocina, baño'
        ]);

        
        Typeroom::create([
            'tipo_h' => 'Recamara VIP',
            'precio_h' => '2000',
            'detalles_h' => 'Cama matrimonail, cocina, baño, bar, balcon'
        ]);

        
        Typeroom::create([
            'tipo_h' => 'Recamara Prime',
            'precio_h' => '2500',
            'detalles_h' => '2 camas matrimoniales, cocina, baño, balcon'
        ]);

        
        Typeroom::create([
            'tipo_h' => 'Recamara Mega Suid',
            'precio_h' => '1000',
            'detalles_h' => '2 camas matrimoniales, cocina, sala, comedor, baño, balcon, vista al mar'
        ]);

    }
}
