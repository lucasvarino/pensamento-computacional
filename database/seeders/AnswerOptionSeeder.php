<?php

namespace Database\Seeders;

use App\Models\AnswerOption;
use Illuminate\Database\Seeder;

class AnswerOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AnswerOption::factory()->create([
            'title' => 'Estar sozinho caçando monstros para obter pontos de experiência.',
            'group_id' => 1,
            'question_id' => 1
        ]);

        AnswerOption::factory()->create([
            'title' => 'Estar conversando com amigos em um ponto de encontro',
            'group_id' => 4,
            'question_id' => 1
        ]);

        AnswerOption::factory()->create([
            'title' => 'Derrotar um vilão?',
            'group_id' => 1,
            'question_id' => 2
        ]);

        AnswerOption::factory()->create([
            'title' => 'Gabar-se sobre isto com os seus amigos?',
            'group_id' => 4,
            'question_id' => 2
        ]);

        AnswerOption::factory()->create([
            'title' => 'Envolver-se na história?',
            'group_id' => 4,
            'question_id' => 3
        ]);

        AnswerOption::factory()->create([
            'title' => 'Obter as recompensas no final da aventura?',
            'group_id' => 1,
            'question_id' => 3
        ]);

        AnswerOption::factory()->create([
            'title' => 'Obter as últimas novidades/fofocas?',
            'group_id' => 1,
            'question_id' => 4
        ]);

        AnswerOption::factory()->create([
            'title' => 'Obter um item novo?',
            'group_id' => 4,
            'question_id' => 4
        ]);

        AnswerOption::factory()->create([
            'title' => 'Um canal privado onde você e amigos podem se comunicar?',
            'group_id' => 4,
            'question_id' => 5
        ]);

        AnswerOption::factory()->create([
            'title' => 'Sua própria casa valendo milhões de moedas de ouro?',
            'group_id' => 1,
            'question_id' => 5
        ]);

        AnswerOption::factory()->create([
            'title' => 'Administrar sua própria taverna?',
            'group_id' => 4,
            'question_id' => 6
        ]);

        AnswerOption::factory()->create([
            'title' => 'Fazer seus próprios mapas do mundo e vendê-los?',
            'group_id' => 2,
            'question_id' => 6
        ]);

        AnswerOption::factory()->create([
            'title' => 'O número de pessoas?',
            'group_id' => 4,
            'question_id' => 7
        ]);

        AnswerOption::factory()->create([
            'title' => 'O número de áreas a explorar.',
            'group_id' => 2,
            'question_id' => 7
        ]);

        AnswerOption::factory()->create([
            'title' => 'Se esconde em algum lugar onde o mostro não pode te seguir?',
            'group_id' => 2,
            'question_id' => 8
        ]);

        AnswerOption::factory()->create([
            'title' => 'Pede ajuda a um amigo para derrotá-lo?',
            'group_id' => 4,
            'question_id' => 8
        ]);

        AnswerOption::factory()->create([
            'title' => 'Convoque um grande grupo de jogadores para lhe ajudar a derrotá-lo.',
            'group_id' => 4,
            'question_id' => 9
        ]);

        AnswerOption::factory()->create([
            'title' => 'Teste diversas armas e mágicas para encontrar suas fraquezas.',
            'group_id' => 2,
            'question_id' => 9
        ]);

        AnswerOption::factory()->create([
            'title' => 'Um bardo, que é um bom amigo seu e poderá manter você e o grupo entretidos.',
            'group_id' => 2,
            'question_id' => 10
        ]);

        AnswerOption::factory()->create([
            'title' => 'Um mago, para identificar os itens mágicos que vocês encontrarem lá.',
            'group_id' => 2,
            'question_id' => 10
        ]);

        AnswerOption::factory()->create([
            'title' => 'Temido?',
            'group_id' => 3,
            'question_id' => 11
        ]);

        AnswerOption::factory()->create([
            'title' => 'Amado?',
            'group_id' => 4,
            'question_id' => 11
        ]);

        AnswerOption::factory()->create([
            'title' => 'Uma boa história?',
            'group_id' => 4,
            'question_id' => 12
        ]);

        AnswerOption::factory()->create([
            'title' => 'Uma boa luta?',
            'group_id' => 3,
            'question_id' => 12
        ]);

        AnswerOption::factory()->create([
            'title' => 'Ganha rum duelo contra outro jogador?',
            'group_id' => 3,
            'question_id' => 13
        ]);

        AnswerOption::factory()->create([
            'title' => 'Ser aceito por um clã/guilda/grupo?',
            'group_id' => 4,
            'question_id' => 13
        ]);

        AnswerOption::factory()->create([
            'title' => 'Estar sem poder?',
            'group_id' => 3,
            'question_id' => 14
        ]);

        AnswerOption::factory()->create([
            'title' => 'Estar sem amigos?',
            'group_id' => 4,
            'question_id' => 14
        ]);

        AnswerOption::factory()->create([
            'title' => 'Ouvir o que alguém tem a dizer?',
            'group_id' => 4,
            'question_id' => 15
        ]);

        AnswerOption::factory()->create([
            'title' => 'Mostrar-lhes o lado afiado de seu machado?',
            'group_id' => 3,
            'question_id' => 15
        ]);

        AnswerOption::factory()->create([
            'title' => 'Explorar a área nova e descobrir sua história?',
            'group_id' => 2,
            'question_id' => 16
        ]);

        AnswerOption::factory()->create([
            'title' => 'Ser o primeiro a obter o novo equipamento desta área?',
            'group_id' => 1,
            'question_id' => 16
        ]);

        AnswerOption::factory()->create([
            'title' => 'Se tornar um herói mais rápido do que seus amigos?',
            'group_id' => 1,
            'question_id' => 17
        ]);

        AnswerOption::factory()->create([
            'title' => 'Saber de mais segredos do que seus amigos?',
            'group_id' => 2,
            'question_id' => 17
        ]);

        AnswerOption::factory()->create([
            'title' => 'Saber onde encontrar coisas?',
            'group_id' => 1,
            'question_id' => 18
        ]);

        AnswerOption::factory()->create([
            'title' => 'Saber como obter coisas?',
            'group_id' => 4,
            'question_id' => 18
        ]);

        AnswerOption::factory()->create([
            'title' => 'Resolver uma charada que ninguém tenha resolvido?',
            'group_id' => 2,
            'question_id' => 19
        ]);

        AnswerOption::factory()->create([
            'title' => 'Chegar a um nível de experiência que ninguém tenha chegado antes?',
            'group_id' => 1,
            'question_id' => 19
        ]);

        AnswerOption::factory()->create([
            'title' => 'Saber coisas que ninguém mais sabe?',
            'group_id' => 1,
            'question_id' => 20
        ]);

        AnswerOption::factory()->create([
            'title' => 'Ter itens que ninguém mais tem?',
            'group_id' => 1,
            'question_id' => 20
        ]);

        AnswerOption::factory()->create([
            'title' => 'Exploradores?',
            'group_id' => 2,
            'question_id' => 21
        ]);

        AnswerOption::factory()->create([
            'title' => 'Guerreiros?',
            'group_id' => 3,
            'question_id' => 21
        ]);

        AnswerOption::factory()->create([
            'title' => '... significa que é seguro para explorar?',
            'group_id' => 2,
            'question_id' => 22
        ]);

        AnswerOption::factory()->create([
            'title' => '... você vai ter que procurar em algum outro lugar para encontrar alguém para desafiar?',
            'group_id' => 3,
            'question_id' => 22
        ]);

        AnswerOption::factory()->create([
            'title' => 'Conhecimento?',
            'group_id' => 2,
            'question_id' => 23
        ]);

        AnswerOption::factory()->create([
            'title' => 'Poder?',
            'group_id' => 3,
            'question_id' => 23
        ]);

        AnswerOption::factory()->create([
            'title' => 'Derrotar um oponente?',
            'group_id' => 3,
            'question_id' => 24
        ]);

        AnswerOption::factory()->create([
            'title' => 'Explorar uma área nova?',
            'group_id' => 2,
            'question_id' => 24
        ]);

        AnswerOption::factory()->create([
            'title' => 'Vai até uma área que seu oponente é infamiliar com e se prepara la?',
            'group_id' => 2,
            'question_id' => 25
        ]);

        AnswerOption::factory()->create([
            'title' => 'Ataca ele antes que ele lhe ataque?',
            'group_id' => 3,
            'question_id' => 25
        ]);
    }
}
