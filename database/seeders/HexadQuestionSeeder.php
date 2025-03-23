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
            ['title' => 'Fico feliz se puder ajudar os outros.', 'method_id' => 2],
            ['title' => 'O bem-estar dos outros é importante para mim.', 'method_id' => 2],
            ['title' => 'Gosto de fazer parte de uma equipe.', 'method_id' => 2],
            ['title' => 'Eu gosto de atividades em grupo.', 'method_id' => 2],
            ['title' => 'É importante para mim seguir meu próprio caminho.', 'method_id' => 2],
            ['title' => 'Ser independente é importante para mim.', 'method_id' => 2],
            ['title' => 'Gosto de dominar tarefas difíceis.', 'method_id' => 2],
            ['title' => 'Gosto de sair vitorioso de circunstâncias difíceis.', 'method_id' => 2],
            ['title' => 'Eu me vejo como um rebelde.', 'method_id' => 2],
            ['title' => 'Não gosto de seguir regras.', 'method_id' => 2],
            ['title' => 'Recompensas são uma ótima maneira de me motivar.', 'method_id' => 2],
            ['title' => 'Se a recompensa for suficiente, eu farei o esforço.', 'method_id' => 2],
        ];

        foreach ($hexadQuestions as $question) {
            Question::create($question);
        }
    }
}
