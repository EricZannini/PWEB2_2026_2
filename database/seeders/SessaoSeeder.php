<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sessao;
use App\Models\Filme;

class SessaoSeeder extends Seeder
{
    public function run(): void
    {
        $filmes = Filme::orderBy('id')->pluck('id')->all();

        $sessoes = [
            ['filme_id' => $filmes[0], 'sala' => 'Sala 1', 'data_sessao' => '2026-09-10', 'hora_inicio' => '14:00', 'preco' => 25.00],
            ['filme_id' => $filmes[1], 'sala' => 'Sala 2', 'data_sessao' => '2026-09-10', 'hora_inicio' => '16:30', 'preco' => 25.00],
            ['filme_id' => $filmes[2], 'sala' => 'Sala 3', 'data_sessao' => '2026-09-11', 'hora_inicio' => '19:00', 'preco' => 30.00],
            ['filme_id' => $filmes[3], 'sala' => 'Sala VIP', 'data_sessao' => '2026-09-12', 'hora_inicio' => '20:00', 'preco' => 45.00],
        ];

        foreach ($sessoes as $sessao) {
            Sessao::create($sessao);
        }
    }
}
