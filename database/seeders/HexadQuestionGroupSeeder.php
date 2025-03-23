<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HexadQuestionGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $associacoes = [
            ['question_id' => 26, 'group_id' => 5, 'method_id' => 2],
            ['question_id' => 27, 'group_id' => 5, 'method_id' => 2],
        
            ['question_id' => 28, 'group_id' => 6, 'method_id' => 2],
            ['question_id' => 29, 'group_id' => 6, 'method_id' => 2],
        
            ['question_id' => 30, 'group_id' => 7, 'method_id' => 2],
            ['question_id' => 31, 'group_id' => 7, 'method_id' => 2],
        
            ['question_id' => 32, 'group_id' => 8, 'method_id' => 2],
            ['question_id' => 33, 'group_id' => 8, 'method_id' => 2],
        
            ['question_id' => 34, 'group_id' => 9, 'method_id' => 2],
            ['question_id' => 35, 'group_id' => 9, 'method_id' => 2],
        
            ['question_id' => 36, 'group_id' => 10, 'method_id' => 2],
            ['question_id' => 37, 'group_id' => 10, 'method_id' => 2],
        ];

        DB::table('hexad_question_groups')->insert($associacoes);
    }
}
