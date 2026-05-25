<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Juego>
 */
class JuegoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(2),
            'descripcion' => fake()->paragraph(),
            'img' => fake()->imageUrl(640, 480, 'games'),
            'link' => fake()->url(),
        ];
    }
}