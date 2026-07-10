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
        Schema::create('hotel_servicio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_hotel')
                ->constrained('hotels', 'id_hotel')
                ->cascadeOnDelete();
            $table->foreignId('id_servicio')
                ->constrained('servicios', 'id_servicio')
                ->restrictOnDelete();
            $table->timestamps();

            $table->unique(['id_hotel', 'id_servicio']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_servicio');
    }
};
