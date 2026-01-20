<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EGameFlowQuestionGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* 
        CX - Concentração, 11
        DX - Desafios, 12
        OX - Autonomia, 13
        BX - Objetivos, 14
        FX - Feedback, 15
        IX - Imersão, 16
        TX - Interação Social, 17
        MX - Melhoria de Conhecimento, 18
         */
        $associacoes = [
            ['question_id' => 38, 'group_id' => 11, 'method_id' => 3],
            ['question_id' => 39, 'group_id' => 17, 'method_id' => 3],
            ['question_id' => 40, 'group_id' => 14, 'method_id' => 3],
            ['question_id' => 41, 'group_id' => 16, 'method_id' => 3],
            ['question_id' => 42, 'group_id' => 11, 'method_id' => 3],
            ['question_id' => 43, 'group_id' => 11, 'method_id' => 3],
            ['question_id' => 44, 'group_id' => 17, 'method_id' => 3],
            ['question_id' => 45, 'group_id' => 12, 'method_id' => 3],  
            ['question_id' => 46, 'group_id' => 16, 'method_id' => 3],           
            ['question_id' => 47, 'group_id' => 14, 'method_id' => 3],   
            ['question_id' => 48, 'group_id' => 12, 'method_id' => 3],
            ['question_id' => 49, 'group_id' => 16, 'method_id' => 3],
            ['question_id' => 50, 'group_id' => 12, 'method_id' => 3],
            ['question_id' => 51, 'group_id' => 13, 'method_id' => 3],
            ['question_id' => 52, 'group_id' => 18, 'method_id' => 3],
            ['question_id' => 53, 'group_id' => 17, 'method_id' => 3],
            ['question_id' => 54, 'group_id' => 18, 'method_id' => 3],
            ['question_id' => 55, 'group_id' => 13, 'method_id' => 3],
            ['question_id' => 56, 'group_id' => 14, 'method_id' => 3],
            ['question_id' => 57, 'group_id' => 15, 'method_id' => 3],
            ['question_id' => 58, 'group_id' => 17, 'method_id' => 3],
            ['question_id' => 59, 'group_id' => 15, 'method_id' => 3],
            ['question_id' => 60, 'group_id' => 15, 'method_id' => 3],
            ['question_id' => 61, 'group_id' => 16, 'method_id' => 3],
            ['question_id' => 62, 'group_id' => 16, 'method_id' => 3],
            ['question_id' => 63, 'group_id' => 11, 'method_id' => 3],
            ['question_id' => 64, 'group_id' => 18, 'method_id' => 3],
            ['question_id' => 65, 'group_id' => 12, 'method_id' => 3],
            ['question_id' => 66, 'group_id' => 14, 'method_id' => 3],
            ['question_id' => 67, 'group_id' => 11, 'method_id' => 3],
            ['question_id' => 68, 'group_id' => 16, 'method_id' => 3],
            ['question_id' => 69, 'group_id' => 17, 'method_id' => 3],
            ['question_id' => 70, 'group_id' => 11, 'method_id' => 3],
            ['question_id' => 71, 'group_id' => 18, 'method_id' => 3],
            ['question_id' => 72, 'group_id' => 15, 'method_id' => 3],
            ['question_id' => 73, 'group_id' => 12, 'method_id' => 3],
            ['question_id' => 74, 'group_id' => 13, 'method_id' => 3],
            ['question_id' => 75, 'group_id' => 17, 'method_id' => 3],
            ['question_id' => 76, 'group_id' => 16, 'method_id' => 3],
            ['question_id' => 77, 'group_id' => 12, 'method_id' => 3],
            ['question_id' => 78, 'group_id' => 15, 'method_id' => 3],
            ['question_id' => 79, 'group_id' => 18, 'method_id' => 3],
        ];

        DB::table('e_game_flow_question_groups')->insert($associacoes);
    }
}
