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
            Schema::create('pagos', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('pedido_id');
                $table->enum('metodo', ['tarjeta', 'yape', 'plin', 'contra_entrega']);
                $table->enum('estado', ['pendiente', 'pagado', 'fallido'])->default('pendiente');
                $table->string('referencia_pago')->nullable(); // puede ser nulo si es contra entrega
                $table->timestamp('fecha_pago')->nullable();
                $table->timestamps();

                $table->foreign('pedido_id')->references('id')->on('pedidos');
            });
        }

};
