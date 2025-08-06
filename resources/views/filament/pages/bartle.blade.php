<script>
    document.addEventListener('DOMContentLoaded', () => {
        const links = Array.from(document.querySelectorAll('#scrollspy-nav .scroll-link'));
        const sections = Array.from(document.querySelectorAll('section[id][data-link-highlight]'));

        const highlightClasses = [
            'bg-socializador', 'bg-explorador', 'bg-conquistador', 'bg-assassino', 'bg-gray-400',
            'text-socializador-txt', 'text-explorador-txt', 'text-conquistador-txt', 'text-assassino-txt',
            'text-gray-800', 'text-white'
        ];

        function updateHighlight() {
            links.forEach(a => a.classList.remove(...highlightClasses));

            const midY = window.innerHeight / 2;
            const active = sections.find(sec => {
                const r = sec.getBoundingClientRect();
                return r.top <= midY && r.bottom >= midY;
            });
            if (!active) return;

            const [bgClass, textClass] = active.dataset.linkHighlight.split(' ');
            const selector = `#scrollspy-nav a[href="#${active.id}"]`;
            const link = document.querySelector(selector);
            if (link) link.classList.add(bgClass, textClass);
        }

        document.addEventListener('scroll', () => requestAnimationFrame(updateHighlight));
        updateHighlight();
    });


    document.addEventListener('DOMContentLoaded', () => {
        const nav = document.getElementById('scrollspy-nav');
        const navInner = document.getElementById('nav-inner');

        const rootFontSize = parseFloat(getComputedStyle(document.documentElement).fontSize);
        const offsetPx = rootFontSize * 5;

        function onScroll() {
            const navTop = nav.getBoundingClientRect().top;

            if (navTop <= offsetPx) {
                navInner.classList.add('mt-20');
            } else {
                navInner.classList.remove('mt-20');
            }
        }

        document.addEventListener('scroll', onScroll);
        onScroll();
    });
</script>

