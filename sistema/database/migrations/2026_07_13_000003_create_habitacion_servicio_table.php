<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('habitacion_servicio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_habitacion')
                ->constrained('habitaciones', 'id_habitacion')
                ->cascadeOnDelete();
            $table->foreignId('id_servicio')
                ->constrained('servicios', 'id_servicio')
                ->restrictOnDelete();
            $table->timestamps();

            $table->unique(['id_habitacion', 'id_servicio']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitacion_servicio');
    }
};
