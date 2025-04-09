<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('suscripcions', function (Blueprint $table) {
            $table->id('id_suscripcion');
            $table->string('nombre_plan', 50);
            $table->decimal('costo_mensual', 8, 2);
            $table->decimal('costo_bienvenida', 8, 2);
            $table->text('beneficios');
            $table->string('promocion', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('suscripcions');
    }
};