<x-filament::page>
    <p class="text-gray-500">
        O Teste de Bartle, uma célebre ferramenta de análise de comportamento, é a chave para entendermos as motivações
        intrínsecas das pessoas em ambientes interativos.
        Criado por Richard Bartle ao observar participantes em sistemas multi-usuário, o teste nos ajuda a compreender
        pelo que as pessoas se engajam.
    </p>

    <nav id="scrollspy-nav" class="sticky z-50 top-0">
        <div id="nav-inner" class="justify-items-center {{-- mt-12 p-4 --}}">
            <div class="w-auto flex-col text-center text-sm font-semibold p-4 rounded-2xl bg-gray-100 dark:bg-gray-800">
                <a href="#introducao" class="scroll-link px-3 py-1 mx-1 rounded-2xl">Introdução</a>
                <a href="#socializador" class="scroll-link px-3 py-1 mx-1 rounded-2xl">Socializador</a>
                <a href="#explorador" class="scroll-link px-3 py-1 mx-1 rounded-2xl">Explorador</a>
                <a href="#empreendedor" class="scroll-link px-3 py-1 mx-1 rounded-2xl">Empreendedor</a>
                <a href="#assassino" class="scroll-link px-3 py-1 mx-1 rounded-2xl">Assassino</a>
                <a href="#referencias" class="scroll-link px-3 py-1 mx-1 rounded-2xl">Referências</a>
            </div>
        </div>
    </nav>

    <div class="space-y-6">

        <section id="introducao" class="scroll-mt-15" data-link-highlight="bg-gray-400 text-gray-800">

            <x-filament::section>
                <x-slot name="heading">O Que é o Teste de Bartle?</x-slot>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-4">
                    <div class="overflow-hidden border-gray-200 rounded-lg shadow-lg">
                        <img src="{{ asset('img/richardBartle.png') }}" alt="Richard Bartle" class="w-full h-auto">
                        <img src="{{ asset('img/bartle.png') }}" alt="Bartle" class="w-full h-auto">
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <x-heroicon-o-archive-box class="w-6 h-6 text-gray-500" />
                            <h2 class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-200">Como surgiu?</h2>
                        </div>
                        <p class="text-gray-600">
                            O Teste de Bartle surgiu da observação de jogadores em MUDs (Multi-User Dungeons), os
                            precursores dos jogos online que conhecemos hoje.
                            Richard Bartle percebeu que os jogadores se envolviam com o jogo de maneiras
                            fundamentalmente
                            diferentes, motivados por objetivos distintos.
                        </p>
                        <div class="flex items-center space-x-3">
                            <x-heroicon-o-finger-print class="w-6 h-6 text-gray-500" />
                            <h2 class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-200">Perfil de Jogador
                            </h2>
                        </div>
                        <p class="text-gray-600">
                            Bartle classifica os usuários em quatro perfis principais com base em suas preferências.
                            Conhecer esses perfis é crucial para desenhar sistemas de gamificação eficazes,
                            seja para colaboradores, clientes ou alunos, garantindo que suas estratégias conversem
                            diretamente com o que os motiva.
                            Vamos mergulhar nesses perfis e descobrir como aplicá-los para potencializar seus projetos
                            de
                            gamificação.
                        </p>
                        <div class="flex items-center space-x-3">
                            <x-heroicon-o-information-circle class="w-6 h-6 text-gray-500" />
                            <h2 class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-200">Observação</h2>
                        </div>
                        <p class="text-gray-600">
                            É importante lembrar que a maioria das pessoas não se encaixa 100% em uma única categoria,
                            mas
                            sim possui uma combinação delas, com uma ou duas sendo mais dominantes.
                        </p>
                        <div class="flex items-center space-x-3">
                            <x-heroicon-o-information-circle class="w-6 h-6 text-gray-500" />
                            <h2 class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-200">Onde é indicado
                                usar?</h2>
                        </div>
                        <p class="text-gray-600">
                            É importante lembrar que a maioria das pessoas não se encaixa 100% em uma única categoria,
                            mas
                            sim possui uma combinação delas, com uma ou duas sendo mais dominantes.
                        </p>
                    </div>
                </div>
            </x-filament::section>

            <x-filament::card>
                <header class="text-center">
                    <h1 class="text-3xl font-bold">Os Quatro Arquétipos de Jogadores</h1>
                </header>
            </x-filament::card>

        </section>


        <section id="socializador" class="scroll-mt-15" data-link-highlight="bg-socializador text-socializador-txt">

            <div
                class="relative bg-socializador rounded-2xl shadow-lg overflow-hidden mb-6
            h-auto py-8 sm:py-0">
                <svg class="absolute -right-40 top-1/2 transform -translate-y-1/2" width="300" height="300"
                    viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="150" cy="150" r="150" fill="#0098e1" />
                    <circle cx="150" cy="150" r="110" fill="#0085c2" />
                    <circle cx="150" cy="150" r="70" fill="#0074a1" />
                </svg>

                <div
                    class="absolute left-0 top-1/2 transform -translate-y-1/2 w-40 h-40 flex items-center justify-center">
                    <x-icon name="maos" class="hidden sm:block w-24 h-24" />
                </div>

                <div class="absolute inset-0 flex items-center justify-end">
                    <x-icon name="megafone" class="hidden sm:block w-16 h-16 transform translate-x-1" />
                </div>

                <div
                    class="relative flex flex-col items-center text-center h-full
                        justify-center px-4 py-0">
                    <img src="{{ asset('img/megafone.png') }}" alt="Espada Sangue Assassino"
                        class="block sm:hidden w-20 h-20" />
                    <h3 class="m-2 text-xl sm:text-3xl font-bold text-socializador-txt uppercase w-full">
                        SOCIALIZADOR
                    </h3>
                    <div class="font-semibold text-socializador-txt w-full sm:px-32">
                        Motivação principal: Interagir com outros Jogadores para construir relacionamentos. <br> <br>

                        Para os Socializadores, o sistema é um palco para a interação humana. O que os engaja de verdade
                        é a
                        oportunidade de conversar, colaborar, ajudar e se conectar com outros participantes. As amizades
                        e o
                        senso de comunidade são a sua maior recompensa.
                        Psicologia por Trás do Perfil: Sua motivação primária é a conexão e o pertencimento. Eles
                        prosperam
                        em ambientes que facilitam a formação de laços sociais e o trabalho em equipe. A validação vem
                        do
                        grupo e da qualidade de suas interações.

                        <br>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <span class="font-bold">COMO SE COMPORTAM NA PRÁTICA:</span> <br>
                                <ul class="py-4 space-y-2">
                                    <li>
                                        A força motriz de um Socializador é o senso de pertencimento. Eles prosperam
                                        quando
                                        se sentem parte de um grupo, uma equipe ou uma comunidade. A validação que eles
                                        buscam é social: ser aceito, valorizado e conectado aos outros.
                                    </li>
                                    <li>
                                        São eles que quebram o gelo. Em uma reunião, plataforma online ou no café da
                                        empresa, eles não hesitam
                                        em iniciar uma conversa, perguntar como foi o final de semana de alguém ou
                                        comentar
                                        sobre um interesse em comum.
                                    </li>

                                    <li>
                                        Diante da escolha entre uma tarefa solo e uma atividade em grupo, o Socializador
                                        quase sempre preferirá a segunda.
                                        Eles sentem mais energia e propósito quando trabalham em conjunto com outros.
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <span class="font-bold">ESTRATÉGIAS DE ENGAJAMENTO:</span> <br>
                                <ul class="py-4 space-y-2">
                                    <li>
                                        Implemente fóruns de discussão que permitem conversas mais profundas e
                                        organizadas
                                        que um chat. É o espaço ideal para os Socializadores compartilharem
                                        experiências,
                                        debaterem ideias e ajudarem uns aos outros de forma mais elaborada, criando um
                                        registro de conhecimento para toda a comunidade.
                                    </li>
                                    <li>
                                        Agrupe usuários em equipes, criando um forte senso de identidade e
                                        pertencimento. Um
                                        Socializador se engaja muito mais defendendo o sucesso de sua "tribo" do que
                                        buscando apenas objetivos individuais.
                                    </li>
                                    <li>
                                        Faça placares, eles transformam a competição em colaboração. Em vez de focar na
                                        posição individual, os Socializadores se unem para levar sua equipe ao topo,
                                        celebrando o esforço coletivo e o orgulho do grupo.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="explorador" class="scroll-mt-15" data-link-highlight="bg-explorador text-explorador-txt">

            <div
                class="relative bg-explorador rounded-2xl shadow-lg overflow-hidden mb-6
            h-auto py-8 sm:py-0">

                <div
                    class="hidden sm:block absolute inset-y-0 left-10
         w-full sm:w-64
         h-full
         bg-gradient-to-l from-transparent to-yellow-300/70
         pointer-events-none
         [clip-path:polygon(100%_0%,0%_50%,100%_100%)]">
                </div>

                <div
                    class="absolute left-0 top-1/2 transform -translate-y-1/2 w-40 h-40 flex items-center justify-center">
                    <x-icon name="lanterna" class="class= hidden sm:block w-20 h-20" />
                </div>
                <x-icon name="tocha" class="hidden sm:block absolute w-20 h-20 top-0 right-0" />




                <div
                    class="relative flex flex-col items-center text-center h-full
            justify-center px-4 py-0">
                    <img src="{{ asset('img/tocha.png') }}" alt="Tocha" class="block sm:hidden w-28 h-28" />
                    <h3 class="m-2 text-xl sm:text-3xl font-bold text-explorador-txt uppercase w-full">
                        EXPLORADOR
                    </h3>
                    <div class="font-semibold text-explorador-txt w-full sm:px-32">
                        Motivação principal: Interagir com o Mundo para descobrir como ele funciona. <br> <br>

                        Os Exploradores são movidos pela curiosidade. O prazer deles não está em vencer, mas em
                        descobrir.
                        Eles querem entender o sistema em profundidade, encontrar atalhos, desvendar recursos escondidos
                        e
                        testar os limites do que é possível fazer.

                        <br>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <span class="font-bold">COMO SE COMPORTAM NA PRÁTICA:</span> <br>
                                <ul class="py-4 space-y-2">
                                    <li>Ao receber acesso a um novo software corporativo, eles clicam em todas as abas,
                                        menus e configurações avançadas "só para ver o que acontece".</li>

                                    <li>Em um programa de onboarding gamificado, eles são os que leem os documentos
                                        extras,
                                        assistem aos vídeos opcionais e encontram links quebrados.</li>

                                    <li>Eles são ótimos para encontrar "brechas" nas regras de uma competição, não para
                                        trapacear, mas pelo desafio intelectual de entender o sistema a fundo.</li>
                                </ul>
                            </div>
                            <div>
                                <span class="font-bold">ESTRATÉGIAS DE ENGAJAMENTO:</span> <br>
                                <ul class="py-4 space-y-2">
                                    <li>
                                        "Easter Eggs": Esconda recursos, piadas internas ou até mesmo medalhas secretas
                                        em
                                        locais inesperados da sua plataforma. Os Exploradores vão adorar a caçada.
                                    </li>
                                    <li>
                                        Conteúdo Desbloqueável: Libere acesso a áreas ou informações extras (como
                                        "making
                                        of" de um projeto ou artigos avançados) para aqueles que demonstrarem um alto
                                        nível
                                        de engajamento.
                                    </li>
                                    <li>
                                        Design Não-Linear: Permita que os usuários completem tarefas em diferentes
                                        ordens ou
                                        escolham seus próprios caminhos de aprendizado.
                                    </li>

                                    <li>
                                        Recompensa por Feedback: Incentive-os e recompense-os por reportar bugs ou dar
                                        sugestões detalhadas de melhoria, transformando-os em valiosos testadores beta.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="empreendedor" class="scroll-mt-15" data-link-highlight="bg-conquistador text-conquistador-txt">

            <div
                class="relative bg-conquistador rounded-2xl shadow-lg overflow-hidden mb-6
            h-auto py-8 sm:py-0">

                <div class="absolute inset-y-0 right-0 flex items-center">
                    <div class="relative h-40 w-40">
                        <svg class="absolute top-1/2 transform -translate-y-1/2 z-0" width="256" height="256"
                            viewBox="10 -10 256 256" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="128" cy="128" r="108" fill="#ffc500" />
                            <circle cx="128" cy="128" r="72" fill="#e8b107" />
                            <circle cx="128" cy="128" r="36" fill="#d4a30b" />
                        </svg>
                        <div class="absolute inset-0 flex items-center justify-end z-10 transform -translate-y-5">
                            <x-icon name="bandeira" class="hidden sm:block h-20 w-20 bg-transparent" />
                        </div>
                    </div>
                </div>

                <div
                    class="absolute left-0 top-1/2 transform -translate-y-1/2
                w-40 h-40 flex items-center justify-center z-10">
                    <x-icon name="medalha" class="hidden sm:block h-24 w-24 bg-transparent" />
                </div>

                <div
                    class="relative flex flex-col items-center text-center h-full
                        justify-center px-4 py-0">
                    <img src="{{ asset('img/bandeira.png') }}" alt="Bandeira" class="block sm:hidden w-20 h-20" />
                    <h3 class="m-2 text-xl sm:text-3xl font-bold text-conquistador-txt uppercase w-full">
                        EMPREENDEDOR
                    </h3>
                    <div class="font-semibold text-conquistador-txt w-full sm:px-32">
                        Motivação principal: Interagir com outros Jogadores para construir relacionamentos. <br> <br>

                        Para os Socializadores, o sistema é um palco para a interação humana. O que os engaja de verdade
                        é a
                        oportunidade de conversar, colaborar, ajudar e se conectar com outros participantes. As amizades
                        e o
                        senso de comunidade são a sua maior recompensa.
                        Psicologia por Trás do Perfil: Sua motivação primária é a conexão e o pertencimento. Eles
                        prosperam
                        em ambientes que facilitam a formação de laços sociais e o trabalho em equipe. A validação vem
                        do
                        grupo e da qualidade de suas interações.

                        <br>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <span class="font-bold">COMO SE COMPORTAM NA PRÁTICA:</span> <br>
                                <ul class="py-4 space-y-2">
                                    <li>
                                        A força motriz de um Socializador é o senso de pertencimento. Eles prosperam
                                        quando
                                        se sentem parte de um grupo, uma equipe ou uma comunidade. A validação que eles
                                        buscam é social: ser aceito, valorizado e conectado aos outros.
                                    </li>
                                    <li>
                                        São eles que quebram o gelo. Em uma reunião, plataforma online ou no café da
                                        empresa, eles não hesitam
                                        em iniciar uma conversa, perguntar como foi o final de semana de alguém ou
                                        comentar
                                        sobre um interesse em comum.
                                    </li>

                                    <li>
                                        Diante da escolha entre uma tarefa solo e uma atividade em grupo, o Socializador
                                        quase sempre preferirá a segunda.
                                        Eles sentem mais energia e propósito quando trabalham em conjunto com outros.
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <span class="font-bold">ESTRATÉGIAS DE ENGAJAMENTO:</span> <br>
                                <ul class="py-4 space-y-2">
                                    <li>
                                        Implemente fóruns de discussão que permitem conversas mais profundas e
                                        organizadas
                                        que um chat. É o espaço ideal para os Socializadores compartilharem
                                        experiências,
                                        debaterem ideias e ajudarem uns aos outros de forma mais elaborada, criando um
                                        registro de conhecimento para toda a comunidade.
                                    </li>
                                    <li>
                                        Agrupe usuários em equipes, criando um forte senso de identidade e
                                        pertencimento. Um
                                        Socializador se engaja muito mais defendendo o sucesso de sua "tribo" do que
                                        buscando apenas objetivos individuais.
                                    </li>
                                    <li>
                                        Faça placares, eles transformam a competição em colaboração. Em vez de focar na
                                        posição individual, os Socializadores se unem para levar sua equipe ao topo,
                                        celebrando o esforço coletivo e o orgulho do grupo.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="assassino" class="scroll-mt-15" data-link-highlight="bg-assassino text-assassino-txt">

            <div
                class="relative bg-assassino rounded-2xl shadow-lg overflow-visible mb-6
            mx-0 h-auto py-8 sm:py-0">

                <div
                    class="absolute left-0 top-1/2 transform -translate-y-1/2
        w-40 h-40 flex items-center justify-center z-10">
                    <x-icon name="espadas" class="hidden sm:block h-20 w-20 text-white" />
                </div>

                <div
                    class="hidden sm:block
        absolute left-0 top-1/2
        transform -translate-y-1/2 -translate-x-full
        z-10 mx-0">
                    <img src="{{ asset('img/espada-dir.png') }}" alt="Espada Sangue Assassino" class="w-32 h-32" />
                </div>

                <div
                    class="hidden sm:block
    absolute right-0 top-1/2
    transform -translate-y-1/2 translate-x-full
    z-10 mx-0">
                    <img src="{{ asset('img/espada-esq.png') }}" alt="Espada Sangue Assassino" class="w-32 h-32" />
                </div>

                <div
                    class="relative flex flex-col items-center text-center h-full
              justify-center px-4 py-0">
                    <img src="{{ asset('img/espadas.png') }}" alt="Espada Sangue Assassino"
                        class="block sm:hidden w-20 h-20" />
                    <h3 class="m-2 text-xl sm:text-3xl font-bold text-assassino-txt uppercase w-full">
                        ASSASSINO
                    </h3>
                    <div class="font-semibold text-assassino-txt w-full sm:px-32">
                        Motivação principal: Interagir com outros Jogadores para construir relacionamentos. <br> <br>

                        Para os Socializadores, o sistema é um palco para a interação humana. O que os engaja de verdade
                        é a
                        oportunidade de conversar, colaborar, ajudar e se conectar com outros participantes. As amizades
                        e o
                        senso de comunidade são a sua maior recompensa.
                        Psicologia por Trás do Perfil: Sua motivação primária é a conexão e o pertencimento. Eles
                        prosperam
                        em ambientes que facilitam a formação de laços sociais e o trabalho em equipe. A validação vem
                        do
                        grupo e da qualidade de suas interações.

                        <br>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <span class="font-bold">COMO SE COMPORTAM NA PRÁTICA:</span> <br>
                                <ul class="py-4 space-y-2">
                                    <li>
                                        A força motriz de um Socializador é o senso de pertencimento. Eles prosperam
                                        quando
                                        se sentem parte de um grupo, uma equipe ou uma comunidade. A validação que eles
                                        buscam é social: ser aceito, valorizado e conectado aos outros.
                                    </li>
                                    <li>
                                        São eles que quebram o gelo. Em uma reunião, plataforma online ou no café da
                                        empresa, eles não hesitam
                                        em iniciar uma conversa, perguntar como foi o final de semana de alguém ou
                                        comentar
                                        sobre um interesse em comum.
                                    </li>

                                    <li>
                                        Diante da escolha entre uma tarefa solo e uma atividade em grupo, o Socializador
                                        quase sempre preferirá a segunda.
                                        Eles sentem mais energia e propósito quando trabalham em conjunto com outros.
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <span class="font-bold">ESTRATÉGIAS DE ENGAJAMENTO:</span> <br>
                                <ul class="py-4 space-y-2">
                                    <li>
                                        Implemente fóruns de discussão que permitem conversas mais profundas e
                                        organizadas
                                        que um chat. É o espaço ideal para os Socializadores compartilharem
                                        experiências,
                                        debaterem ideias e ajudarem uns aos outros de forma mais elaborada, criando um
                                        registro de conhecimento para toda a comunidade.
                                    </li>
                                    <li>
                                        Agrupe usuários em equipes, criando um forte senso de identidade e
                                        pertencimento. Um
                                        Socializador se engaja muito mais defendendo o sucesso de sua "tribo" do que
                                        buscando apenas objetivos individuais.
                                    </li>
                                    <li>
                                        Faça placares, eles transformam a competição em colaboração. Em vez de focar na
                                        posição individual, os Socializadores se unem para levar sua equipe ao topo,
                                        celebrando o esforço coletivo e o orgulho do grupo.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="referencias" class="scroll-mt-15" data-link-highlight="bg-gray-400 text-gray-800">

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
                            <h2 class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-200">Barra Lateral</h2>
                        </div>
                        <p class="text-gray-600">
                            Com a Barra Lateral, você poderá acessar todos os recursos disponíveis, como o Painel, suas
                            Turmas, os Métodos Disponíveis e o Guia do Colaborador!
                        </p>
                        <div class="flex items-center space-x-3">
                            <x-heroicon-o-archive-box class="w-6 h-6 text-gray-500" />
                            <h2 class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-200">Turmas</h2>
                        </div>
                        <p class="text-gray-600">
                            Na pagina Turmas você terá acesso a uma visão geral das suas Turmas.
                        </p>
                        <div class="flex items-center space-x-3">
                            <x-heroicon-o-finger-print class="w-6 h-6 text-gray-500" />
                            <h2 class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-200">Métodos</h2>
                        </div>
                        <p class="text-gray-600">
                            Você poderá entender como funcionam os métodos disponíveis!
                        </p>
                        <div class="flex items-center space-x-3">
                            <x-heroicon-o-information-circle class="w-6 h-6 text-gray-500" />
                            <h2 class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-200">Ajuda e Suporte
                            </h2>
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
                            Clicando no cando superior direito do painel, você verá algumas informações do seu perfil,
                            como
                            seu nome e o tema da página, além de poder fazer o logout.
                        </p>
                        <div class="flex items-center space-x-3">
                            <x-heroicon-o-bell class="w-6 h-6 text-gray-500" />
                            <h2 class="ml-2 text-xl font-semibold text-gray-900">Notificações</h2>
                        </div>
                        <p class="text-gray-600">
                            As notificações irão aparecer quando você realizar algumas ações ou quando um aluno
                            responder o
                            seu questionário!
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
                            Esses cards mostram suas métricas gerais, como o número de Turmas, o total de testes que
                            foram
                            respondidos pelos seus alunos e os últimos alunos que enviaram o teste!
                        </p>
                    </div>
                </div>

            </x-filament::section>

            <x-filament::section id="referencias">
                <x-slot name="heading">Referências</x-slot>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-4">
                    <div class="rounded-lg shadow-lg overflow-hidden border-gray-200">
                        <img src="{{ asset(path: 'img/MetodosDisponiveis.png') }}" alt="Feature Image"
                            class="w-full h-auto">
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <x-heroicon-o-information-circle class="w-6 h-6 text-gray-500" />
                            <h2 class="ml-2 text-xl font-semibold text-gray-900">Métodos</h2>
                        </div>
                        <p class="text-gray-600">
                            Para entender mais sobre os métodos, acesse a página de cada método na Barra Lateral em
                            "Métodos
                            Disponíveis"
                        </p>
                    </div>
                </div>
            </x-filament::section>
        </section>
    </div>
</x-filament::page>
