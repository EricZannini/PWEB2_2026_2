<?php

namespace Database\Factories;

use App\Models\Ingresso;
use App\Models\Sessao;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Ingresso>
 */
class IngressoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'sessao_id' => Sessao::factory(),
            'cliente_nome' => fake()->name(),
            'assento' => fake()->randomLetter() . fake()->numberBetween(1, 20),
            'tipo_ingresso' => fake()->randomElement(['Inteira', 'Meia']),
        ];
    }
}
