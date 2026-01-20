<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class EGameFlowQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eGameFlowQuestions = [
            /*
                * CX - Concentração, 
                * DX - Desafios, 
                * OX - Autonomia, 
                * BX - Objetivos, 
                * FX - Feedback
                * IX - Imersão, 
                * TX - Interação Social
                * MX - Melhoria de Conhecimento

                * PRIMEIRA QUESTÃO DO FLOW Q38
            */
            
            ['title' => /*38 C1*/'A maioria das atividades do jogo é relevante para o objetivo de aprendizagem.', 'method_id' => 3],
            ['title' => /*39 T10*/'A cooperação no jogo é útil para o aprendizado.', 'method_id' => 3],
            ['title' => /*40 B3*/'Os objetivos intermediários foram apresentados no início de cada cena (ou fase).', 'method_id' => 3],
            ['title' => /*41 I1*/'Eu perco a noção do tempo enquanto jogo.', 'method_id' => 3],
            ['title' => /*42 C5*/'Não sou sobrecarregado com tarefas que parecem não ter relação (com o objetivo).', 'method_id' => 3],
            ['title' => /*43 C6*/'Não há nenhuma distração nas tarefas.', 'method_id' => 3],
            ['title' => /*44 T13*/'O jogo dá suporte a comunidades fora do jogo.', 'method_id' => 3],
            ['title' => /*45 D1*/'O jogo oferece “dicas” em texto que me ajudam a superar os desafios.', 'method_id' => 3],
            ['title' => /*46 I4*/'Eu tenho uma noção alterada do tempo.', 'method_id' => 3],
            ['title' => /*47 B2*/'Os objetivos gerais do jogo foram apresentados claramente.', 'method_id' => 3],
            ['title' => /*48 D3*/'O jogo oferece auxílios em vídeo ou áudio que me ajudam a superar os desafios.', 'method_id' => 3],
            ['title' => /*49 I6*/'Eu me sinto emocionalmente envolvido(a) com o jogo.', 'method_id' => 3],    
            ['title' => /*50 D6*/'O jogo oferece diferentes níveis de desafio que se adaptam a diferentes jogadores.', 'method_id' => 3],
            ['title' => /*51 O1*/'Sinto que tenho controle e impacto sobre o jogo.', 'method_id' => 3],      
            ['title' => /*52 M1*/'O jogo aumenta meu conhecimento.', 'method_id' => 3],    
            ['title' => /*53 T11*/'O jogo permite a interação social entre os jogadores (chat, etc.).', 'method_id' => 3],    
            ['title' => /*54 M2*/'Eu entendo as ideias básicas do conhecimento ensinado.', 'method_id' => 3],    
            ['title' => /*55 O3*/'Sinto que tenho controle sobre o jogo.', 'method_id' => 3],         
            ['title' => /*56 B1*/'Os objetivos gerais do jogo foram apresentados no início do jogo.', 'method_id' => 3],    
            ['title' => /*57 F3*/'Sou notificado(a) sobre novos eventos imediatamente.', 'method_id' => 3],    
            ['title' => /*58 T8*/'Eu me sinto cooperativo(a) em relação aos outros colegas.', 'method_id' => 3],    
            ['title' => /*59 F1*/'Eu recebo feedback sobre o meu progresso no jogo.', 'method_id' => 3],    
            ['title' => /*60 F5*/'Sou notificado(a) sobre novas tarefas imediatamente.', 'method_id' => 3],    
            ['title' => /*61 I2*/'Não percebo o que acontece ao meu redor enquanto jogo.', 'method_id' => 3],    
            ['title' => /*62 I3*/'Esqueço temporariamente das preocupações do dia a dia enquanto jogo.', 'method_id' => 3],    
            ['title' => /*63 C2*/'A carga de trabalho no jogo é adequada.', 'method_id' => 3],
            ['title' => /*64 M4*/'O jogo motiva o jogador a integrar o conhecimento ensinado.', 'method_id' => 3],    
            ['title' => /*65 D5*/'O jogo oferece novos desafios com um ritmo adequado.', 'method_id' => 3],
            ['title' => /*66 B4*/'Os objetivos intermediários foram apresentados claramente.', 'method_id' => 3],    
            ['title' => /*67 C4*/'Não me distraio das tarefas nas quais o devo estar concentrado.', 'method_id' => 3],
            ['title' => /*68 I5*/'Eu consigo me envolver com o jogo.', 'method_id' => 3],    
            ['title' => /*69 T9*/'Eu colaboro ativamente com os outros colegas.', 'method_id' => 3],    
            ['title' => /*70 C3*/'De modo geral, consigo me manter concentrado no jogo.', 'method_id' => 3],
            ['title' => /*71 M3*/'Eu tento aplicar o conhecimento no jogo.', 'method_id' => 3],    
            ['title' => /*72 F2*/'Eu recebo feedback imediato sobre minhas ações.', 'method_id' => 3],    
            ['title' => /*73 D4*/'A dificuldade dos desafios aumenta conforme minhas habilidades melhoram.', 'method_id' => 3],
            ['title' => /*74 O2*/'Costumo saber qual é o próximo passo no jogo.', 'method_id' => 3],   
            ['title' => /*75 T12*/'O jogo dá suporte a comunidades dentro do próprio jogo.', 'method_id' => 3],    
            ['title' => /*76 I7*/'Eu me sinto visceralmente envolvido(a) com o jogo.', 'method_id' => 3],    
            ['title' => /*77 D2*/'O jogo oferece “suporte online” que me ajuda a superar os desafios.', 'method_id' => 3],                 
            ['title' => /*78 F4*/'Recebo imediatamente informações sobre meu sucesso (ou fracasso) nos objetivos intermediários.', 'method_id' => 3],    
            ['title' => /*79 M5*/'Eu quero saber mais sobre o conhecimento ensinado.', 'method_id' => 3],    

        ];
        
        foreach ($eGameFlowQuestions as $question) {
            Question::create($question);
        }
    }
}
