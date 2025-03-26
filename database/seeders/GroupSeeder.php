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
            'name' => 'Empreendedor',
            'description' => 'Para os Empreendedores o objetivo é ter destaque no jogo em relação aos demais jogadores. Os Empreendedores querem acumular pontos, experiências, subir de níveis ou ganhar recompensas. Tais personagens querem, por fim, obter conquistas e troféus.'
        ]);
        
        Group::factory()->create([
            'name' => 'Explorador',
            'description' => 'Os Exploradores querem ver coisas novas e descobrir novos segredos. Eles não se importam tanto com pontos ou prêmios. Para eles, a descoberta é o prêmio.'
        ]);
        
        Group::factory()->create([
            'name' => 'Assassino',
            'description' => 'Os Assassinos são semelhantes aos Empreendedores na forma como eles se emocionam ao ganhar pontos e status também. O que os diferencia dos Empreendedores é que os Assassinos querem ver outras pessoas perderem. Eles são altamente competitivos, e vencer é o que os motiva. Eles querem ser os melhores no jogo.'
        ]);

        Group::factory()->create([
            'name' => 'Socializador',
            'description' => 'Os Socializadores se divertem em seus jogos por meio de sua interação com outros jogadores. Os Socializadores ficam felizes em colaborar para alcançar coisas maiores e melhores do que conseguiriam sozinhos.'
        ]);

    }
}
