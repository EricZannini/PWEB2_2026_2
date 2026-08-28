<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ingresso;
use App\Models\Sessao;

class IngressoSeeder extends Seeder
{
    public function run(): void
    {
        $sessoes = Sessao::orderBy('id')->pluck('id')->all();

        $ingressos = [
            ['sessao_id' => $sessoes[0], 'cliente_nome' => 'João Silva', 'assento' => 'A1', 'tipo_ingresso' => 'Inteira'],
            ['sessao_id' => $sessoes[1], 'cliente_nome' => 'Maria Souza', 'assento' => 'B3', 'tipo_ingresso' => 'Meia'],
            ['sessao_id' => $sessoes[2], 'cliente_nome' => 'Carlos Pereira', 'assento' => 'C5', 'tipo_ingresso' => 'Inteira'],
            ['sessao_id' => $sessoes[3], 'cliente_nome' => 'Eric Zannini', 'assento' => 'F6', 'tipo_ingresso' => 'Meia'],
        ];

        foreach ($ingressos as $ingresso) {
            Ingresso::create($ingresso);
        }
    }
}
