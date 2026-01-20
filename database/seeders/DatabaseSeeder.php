<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Method;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Method::factory()->createMany([
            ['name' => 'Bartle'],
            ['name' => 'Hexad'],
        ]);
        
        $this->call([
            QuestionSeeder::class,
            GroupSeeder::class,
            AnswerOptionSeeder::class,
            //AnswerSeeder::class,
            //BartleResultSeeder::class,
            
            HexadQuestionSeeder::class,
            HexadGroupSeeder::class,
            HexadQuestionGroupSeeder::class,
            // HexadAnswerSeeder::class,

            // EGameFlowMethodSeeder::class,

            StateSeeder::class
            
        ]);
    }
}