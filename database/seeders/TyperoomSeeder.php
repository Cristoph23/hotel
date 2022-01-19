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
            'type_room' => 'Recamara Suit',
            'price_adult' => '3200',
            'price_kid' => '1900',
            'details_room' => 'Cama matrimonial, dos baños, vista al mar, blacon'
        ]);

        Typeroom::create([
            'type_room' => 'Recamara Inidividual',
            'price_adult' => '1000',
            'price_kid' => '900',
            'details_room' => 'Cama inidividual, cocina, baño'
        ]);

        
        Typeroom::create([
            'type_room' => 'Recamara Matrimonial',
            'price_adult' => '1400',
            'price_kid' => '1000',
            'details_room' => 'Cama matrimonial, cocina, baño'
        ]);

        
        Typeroom::create([
            'type_room' => 'Recamara VIP',
            'price_adult' => '2000',
            'price_kid' => '1500',
            'details_room' => 'Cama matrimonail, cocina, baño, bar, balcon'
        ]);

        
        Typeroom::create([
            'type_room' => 'Recamara Prime',
            'price_adult' => '2500',
            'price_kid' => '2000',
            'details_room' => '2 camas matrimoniales, cocina, baño, balcon'
        ]);

        
        Typeroom::create([
            'type_room' => 'Recamara Mega Suid',
            'price_adult' => '3500',
            'price_kid' => '3000',
            'details_room' => '2 camas matrimoniales, cocina, sala, comedor, baño, balcon, vista al mar'
        ]);

    }
}
