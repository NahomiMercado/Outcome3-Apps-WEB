<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener el rol Admin
        $adminRole = Role::where('name', 'Admin')->first();

        // Crear usuario admin
        User::create([
            'role_id' => $adminRole->id,
            'name' => 'Admin',
            'email' => 'admin@halcon.com',
            'password' => Hash::make('0102030405060708'),
            'is_active' => true,
        ]);
    }
}