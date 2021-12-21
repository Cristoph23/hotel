<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123')
        ])->assignRole('Admin');

        User::create([
            'name' => 'admin2',
            'email' => 'admin2@admin.com',
            'password' => bcrypt('admin123')
        ])->assignRole('Recepcionista');
    }
}
