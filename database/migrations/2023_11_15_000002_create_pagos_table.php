<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id('id_pago');
            $table->foreignId('id_cliente')->constrained('clientes', 'id_cliente');
            $table->foreignId('id_suscripcion')->constrained('suscripcions', 'id_suscripcion');
            $table->date('fecha_pago');
            $table->decimal('monto', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagos');
    }
};
