<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Rol::create([
            'nombre' => 'admin',
        ]);

        \App\Models\Rol::create([
            'nombre' => 'user',
        ]);

        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'nombre' => 'Admin Samuel',
            'username' => 'admin',
            'email' => 'admin@test.com',
            'password' => 'abc123',
            'id_rol' => 1,
        ]);
    }
}
