<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->id('id_contacto');
            $table->foreignId('id_cliente')->constrained('clientes', 'id_cliente');
            $table->string('tipo_contacto', 50);
            $table->text('detalle');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contactos');
    }
};
