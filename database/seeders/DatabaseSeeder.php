<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TyperoomSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(ReservaSeeder::class);
        $this->call(ProviderSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ImpuestoSeeder::class);
        $this->call(ShopSeeder::class);
        $this->call(ServiceSeeder::class);

    }
}
