<script>
    document.addEventListener('DOMContentLoaded', () => {
        const links = Array.from(document.querySelectorAll('#scrollspy-nav .scroll-link'));
        const sections = Array.from(document.querySelectorAll('section[id][data-link-highlight]'));

        // TODO: atualize esta lista se adicionar mais bg/text classes no futuro
        const highlightClasses = [
            'bg-socializador', 'bg-espirito-livre', 'bg-conquistador', 'bg-filantropo', 'bg-jogador', 'bg-disruptor',  'bg-gray-400',
            'text-socializador-txt', 'text-espirito-livre-txt', 'text-conquistador-txt', 'text-filantropo-txt', 'text-jogador-txt', 'text-disruptor-txt',
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
        <!-- Você já se perguntou por que algumas estratégias de engajamento funcionam espetacularmente com certas pessoas, enquanto outras as ignoram completamente? A resposta pode estar no perfil de jogador de cada um. -->

        O Teste de Bartle, uma célebre ferramenta de análise de comportamento, é a chave para entendermos as motivações
        intrínsecas das pessoas em ambientes interativos.
        Criado por Richard Bartle ao observar participantes em sistemas multi-usuário, o teste nos ajuda a compreender
        pelo que as pessoas se engajam.

        <!-- Ele classifica os usuários em quatro perfis principais com base em suas preferências. Conhecer esses perfis é crucial para desenhar sistemas de gamificação eficazes, seja para colaboradores, clientes ou alunos, garantindo que suas estratégias conversem diretamente com o que os motiva.

        Vamos mergulhar nesses perfis e descobrir como aplicá-los para potencializar seus projetos de gamificação. -->
    </p>
    
    <nav id="scrollspy-nav" class="sticky z-50 top-0">
        <div id="nav-inner" class="justify-items-center {{-- mt-12 p-4 --}}">
            <div class="w-auto flex-col text-center text-sm font-semibold p-4 rounded-2xl bg-gray-100 dark:bg-gray-800">
                <a href="#introducao" class="scroll-link px-3 py-1 mx-1 rounded-2xl">Introdução</a>
                <a href="#socializadores" class="scroll-link px-3 py-1 mx-1 rounded-2xl">Socializador</a>
                <a href="#espirito-livre" class="scroll-link px-3 py-1 mx-1 rounded-2xl">Espírito Livre</a>
                <a href="#conquistadores" class="scroll-link px-3 py-1 mx-1 rounded-2xl">Conquistador</a>
                <a href="#filantropos" class="scroll-link px-3 py-1 mx-1 rounded-2xl">Filantropo</a>
                <a href="#jogadores" class="scroll-link px-3 py-1 mx-1 rounded-2xl">Jogador</a>
                <a href="#disruptores" class="scroll-link px-3 py-1 mx-1 rounded-2xl">Disruptor</a>
                <a href="#referencias" class="scroll-link px-3 py-1 mx-1 rounded-2xl">Referências</a>
            </div>
        </div>
    </nav>

    <div class="space-y-6">

        <section id="introducao" class="scroll-mt-15" data-link-highlight="bg-gray-400 text-gray-800">

            <x-filament::section>
                <x-slot name="heading">O Que é o Teste Hexad?</x-slot>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-4">
                    <div class="overflow-hidden border-gray-200 rounded-lg shadow-lg">
                        <img src="{{ asset('img/andrej.png') }}" alt="Andrezj" class="w-full h-auto">
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
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-4">
                    <div class="overflow-hidden border-gray-200 rounded-lg shadow-lg">
                        <img src="{{ asset('img/hexad.png') }}" alt="HEXAD" class="w-full h-auto">
                    </div>
                    <div class="space-y-4">
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
                    </div>
                </div>
            </x-filament::section>

        </section>


        <x-filament::card>
            <header class="text-center">
                <h1 class="text-3xl font-bold">Os Seis Arquétipos de Jogadores</h1>
            </header>
        </x-filament::card>

        <section id="socializadores" class="scroll-mt-15" data-link-highlight="bg-socializador text-socializador-txt">

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

        <section id="espirito-livre" class="scroll-mt-15" data-link-highlight="bg-espirito-livre text-espirito-livre-txt">

            <div
                class="relative bg-espirito-livre rounded-2xl shadow-lg overflow-hidden mb-6
            h-auto py-8 sm:py-0">

                {{-- <div class="ml-48 absolute bottom-0 flex justify-center h-full w-full z-0">
                    <svg class="hidden sm:block absolute" width="256" height="256" viewBox="0 0 256 256"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="128" cy="150" r="120" fill="#088675" />
                        <circle cx="128" cy="150" r="90" fill="#1bcba3" />
                        <circle cx="128" cy="150" r="60" fill="#7df2ca" />
                        <circle cx="128" cy="150" r="30" fill="#98ffdc" />
                    </svg>
                    <div class="hidden sm:block absolute bottom-0">
                        <x-icon name="lamparina" class="w-16 h-16" />
                    </div>
                </div> --}}

                <div class="absolute bottom-0 left-0
                sm:w-40 sm:h-40 flex items-center justify-center">
                    <svg class="block sm:hidden absolute" width="256" height="256" viewBox="0 0 256 256"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="128" cy="128" r="128" fill="#088675" />
                        <circle cx="128" cy="128" r="96" fill="#1bcba3" />
                        <circle cx="128" cy="128" r="64" fill="#7df2ca" />
                        <circle cx="128" cy="128" r="32" fill="#98ffdc" />
                    </svg>
                </div>

                <div
                    class="absolute left-0 top-1/2 transform -translate-y-1/2 w-40 h-40 flex items-center justify-center">
                    <x-icon name="borboleta" class="hidden sm:block w-24 h-24" />
                </div>

                <div
                    class="relative flex flex-col items-center text-center h-full
            justify-center px-4 py-0">
                    <img src="{{ asset('img/borboleta.png') }}" alt="Borboleta" class="block sm:hidden w-20 h-20" />
                    <h3 class="m-2 text-xl sm:text-3xl font-bold text-espirito-livre-txt uppercase w-full">
                        ESPÍRITO LIVRE
                    </h3>
                    <div class="font-semibold text-espirito-livre-txt w-full sm:px-32">
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
        <section id="conquistadores" class="scroll-mt-15" data-link-highlight="bg-conquistador text-conquistador-txt">

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
                        CONQUISTADOR
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
        <section id="filantropos" class="scroll-mt-15" data-link-highlight="bg-filantropo text-filantropo-txt">

            <div
                class="relative bg-filantropo rounded-2xl shadow-lg overflow-hidden mb-6
            h-auto py-8 sm:py-0">

                <svg class="hidden sm:block absolute -left-16 sm:-left-0 top-1/2 transform -translate-y-1/2"
                    width="256" height="256" viewBox="50 0 256 256" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="128" cy="128" r="128" fill="#1f7d35" />
                    <circle cx="128" cy="128" r="96" fill="#0fa156" />
                    <circle cx="128" cy="128" r="64" fill="#4ad277" />
                    <circle cx="128" cy="128" r="32" fill="#9af097" />
                </svg>


                <div
                    class="absolute top-1/2 transform -translate-y-1/2
  sm:w-40 sm:h-40 flex items-center justify-center">
                    <svg class="bock sm:hidden absolute" width="256" height="256" viewBox="0 0 256 256"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="128" cy="128" r="128" fill="#1f7d35" />
                        <circle cx="128" cy="128" r="96" fill="#0fa156" />
                        <circle cx="128" cy="128" r="64" fill="#4ad277" />
                        <circle cx="128" cy="128" r="32" fill="#9af097" />
                    </svg>
                    <x-icon name="filantropo" class="hidden sm:block w-24 h-24" />
                </div>


                <div
                    class="relative flex flex-col items-center text-center h-full
            justify-center px-4 py-0">

                    <img src="{{ asset('img/filantropo.png') }}" alt="Filantropo"
                        class="block sm:hidden w-20 h-20" />
                    <h3 class="m-2 text-xl sm:text-3xl font-bold text-filantropo-txt uppercase w-full">
                        FILANTROPO
                    </h3>
                    <div class="font-semibold text-filantropo-txt w-full sm:px-32">
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

        <section id="jogadores" class="scroll-mt-15" data-link-highlight="bg-jogador text-jogador-txt">
            <div
                class="relative bg-jogador rounded-2xl shadow-lg overflow-hidden mb-6
            h-auto py-8 sm:py-0">
                <div
                    class="absolute left-0 top-1/2 transform -translate-y-1/2 w-40 h-40 flex items-center justify-center">
                    <x-icon name="botoes" class="hidden sm:block w-24 h-24" />
                </div>

                <div class="absolute bottom-0 flex justify-center h-full w-full z-0">
                    <svg class="hidden sm:block absolute" width="256" height="256" viewBox="0 0 256 256"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="128" cy="150" r="108" fill="#6242b4" />
                        <circle cx="128" cy="150" r="72" fill="#5335a4" />
                        <circle cx="128" cy="150" r="36" fill="#472997" />
                    </svg>
                    <div class="hidden sm:block absolute bottom-0">
                        <x-icon name="manete" class="w-16 h-16" />
                    </div>
                </div>

                <div
                    class="absolute bottom-0 right-0
                sm:w-40 sm:h-40 flex items-center justify-center">
                    <svg class="block sm:hidden absolute" width="256" height="256" viewBox="0 0 256 256"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="128" cy="128" r="108" fill="#6242b4" />
                        <circle cx="128" cy="128" r="72" fill="#5335a4" />
                        <circle cx="128" cy="128" r="36" fill="#472997" />
                    </svg>
                </div>

                <div
                    class="relative flex flex-col items-center text-center h-full
            justify-center px-4 py-0">
                    <img src="{{ asset('img/botoes.png') }}" alt="Botões" class="block sm:hidden w-20 h-20" />
                    <h3 class="m-2 text-xl sm:text-3xl font-bold text-jogador-txt uppercase w-full">
                        JOGADOR
                    </h3>
                    <div class="font-semibold text-jogador-txt w-full sm:px-32">
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
        <section id="disruptores" class="scroll-mt-15" data-link-highlight="bg-disruptor text-disruptor-txt">
            <div
                class="relative bg-disruptor rounded-2xl shadow-lg overflow-hidden mb-6
            h-auto py-8 sm:py-0">
                <svg class="hidden sm:block absolute -left-16 sm:-left-0 top-1/2 transform -translate-y-1/2"
                    width="256" height="256" viewBox="50 0 256 256" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="128" cy="128" r="128" fill="#973459" />
                    <circle cx="128" cy="128" r="96" fill="#a23967" />
                    <circle cx="128" cy="128" r="64" fill="#bd4984" />
                    <circle cx="128" cy="128" r="32" fill="#ce599b" />
                </svg>


                <div
                    class="absolute top-1/2 transform -translate-y-1/2
  sm:w-40 sm:h-40 flex items-center justify-center">
                    <svg class="block sm:hidden absolute" width="256" height="256" viewBox="0 0 256 256"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="128" cy="128" r="128" fill="#ce599b" />
                        <circle cx="128" cy="128" r="96" fill="#bd4984" />
                        <circle cx="128" cy="128" r="64" fill="#a23967" />
                        <circle cx="128" cy="128" r="32" fill="#973459" />
                    </svg>
                    <x-icon name="bomba" class="hidden sm:block w-20 h-20 sm:left-0" />
                </div>
                <div
                    class="relative flex flex-col items-center text-center h-full
            justify-center px-4 py-0">
                    <img src="{{ asset('img/bomba.png') }}" alt="Mãos dadas" class="block sm:hidden w-20 h-20" />
                    <h3 class="m-2 text-xl sm:text-3xl font-bold text-disruptor-txt uppercase w-full">
                        DISRUPTOR
                    </h3>
                    <div class="font-semibold text-disruptor-txt w-full sm:px-32">
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
