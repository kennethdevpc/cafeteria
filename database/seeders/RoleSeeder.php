<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = Role::create([
            'name' => 'Administrator',
        ]);
        $author = Role::create([
            'name' => 'Author',
        ]);
        $client = Role::create([
            'name' => 'Client',
        ]);

        // Administration: $author just can see all, but not to edit, update, destroy, $admin can to see all
        Permission::create([
            'name' => 'admin.index',
            'description' => 'Ver panel de admin', //Users//productos//tienda//carrito
        ])->syncRoles([$admin,$author]);


        //roles
        Permission::create([
            'name' => 'roles.index',
            'description' => 'Ver roles',
        ])->syncRoles([$admin, $author]);
        Permission::create([
            'name' => 'roles.create',
            'description' => 'Crear roles',
        ])->assignRole($admin);
        Permission::create([
            'name' => 'roles.edit',
            'description' => 'Editar roles',
        ])->assignRole($admin);
        Permission::create([
            'name' => 'roles.destroy',
            'description' => 'Eliminar roles',
        ])->assignRole($admin);

        //products:
        Permission::create([
            'name' => 'products.index',
            'description' => 'Ver products',
        ])->syncRoles([$admin,$author]);
        Permission::create([
            'name' => 'products.create',
            'description' => 'Crear products',
        ])->assignRole($admin);
        Permission::create([
            'name' => 'products.edit',
            'description' => 'Editar products',
        ])->assignRole($admin);
        Permission::create([
            'name' => 'products.destroy',
            'description' => 'Eliminar products',
        ])->assignRole($admin);

        //usuarios
        Permission::create([
            'name' => 'users.index',
            'description' => 'Ver users',
        ])->assignRole($admin);
        Permission::create([
            'name' => 'users.create',
            'description' => 'Crear users',
        ])->assignRole($admin);
        Permission::create([
            'name' => 'users.edit',
            'description' => 'Editar users',
        ])->assignRole($admin);
        Permission::create([
            'name' => 'users.destroy',
            'description' => 'Eliminar users',
        ])->assignRole($admin);
    }
}
