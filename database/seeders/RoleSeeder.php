<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Recepcionista']);

        Permission::create(['name' => 'home'])->syncRoles([$role1]);

        Permission::create(['name' => 'tipohabitacion'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'habitacion'])->syncRoles([$role1, $role2]);

    }
}