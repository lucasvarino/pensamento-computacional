<?php

namespace Database\Seeders;

use App\Models\BartleResult;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BartleResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BartleResult::factory(5)->create();
    }
}
