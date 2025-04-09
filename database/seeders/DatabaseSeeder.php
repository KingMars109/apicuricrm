<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Suscripcion;
use App\Models\Pago;
use App\Models\Contacto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 10 clientes
        $clientes = Cliente::factory(10)->create();

        // Create 3 suscripcions
        $suscripcions = Suscripcion::factory(3)->create();

        // Create 20 pagos
        $pagos = Pago::factory(20)->create([
            'id_cliente' => fn() => $clientes->random()->id_cliente,
            'id_suscripcion' => fn() => $suscripcions->random()->id_suscripcion
        ]);

        // Create 15 contactos
        $contactos = Contacto::factory(15)->create([
            'id_cliente' => fn() => $clientes->random()->id_cliente
        ]);
    }
}
