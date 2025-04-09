<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactoFactory extends Factory
{
    public function definition()
    {
        return [
            'tipo_contacto' => $this->faker->randomElement(['email', 'teléfono', 'dirección', 'red social']),
            'detalle' => $this->faker->sentence
        ];
    }
}
