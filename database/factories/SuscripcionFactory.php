<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SuscripcionFactory extends Factory
{
    public function definition()
    {
        return [
            'nombre_plan' => $this->faker->randomElement(['Básico', 'Estándar', 'Premium']),
            'costo_mensual' => $this->faker->randomFloat(2, 10, 100),
            'costo_bienvenida' => $this->faker->randomFloat(2, 0, 50),
            'beneficios' => $this->faker->paragraph,
            'promocion' => $this->faker->sentence
        ];
    }
}
