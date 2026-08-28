<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Filme;

class FilmeSeeder extends Seeder
{
    public function run(): void
    {
        $filmes = [
            ['titulo' => 'Super Mario Galaxy O Filme', 'genero' => 'Ação e Aventura', 'duracao' => '1h39', 'classificacao' => '6+'],
            ['titulo' => 'Crepúsculo (Relançamento)', 'genero' => 'Fantasia e Romance', 'duracao' => '2h02', 'classificacao' => '12+'],
            ['titulo' => 'Cara de Um, Focinho de Outro', 'genero' => 'Animação, Aventura e Comédia', 'duracao' => '1h45', 'classificacao' => '6+'],
            ['titulo' => 'Pânico 7', 'genero' => 'Terror e Mistério', 'duracao' => '1h54', 'classificacao' => '18+'],
            ['titulo' => 'Devoradores de Estrelas', 'genero' => 'Ação e Aventura', 'duracao' => '2h02', 'classificacao' => '12+'],
            ['titulo' => 'Velhos Bandidos', 'genero' => 'Policial, Ação e Comédia', 'duracao' => '1h33', 'classificacao' => '14+'],
            ['titulo' => 'Backrooms', 'genero' => 'Terror', 'duracao' => '1h50', 'classificacao' => '16+'],
            ['titulo' => 'Scarface', 'genero' => 'Ação e Aventura', 'duracao' => '2h50', 'classificacao' => '18+'],
            ['titulo' => 'Todo Mundo em Pânico 6', 'genero' => 'Comédia', 'duracao' => '1h35', 'classificacao' => '18+'],
            ['titulo' => 'Dia D', 'genero' => 'Suspense', 'duracao' => '2h30', 'classificacao' => '12+'],
            ['titulo' => 'Vingadores', 'genero' => 'Ação e Aventura', 'duracao' => '2h30', 'classificacao' => '14+'],
            ['titulo' => 'Vingadores 3', 'genero' => 'Super-Herói', 'duracao' => '1h30', 'classificacao' => '12+'],
        ];

        foreach ($filmes as $filme) {
            Filme::create($filme);
        }
    }
}
