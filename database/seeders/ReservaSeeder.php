<?php

namespace Database\Seeders;

use App\Models\Reserva;
use Illuminate\Database\Seeder;

class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reserva::create([
            'title' => "Cristoph Rodriguez Prado",
            'nombre' => "Cristoph Rodriguez Prado",
            'room_id' => "23",
            'start' => "2021-12-29 00:00:00",
            'end' => "2021-12-31 00:00:00",
            'dias' => "3",
            'adults' => '2',
            'kids' => '2',

        ]);
    }
}
