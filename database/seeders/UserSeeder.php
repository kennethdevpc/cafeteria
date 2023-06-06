<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Admin Konecta',
            'email' => 'admin_principal_konecta@gmail.com',
            'password' => Hash::make(12345678),
        ])->assignRole('Administrator');
        User::create([
            'name' => 'Kenneth Puliche',
            'email' => 'kennethdevpc@gmail.com',
            'password' => Hash::make(12345678),
        ])->assignRole('Author');
        User::factory(10)->create();
    }
}
