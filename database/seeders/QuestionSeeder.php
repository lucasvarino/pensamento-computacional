<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::factory()->create([
            'title' => 'Em um jogo de múltiplos jogadores, você fica mais confortável quando...'
        ]);

        Question::factory()->create([
           'title' => 'Qual é mais prazeroso para você:'
        ]);

        Question::factory()->create([
            'title' => 'Quais das opções você gosta mais em aventuras?'
        ]);

        Question::factory()->create([
            'title' =>  'Qual você gosta mais?'
        ]);

        Question::factory()->create([
            'title' => 'Em um mundo de vários jogadores, você prefere:'
        ]);

        Question::factory()->create([
            'title' => 'Qual você gosta mais?'
        ]);

        Question::factory()->create([
            'title' => 'O que é mais importante para você:'
        ]);

        Question::factory()->create([
            'title' => 'Em um mundo de vários jogadores você está sendo perseguido por um monstro. Você...'
        ]);

        Question::factory()->create([
            'title' => 'Você deseja lutar um dragão muito poderoso. Como você aborda este problema?'
        ]);

        Question::factory()->create([
            'title' => 'Você está prestes a ir em um calabouço desconhecido. Você pode escolher mais uma pessoa para o seu grupo. Você traz...'
        ]);

        Question::factory()->create([
            'title' => 'É melhor ser:'
        ]);

        Question::factory()->create([
            'title' => 'Qual é mais exitante:'
        ]);

        Question::factory()->create([
            'title' => 'Qual destes você gosta mais:'
        ]);

        Question::factory()->create([
            'title' => 'O que é pior:'
        ]);

        Question::factory()->create([
            'title' => 'Você preferiria:'
        ]);

        Question::factory()->create([
            'title' => 'No mundo do jogo, uma nova área se abre. Qual das aopções você esta mais ancisoso para fazer:'
        ]);

        Question::factory()->create([
            'title' => 'Você preferiria:'
        ]);

        Question::factory()->create([
            'title' => 'Você preferiria:'
        ]);

        Question::factory()->create([
            'title' => 'Qual você prefere fazer:'
        ]);

        Question::factory()->create([
            'title' => 'Você tende:'
        ]);

        Question::factory()->create([
            'title' => 'Em um mundo de múltiplos jogadores de um jogo, você prefere se juntar a um grupo de:'
        ]);

        Question::factory()->create([
            'title' => 'Em um mundo de múltiplos jogadores você se encontrar sozinho em uma área. Você acha que...'
        ]);

        Question::factory()->create([
            'title' => 'No mundo de um jogo, você preferiria se conhecido por:'
        ]);

        Question::factory()->create([
            'title' => 'Você prefere:'
        ]);

        Question::factory()->create([
            'title' => 'Você aprende que outro jogador esta planejando seu fracasso. Você:'
        ]);


    }
}
