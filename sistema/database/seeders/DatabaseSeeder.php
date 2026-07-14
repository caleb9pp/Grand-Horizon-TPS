<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Solo crear el usuario de prueba si no existe
        if (!User::where('nom_usuario', 'test')->exists()) {
            User::factory()->create([
                'nombre' => 'Test',
                'apellido' => 'User',
                'nom_usuario' => 'test',
                'celular' => '0000000000',
            ]);
        }

        $this->call(EstadoHabiSeeder::class);
    }
}
