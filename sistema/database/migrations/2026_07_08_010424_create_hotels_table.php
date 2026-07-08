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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id('id_hotel');
            $table->string('nom_hotel', 100) ->unique();
            $table->text('dir_hotel');
            $table->string('contacto', 200);
            $table->text('politica');
            $table->string('imagen_hotel');
            $table->foreignId('id_destino')
              ->constrained('destinos', 'id_destino')
              ->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
