<?php

namespace Database\Factories;

use App\Models\Filme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Filme>
 */
class FilmeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(3),
            'genero' => fake()->randomElement(['Ação', 'Comédia', 'Terror', 'Drama', 'Ficção', 'Animação']),
            'duracao' => fake()->numberBetween(1, 3) . 'h' . fake()->numberBetween(0, 59),
            'classificacao' => fake()->randomElement(['L', '6+', '10+', '12+', '14+', '16+', '18+']),
        ];
    }
}
