<x-filament::page>
    <div class="space-y-4">        
        <p class="text-gray-500">
            Bem-vindo ao guia para Administradores. Aqui você encontrará informações detalhadas sobre como utilizar a plataforma
            e tirar o máximo proveito dos recursos disponíveis como admin! Esse guia serve para complementar o conteúdo do Guia para Professores, então leia-o antes de ler esse.
        </p>

        <x-filament::section id="painel">
            <x-slot name="heading">Novo Painel Personalizado</x-slot>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-4">
                <div class="rounded-lg shadow-lg overflow-hidden border-gray-200">
                    <img src="{{ asset('img/AdminPainel.png') }}" alt="Admin Painel Image">
                </div>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-presentation-chart-bar class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-200">Visão geral (Para Administradores!)</h2>
                    </div>
                    <p class="text-gray-600">
                        Esses cards mostram algumas métricas da plataforma, como o total de usuários, o número de cada teste que foi realizado, e os últimos usuários que foram verificados! Isso serve para ter um controle maior do que está acontecendo no sistema.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-4">
                <div class="rounded-lg shadow-lg overflow-hidden border-gray-200">
                    <img src="{{ asset('img/AdminBarraLateral.png') }}" alt="Feature Image" class="w-full h-auto">
                </div>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-bars-3 class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-200">Barra Lateral</h2>
                    </div>
                    <p class="text-gray-600">
                        Um novo Recurso é adicionado na Barra Lateral dos administradores, o recurso de Usuários, para controlar a verificação e analisar os usuários da plataforma.
                    </p>
                </div>
            </div>
        </x-filament::section>

        <x-filament::section id="turmas">
            <x-slot name="heading">Entendendo a Tabela de Usuários</x-slot>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-4">
                <div class="rounded-lg shadow-lg overflow-hidden border-gray-200">
                    <img src="{{ asset('img/UserTable.png') }}" alt="Feature Image">
                    <img src="{{ asset('img/DeleteUserOption.png') }}" alt="Feature Image">
                </div>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-bars-4 class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-200">Listagem de Usuários</h2>
                    </div>
                    <p class="text-gray-600">
                        Para um controle maior, na página de Turmas você terá uma tabela mostrando todas os Usuários, estejam eles Aprovados ou não Aprovados e sejam eles Administradores ou não administradores.
                    </p>
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-ellipsis-horizontal-circle class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-200">Opções do Usuário</h2>
                    </div>
                    <p class="text-gray-600">
                        Os Administradores têm três opções quando um Usuário faz o login na plataforma: Aprovar o Usuário, Deletar o Usuário, transformá-lo em um Administrador.
                    </p>
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-check-circle class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-200">Aprovar Usuário</h2>
                    </div>
                    <p class="text-gray-600">
                        O usuário que for aprovado irá virar um professor, e poderá ter acesso à todas as funcionalidades que a platadorma proporciona para um professor.
                    </p>
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-arrow-path-rounded-square class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-200">Alterar Admin</h2>
                    </div>
                    <p class="text-gray-600">
                        Ao Alterar Admin o usuário que não é Administrador se tornará um, e o mesmo funciona da forma inversa. Obs: só é possível alterar o admin para usuários verificados.
                    </p>
                    <div class="flex items-center space-x-3">
                        <x-heroicon-o-user-minus class="w-6 h-6 text-gray-500" />
                        <h2 class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-200">Deletar Usuário</h2>
                    </div>
                    <p class="text-gray-600">
                        O Usuário é Deletado do Sistema.
                    </p>
                </div>
            </div>
        </x-filament::section>
    </div>
</x-filament::page>
