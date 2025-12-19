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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_arreglo', 100);
            $table->string('nombre_cliente', 100);
            $table->string('telefono', 20);
            $table->text('direccion_entrega');
            $table->date('fecha_entrega');
            $table->enum('estado', ['pendiente', 'armando', 'entregado'])
                ->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
