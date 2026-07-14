<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $administracionId = DB::table('roles')
            ->where('nom_rol', 'Administracion')
            ->value('id_rol');

        Schema::table('users', function (Blueprint $table) use ($administracionId) {
            $table->string('departamento', 60)->default('Administracion')->after('celular');
            $table->unsignedBigInteger('id_rol')->default($administracionId)->after('departamento');

            $table->foreign('id_rol')
                ->references('id_rol')
                ->on('roles')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_rol']);
            $table->dropColumn(['departamento', 'id_rol']);
        });
    }
};
