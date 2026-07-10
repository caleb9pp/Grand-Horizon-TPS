<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('destino_servicio')) {
            Schema::create('destino_servicio', function (Blueprint $table) {
                $table->id();
                $table->foreignId('id_destino')
                    ->constrained('destinos', 'id_destino')
                    ->cascadeOnDelete();
                $table->foreignId('id_servicio')
                    ->constrained('servicios', 'id_servicio')
                    ->restrictOnDelete();
                $table->timestamps();

                $table->unique(['id_destino', 'id_servicio']);
            });
        }

        if (Schema::hasTable('atracciones')) {
            $atracciones = DB::table('atracciones')->get();

            foreach ($atracciones as $atraccion) {
                $servicio = DB::table('servicios')->where('nom_servicio', $atraccion->nom_atr)->first();

                if (!$servicio) {
                    $idServicio = DB::table('servicios')->insertGetId([
                        'nom_servicio' => $atraccion->nom_atr,
                        'descripcion' => 'Atraccion registrada para destino.',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                } else {
                    $idServicio = $servicio->id_servicio;
                }

                DB::table('destino_servicio')->updateOrInsert(
                    [
                        'id_destino' => $atraccion->id_destino,
                        'id_servicio' => $idServicio,
                    ],
                    [
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }

            Schema::dropIfExists('atracciones');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destino_servicio');

        if (!Schema::hasTable('atracciones')) {
            Schema::create('atracciones', function (Blueprint $table) {
                $table->id('id_atraccion');
                $table->foreignId('id_destino')
                    ->constrained('destinos', 'id_destino')
                    ->cascadeOnDelete();
                $table->string('nom_atr', 100);
            });
        }
    }
};
