<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::factory()->create([
            'name' => 'Empreendedor'
        ]);

        Group::factory()->create([
            'name' => 'Explorador'
        ]);

        Group::factory()->create([
            'name' => 'Assassino'
        ]);

        Group::factory()->create([
            'name' => 'Socializador'
        ]);

    }
}
