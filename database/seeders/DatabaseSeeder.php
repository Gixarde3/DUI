<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Usuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Usuario::factory()->create([
            'username' => 'Usuario',
            'email' => 'crmo210133@upemor.edu.mx',
            'password' => 'password',
            'tipoUsuario' => 2,
            'sesion' => '$2y$12$CuZckrrB/oS48n/J9yeNAO3KwxTcbrg4j17FHyPVY6IEq6xv.SSsC'
        ]);
    }
}
