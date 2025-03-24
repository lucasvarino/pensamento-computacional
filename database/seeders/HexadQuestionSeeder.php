<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class HexadQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hexadQuestions = [
            ['title' => 'Ser independente é importante para mim.', 'method_id' => 2],               //free spirit
            ['title' => 'Eu me vejo como um rebelde.', 'method_id' => 2],                           //disruptor
            ['title' => 'Gosto de fazer parte de uma equipe.', 'method_id' => 2],                   // socialiser
            ['title' => 'Eu gosto de atividades em grupo.', 'method_id' => 2],                      //socialiser
            ['title' => 'Fico feliz se puder ajudar os outros.', 'method_id' => 2],                 // filantropo
            ['title' => 'Gosto de dominar tarefas difíceis.', 'method_id' => 2],                    //achiever
            ['title' => 'Recompensas são uma ótima maneira de me motivar.', 'method_id' => 2],      //player
            ['title' => 'Gosto de sair vitorioso de circunstâncias difíceis.', 'method_id' => 2],   //achiever
            ['title' => 'O bem-estar dos outros é importante para mim.', 'method_id' => 2],         // filantropo
            ['title' => 'Se a recompensa for suficiente, eu farei o esforço.', 'method_id' => 2],   //player
            ['title' => 'Não gosto de seguir regras.', 'method_id' => 2],                           //disruptor
            ['title' => 'É importante para mim seguir meu próprio caminho.', 'method_id' => 2],     //free spirit
        ];

        foreach ($hexadQuestions as $question) {
            Question::create($question);
        }
    }
}
