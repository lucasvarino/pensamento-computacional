<x-filament::page>
    <div class="space-y-4">        
        <p class="text-gray-500">
            Bem-vindo ao guia para professores. Aqui você encontrará informações detalhadas sobre como utilizar a plataforma
            e tirar o máximo proveito dos recursos disponíveis aqui!
        </p>

        <x-filament::section id="painel">
            <x-slot name="heading">Entendendo o Painel</x-slot>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-4">
                <div class="rounded-lg shadow-lg overflow-hidden border-gray-200">
                    <img src="{{ asset('img/Painel.png') }}" alt="Feature Image">
                    <img src="{{ asset('img/PainelMetodos.png') }}" alt="Feature Image">
                    <img src="{{ asset('img/PainelAjuda.png') }}" alt="Feature Image">
                </div>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-bars-3 class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900">Barra Lateral</h2>
                    </div>
                    <p class="text-gray-600">
                        Com a Barra Lateral, você poderá acessar todos os recursos disponíveis, como o Painel, suas Turmas, os Métodos Disponíveis e o Guia do Professor!
                    </p>
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-archive-box class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900">Turmas</h2>
                    </div>
                    <p class="text-gray-600">
                        Na pagina Turmas você terá acesso a uma visão geral das suas Turmas.
                    </p>
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-finger-print class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900">Métodos</h2>
                    </div>
                    <p class="text-gray-600">
                        Você poderá entender como funcionam os métodos disponíveis!
                    </p>
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-information-circle class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900">Ajuda e Suporte</h2>
                    </div>
                    <p class="text-gray-600">
                        Você poderá entender como funcionam os Recursos disponíveis!
                    </p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-4">
                <div class="rounded-lg shadow-lg overflow-hidden border-gray-200">
                    <img src="{{ asset('img/Perfil.png') }}" alt="Perfil Image" class="w-full h-auto">
                </div>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-user-circle class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900">Seu Perfil</h2>
                    </div>
                    <p class="text-gray-600">
                        Clicando no cando superior direito do painel, você verá algumas informações do seu perfil, como seu nome e o tema da página, além de poder fazer o logout.
                    </p>
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-bell class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900">Notificações</h2>
                    </div>
                    <p class="text-gray-600">
                        As notificações irão aparecer quando você realizar algumas ações ou quando um aluno responder o seu questionário!
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-4">
                <div class="rounded-lg shadow-lg overflow-hidden border-gray-200">
                    <img src="{{ asset('img/AccountTeacherOverview.png') }}" alt="Feature Image">
                </div>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-presentation-chart-bar class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900">Visão geral</h2>
                    </div>
                    <p class="text-gray-600">
                        Esses cards mostram suas métricas gerais, como o número de Turmas, o total de testes que foram respondidos pelos seus alunos e os últimos alunos que enviaram o teste!
                    </p>
                </div>
            </div>

        </x-filament::section>

        <x-filament::section id="turmas">
            <x-slot name="heading">Entendendo as Turmas</x-slot>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-4">
                <div class="rounded-lg shadow-lg overflow-hidden border-gray-200">
                    <img src="{{ asset('img/Turmas.png') }}" alt="Feature Image">
                </div>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-bars-4 class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900">Listagem de Turmas</h2>
                    </div>
                    <p class="text-gray-600">
                        Para um controle maior, na página de Turmas você terá uma tabela mostrando todas as suas turmas, as respectivas instituições e Médotos utilizados.
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-4">
                <div class="rounded-lg shadow-lg overflow-hidden border-gray-200">
                    <img src="{{ asset('img/CreateTurma.png') }}" alt="Feature Image">
                </div>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-plus-circle class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900">Criando uma Turma</h2>
                    </div>
                    <p class="text-gray-600">
                        Para cadastrar sua turma, você precisa nomeá-la, indicar a instituição, o Método que você quer utilizar e a data de Expiração, se necessário. Além disso, você precisa aceitar o <a href="">termo de consentimento de dados</a>.
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-4">
                <div class="rounded-lg shadow-lg overflow-hidden border-gray-200">
                    <img src="{{ asset('img/TurmaOption.png') }}" alt="Feature Image">
                </div>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-ellipsis-horizontal-circle class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900">Opções da Turma</h2>
                    </div>
                    <p class="text-gray-600">
                        Dentro das opções da Turma, você poderá escolher um dos recursos disponíveis para utilizar, seja copiar o link do teste, Abrir o teste, Editar e Apagar a turma.
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-4">
                <div class="rounded-lg shadow-lg overflow-hidden border-gray-200">
                    <img src="{{ asset('img/TurmaChart.png') }}" alt="Feature Image">
                    <img src="{{ asset('img/TurmaStatsOverview.png') }}" alt="Feature Image">
                    <img src="{{ asset('img/TurmaTable.png') }}" alt="Feature Image">
                </div>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-presentation-chart-line class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900">Resultados Gerais da Turma</h2>
                    </div>
                    <p class="text-gray-600">
                        Ao clicar na turma, você será redirecionado para o resultados Gerais da sua turma, onde você terá acesso a todos os resultados do seu teste, como um gráfico geral da turma, a média de todos os resultados e uma tabela de todos os alunos dessa turma que responderam.
                    </p>
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-chart-bar class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900">Gráfico dos resultados gerais</h2>
                    </div>
                    <p class="text-gray-600">
                        O gráfico mostra o reasultado das médias dos resultados gerados pelos alunos que responderam ao questionário
                    </p>
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-numbered-list class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900">Número de responstas</h2>
                    </div>
                    <p class="text-gray-600">
                        Os cards mostram o número de respostas dos alunos, e a porcentagem da média de cada Perfil dos alunos que responderam.
                    </p>
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-rectangle-stack class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900">Tabela com os alunos que responderam</h2>
                    </div>
                    <p class="text-gray-600">
                        Tabela com o nome e a idade de cada resposta.
                    </p>
                </div>
            </div>
        </x-filament::section>

        <x-filament::section id="metodos">
            <x-slot name="heading">Entendendo os Métodos</x-slot>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-4">
                <div class="rounded-lg shadow-lg overflow-hidden border-gray-200">
                    <img src="{{ asset('img/MetodosDisponiveis.png') }}" alt="Feature Image" class="w-full h-auto">
                </div>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-information-circle class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900">Métodos</h2>
                    </div>
                    <p class="text-gray-600">
                       Para entender mais sobre os métodos, acesse a página de cada método na Barra Lateral em "Métodos Disponíveis"
                    </p>
                </div>
            </div>
        </x-filament::section>

    </div>
</x-filament::page>
