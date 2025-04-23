<x-filament::page>
    <p class="text-gray-500">
        Descubra seu perfil de jogador e entenda como suas preferências influenciam sua experiência nos jogos.
    </p>

    <div class="space-y-6">
        {{-- Cabeçalho em um Card --}}
        <x-filament::card>
            <header class="text-center">
                <h1 class="text-3xl font-bold">Teste de Bartle</h1>
                <x-filament::widget name="account-overview" />
            </header>
        </x-filament::card>

        {{-- Seção: O que é o Teste de Bartle? --}}
        <x-filament::section>
            <x-filament::card class="p-6">
                <h2 class="text-2xl font-semibold mb-4">O que é o Teste de Bartle?</h2>
                <p class="text-gray-700">
                    O Teste de Bartle foi desenvolvido para classificar os jogadores de acordo com seu estilo de jogo. Ele identifica quatro perfis principais:
                </p>
                <ul class="list-disc pl-5 mt-4 text-gray-700">
                    <li><strong>Achiever (Realizador):</strong> Focado em acumular pontos, conquistas e troféus.</li>
                    <li><strong>Explorer (Explorador):</strong> Gosta de descobrir todos os segredos e detalhes do jogo.</li>
                    <li><strong>Socializer (Socializador):</strong> Valoriza a interação e a cooperação com outros jogadores.</li>
                    <li><strong>Killer (Competitivo):</strong> Busca a competição e a superação dos adversários.</li>
                </ul>
            </x-filament::card>
        </x-filament::section>

        {{-- Callout informativo usando um elemento de alerta --}}
        <x-filament::card>
                <p>
                    Conhecer seu perfil pode ajudar a escolher jogos mais adequados ao seu estilo, além de oferecer dicas personalizadas para melhorar sua performance.
                </p>
        </x-filament::card>

        {{-- Seção: Benefícios do Teste --}}
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

        {{-- Seção: Como Funciona? --}}
        <x-filament::section>
            <x-filament::card class="p-6">
                <h2 class="text-2xl font-semibold mb-4">Como Funciona?</h2>
                <p class="text-gray-700">
                    O teste é composto por uma série de perguntas sobre suas preferências e comportamentos durante o jogo. Com base nas suas respostas, o sistema classifica seu perfil e apresenta um relatório com dicas personalizadas.
                </p>
            </x-filament::card>
        </x-filament::section>

        {{-- Chamada para ação --}}
        <x-filament::card class="text-center">
            <div class="mt-4">
                <x-filament::button tag="a" color="primary" href="{{ route('filament.admin.pages.bartle') }}">
                    Fazer o Teste
                </x-filament::button>
            </div>
        </x-filament::card>
    </div>
</x-filament::page>
