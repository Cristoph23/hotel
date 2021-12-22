<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'typeroom_id' => 1,
            'capacidad' => 3,
            'status_r' => 'Ocupado'
        ]);

        Room::create([
            'typeroom_id' => 1,
            'capacidad' => 3,
            'status_r' => 'Ocupado'
        ]);
        
        Room::create([
            'typeroom_id' => 2,
            'capacidad' => 1,
            'status_r' => 'Desocupado'
        ]);

        Room::create([
            'typeroom_id' => 2,
            'capacidad' => 1,
            'status_r' => 'Desocupado'
        ]);
    }
}
