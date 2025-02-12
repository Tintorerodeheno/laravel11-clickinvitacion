<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // Evita duplicar el usuario de prueba
    User::firstOrCreate(
        ['email' => 'test@example.com'], // Condición: Si ya existe este email, no lo crea
        [
            'name' => 'Test User',
            'password' => bcrypt('password'), // Asegura que tenga un password válido
        ]
    );

    // Registra el PermissionSeeder
    $this->call(PermissionSeeder::class);
}
}
