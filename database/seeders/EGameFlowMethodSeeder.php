<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Method;


class EGameFlowMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Method::factory()->createMany([
            ['name' => 'eGameFlow']
        ]);
        
        $this->call([
        EGameFlowQuestionSeeder::class,
        EGameFlowGroupSeeder::class,
        EGameFlowQuestionGroupSeeder::class,
        ]);
    }
}
