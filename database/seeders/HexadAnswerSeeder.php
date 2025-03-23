<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HexadAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $likertScale = [1, 2, 3, 4, 5, 6, 7];

        $hexadQuestions = DB::table('hexad_question_groups')->get();

        $users = DB::table('answers')->pluck('id');

        $answers = [];

        foreach ($users as $userId) {
            foreach ($hexadQuestions as $question) {
                $randomValue = $likertScale[array_rand($likertScale)];

                $answers[] = [
                    'answer_id' => $userId,
                    'question_id' => $question->question_id,
                    'group_id' => $question->group_id,
                    'value' => $randomValue,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }

        DB::table('hexad_answers')->insert($answers);
    }
}
