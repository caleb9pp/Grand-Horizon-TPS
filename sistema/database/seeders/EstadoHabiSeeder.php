<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoHabiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Solo insertar si la tabla está vacía
        if (DB::table('estado_habi')->count() === 0) {
            $estados = [
                ['tipo_estado' => 'Disponible'],
                ['tipo_estado' => 'Ocupada'],
                ['tipo_estado' => 'Mantenimiento'],
                ['tipo_estado' => 'Reservada'],
            ];

            foreach ($estados as $estado) {
                DB::table('estado_habi')->insert([
                    'tipo_estado' => $estado['tipo_estado'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
