<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PagoFactory extends Factory
{
    public function definition()
    {
        return [
            'fecha_pago' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'monto' => $this->faker->randomFloat(2, 5, 200)
        ];
    }
}
