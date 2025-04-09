<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'correo' => $this->faker->unique()->safeEmail,
            'telefono' => $this->faker->phoneNumber,
            'tipo_cliente' => $this->faker->randomElement(['regular', 'premium', 'empresa'])
        ];
    }
}
