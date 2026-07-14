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
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->id('id_habitacion');
            $table->integer('numero_habi')->unique();
            $table->integer('capacidad');
            $table->decimal('tarifa_noche', 10, 2);
            $table->string('imagen');
            $table->foreignId('id_estado')
                ->constrained('estado_habi', 'id_estado')
                ->restrictOnDelete();
            $table->foreignId('id_hotel')
                ->constrained('hotels', 'id_hotel')
                ->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitaciones');
    }
};
