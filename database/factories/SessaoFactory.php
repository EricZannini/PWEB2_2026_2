<?php

namespace Database\Factories;

use App\Models\Filme;
use App\Models\Sessao;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Sessao>
 */
class SessaoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'filme_id' => Filme::factory(),
            'sala' => 'Sala ' . fake()->numberBetween(1, 6),
            'data_sessao' => fake()->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'hora_inicio' => fake()->randomElement(['14:00', '16:30', '19:00', '20:00', '22:00']),
            'preco' => fake()->randomElement([25.00, 30.00, 45.00]),
        ];
    }
}
