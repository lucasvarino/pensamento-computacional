<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HexadGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            [
                'name'        => 'Filantropos',
                'description' => 'Motivados pelo seu propósito e senso de realização. Este grupo é altruísta, querendo sempre ajudar outras pessoas e enriquecer a vida delas de alguma forma, sem esperar algo em troca.',
                'method_id'   => 2,
            ],
            [
                'name'        => 'Socializadores',
                'description' => 'Motivados pela conexão. Eles querem interagir com outras pessoas e criar laços sociais.',
                'method_id'   => 2,
            ],
            [
                'name'        => 'Espíritos Livres',
                'description' => 'Motivados pela autonomia. Eles desejam criar e explorar, gostam de ter liberdade para experimentar o mundo ao seu próprio ritmo.',
                'method_id'   => 2,
            ],
            [
                'name'        => 'Conquistador',
                'description' => 'Motivados pela maestria/proficiência/prática/habilidade/expertise. Eles estão procurando aprender coisas novas e se aprimorar. Eles querem desafios a serem superados.',
                'method_id'   => 2,
            ],
            [
                'name'        => 'Disruptores',
                'description' => 'Motivados pela mudança. Em geral, eles querem impactar o sistema, seja diretamente ou através de outros usuários, para forçar mudanças positivas ou negativas.',
                'method_id'   => 2,
            ],
            [
                'name'        => 'Jogadores',
                'description' => 'Motivados pelas recompensas. Costumam ser mais individualistas. Eles farão o que for necessário para coletar recompensas de um sistema, visando somente os ganhos próprios.',
                'method_id'   => 2,
            ],
        ];

        foreach ($groups as $group) {
            Group::create($group);
        }
    }
}
