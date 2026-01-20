<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;

class EGameFlowGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            [
                'name'        => 'Concentração',
                'description' => 'O jogo exigiu concentração e o jogador conseguiu se concentrar no jogo',
                'method_id'   => 3,
            ],
            [
                'name'        => 'Desafios',
                'description' => 'O jogo foi suficientemente desafiador e correspondeu ao nível de habilidade do jogador.',
                'method_id'   => 3,
            ],
            [
                'name'        => 'Autonomia',
                'description' => 'O jogador sentiu que têm autonomia sobre suas ações no jogo.',
                'method_id'   => 3,
            ],
            [
                'name'        => 'Objetivos',
                'description' => 'O jogo forneceu ao jogador objetivos claros em momentos apropriados.',
                'method_id'   => 3,
            ],
            [
                'name'        => 'Feedback',
                'description' => 'O jogador recebeu feedback apropriado em momentos apropriados.',
                'method_id'   => 3,
            ],
            [
                'name'        => 'Imersão',
                'description' => 'O jogador experienciou um envolvimento profundo, mas sem esforço, no jogo.',
                'method_id'   => 3,
            ],
            [
                'name'        => 'Interação Social',
                'description' => 'O jogo conseguiu apoiar e criar oportunidades para a interação social.',
                'method_id'   => 3,
            ],
            [
                'name'        => 'Melhora de Conhecimento',
                'description' => 'O jogo aumentou o nível de conhecimento e as habilidades do jogador, ao mesmo tempo que atende ao objetivo do currículo.',
                'method_id'   => 3,
            ],
        ];

        foreach ($groups as $group) {
            Group::create($group);
        }
    }
}
