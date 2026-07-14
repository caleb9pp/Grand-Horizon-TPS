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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id('id_categoria');
            $table->string('categoria', 100)->unique();
            $table->timestamps();
        });

        Schema::table('habitaciones', function (Blueprint $table) {
            $table->foreignId('id_categoria')
                ->nullable()
                ->after('id_hotel')
                ->constrained('categorias', 'id_categoria')
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('habitaciones', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_categoria');
        });

        Schema::dropIfExists('categorias');
    }
};
