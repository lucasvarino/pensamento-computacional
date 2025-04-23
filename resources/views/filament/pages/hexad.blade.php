<x-filament::page>
    <p class="text-gray-500">
    Projetar um sistema que funcione para todos não é uma tarefa simples. É mais como tentar montar um quebra-cabeça enquanto as peças continuam mudando de forma. 
    Mas é exatamente isso que torna o processo interessante, não é? O Método Hexad nos dá um bom ponto de partida ao identificar seis tipos principais de usuários: Jogadores, Conquistadores, 
    Socializadores, Espíritos Livres, Filantropos e Disruptores.
    </p>

    <div class="space-y-6">
        {{-- Cabeçalho em um Card --}}
        <x-filament::card>
            <header class="text-center">
                <h2 class="text-2xl font-bold">HEXAD: Uma Estrutura de Tipos de Jogadores para Design de Gamificação</h2>
            </header>
        </x-filament::card>

        <x-filament::section id="metodos">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-4">
                <div class="rounded-lg shadow-lg overflow-hidden border-gray-200">
                    <img src="{{ asset('img/HexadChart.png') }}" alt="Feature Image" class="w-full h-auto">
                </div>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-information-circle class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900">O modelo HEXAD descreve seis tipos de usuários (em um nível básico). Existem quatro tipos intrínsecos principais: Explorador, Socializador,
                     Filantropo e Espírito Livre. Eles são motivados por Relacionamento, Autonomia, Maestria e Propósito (RAMP).
                     Os outros dois tipos, cujas motivações são um pouco menos claras, são Disruptor e Jogador.</h2>
                    </div>
                    <p class="text-gray-600">
                    </p>
                </div>
            </div>
        </x-filament::section>

        <x-filament::section>
            <x-filament::card class="p-6">
                <h2 class="text-2xl font-semibold mb-4">O que é o Teste HEXAD?</h2>
                <p class="text-gray-700">
                    O Teste HEXAD foi desenvolvido para classificar os jogadores de acordo com seu estilo de jogo. Ele identifica seis perfis principais:
                </p>
                <ul class="list-disc pl-5 mt-4 text-gray-700">
                    <li><strong>Jogadores:</strong>Lorem ipsum dolor sit amet consectetur.</li>
                    <li><strong>Conquistadores:</strong>Lorem ipsum dolor sit amet consectetur. </li>
                    <li><strong>Socializadores:</strong>Lorem ipsum dolor sit amet consectetur. </li>
                    <li><strong>Espíritos Livres:</strong>Lorem ipsum dolor sit amet consectetur. </li>
                    <li><strong>Filantropos:</strong>Lorem ipsum dolor sit amet consectetur. </li>
                    <li><strong>Disruptores:</strong>Lorem ipsum dolor sit amet consectetur. </li>
                </ul>
            </x-filament::card>
        </x-filament::section>

        {{-- Callout informativo usando um elemento de alerta --}}
        <x-filament::card>
                <p>
                    Conhecer seu perfil pode ajudar a escolher jogos mais adequados ao seu estilo, além de oferecer dicas personalizadas para melhorar sua performance.
                </p>
        </x-filament::card>

        <x-filament::section>
            <x-filament::card class="p-6">
                <h2 class="text-2xl font-semibold mb-4">Benefícios do Teste</h2>
                <ul class="list-disc pl-5 text-gray-700">
                    <li>Descobrir seu perfil de jogador.</li>
                    <li>Selecionar jogos compatíveis com seu estilo.</li>
                    <li>Receber dicas para aprimorar sua experiência de jogo.</li>
                    <li>Entender melhor seus pontos fortes e áreas para desenvolvimento.</li>
                </ul>
            </x-filament::card>
        </x-filament::section>

        <x-filament::section>
            <x-filament::card class="p-6">
                <h2 class="text-2xl font-semibold mb-4">Como Funciona?</h2>
                <p class="text-gray-700">
                    O teste é composto por uma série de perguntas sobre suas preferências e comportamentos durante o jogo. Com base nas suas respostas, o sistema classifica seu perfil e apresenta um relatório com dicas personalizadas.
                </p>
            </x-filament::card>
        </x-filament::section>
    </div>
</x-filament::page>
