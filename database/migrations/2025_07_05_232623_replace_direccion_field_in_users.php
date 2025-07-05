<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('users', function (Blueprint $table) {
            // Eliminar campo anterior
            if (Schema::hasColumn('users', 'direccion')) {
                $table->dropColumn('direccion');
            }

            // Agregar campos nuevos
            $table->string('departamento', 50)->nullable();
            $table->string('provincia', 50)->nullable();
            $table->string('distrito', 50)->nullable();
            $table->string('direccion_detallada', 150)->nullable();
        });
    }

    public function down(): void {
        Schema::table('users', function (Blueprint $table) {
            // Restaurar campo direccion antiguo
            $table->string('direccion', 255)->nullable();

            // Eliminar los nuevos campos
            $table->dropColumn(['departamento', 'provincia', 'distrito', 'direccion_detallada']);
        });
    }
};
