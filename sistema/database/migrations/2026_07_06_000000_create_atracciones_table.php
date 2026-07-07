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
        Schema::create('atracciones', function (Blueprint $table) {
            $table->id('id_atraccion');
            $table->foreignId('id_destino')
                ->constrained('destinos', 'id_destino')
                ->cascadeOnDelete();
            $table->string('nom_atr', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atracciones');
    }
};
