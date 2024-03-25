<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AnswerOption;
use App\Models\Method;
use App\Models\Question;
use App\Models\TestClass;
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

        Method::factory()->create([
           'name' => 'Bartle'
        ]);

        $this->call([
            QuestionSeeder::class,
            GroupSeeder::class,
            AnswerOptionSeeder::class,
        ]);
    }
}
