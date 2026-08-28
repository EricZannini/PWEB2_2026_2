<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<Usuario>
 */
class UsuarioFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'telefone' => fake()->cellphoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'login' => fake()->unique()->userName(),
            'senha' => Hash::make('123456'),
        ];
    }
}
