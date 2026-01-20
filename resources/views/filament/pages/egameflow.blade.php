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
        O Modelo HEXAD é um framework de ponta para a análise de comportamento, servindo como uma evolução direta do Teste de Bartle. Ele é a chave para criar experiências de gamificação mais ricas e personalizadas. Desenvolvido por Andrzej Marczewski, o modelo foi projetado especificamente para o universo da gamificação, nos ajudando a compreender os diferentes tipos de motivações que impulsionam os usuários.
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
                {{-- <a href="#referencias" class="scroll-link px-3 py-1 mx-1 rounded-2xl">Referências</a> --}}
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
                            O Modelo HEXAD surgiu da necessidade de um sistema mais detalhado para aplicar em contextos além dos jogos, 
                            como ambientes corporativos, educacionais e de marketing. Marczewski percebeu que, na gamificação, 
                            as motivações eram mais variadas e expandiu os quatro tipos clássicos para seis perfis de usuários, 
                            focando em motivações intrínsecas e extrínsecas.
                        </p>
                        <div class="flex items-center space-x-3">
                            <x-heroicon-o-information-circle class="w-6 h-6 text-gray-500" />
                            <h2 class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-200">Onde é indicado
                                usar?</h2>
                        </div>
                        <p class="text-gray-600">
                            O modelo HEXAD é ideal para qualquer projeto que busque motivar e engajar pessoas. Suas principais aplicações incluem:

                            Ambientes Corporativos: Em programas de treinamento, engajamento de colaboradores e sistemas de performance.

                            Educação: Na criação de plataformas de aprendizado mais interativas e para motivar alunos.

                            Marketing e Vendas: Em programas de fidelidade e campanhas para engajar clientes.

                            Saúde e Bem-estar: Em aplicativos que incentivam hábitos saudáveis e a prática de atividades físicas.
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
                            O HEXAD classifica os usuários em seis perfis principais com base em seus motivadores. 
                            Conhecer esses perfis é fundamental para desenhar sistemas que engajam de verdade, 
                            pois permite criar mecânicas que atendem diretamente aos desejos de cada tipo de usuário.
                            Vamos mergulhar nesses perfis e descobrir como usá-los para construir projetos de gamificação que geram resultados.
                        </p>
                        <div class="flex items-center space-x-3">
                            <x-heroicon-o-information-circle class="w-6 h-6 text-gray-500" />
                            <h2 class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-200">Observação</h2>
                        </div>
                        <p class="text-gray-600">
                            É importante lembrar que a maioria das pessoas não se encaixa 100% em uma única categoria,
                             mas sim possui uma combinação delas, com uma ou duas sendo mais dominantes.
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
                        Motivação principal: Agir sobre o Mundo para obter recompensas e status. <br> <br>

                        Para os Conquistadores, o sistema é uma montanha a ser escalada. O que os engaja de verdade é a oportunidade de superar desafios, acumular provas de seu sucesso e alcançar o topo. As medalhas, os pontos e o reconhecimento por suas conquistas são a sua maior recompensa. Psicologia por Trás do Perfil: Sua motivação primária é a maestria e a competência visível. Eles prosperam em ambientes que possuem metas claras e recompensas tangíveis. A validação vem da superação dos objetivos e do status que isso lhes confere.

                        <br>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <span class="font-bold">COMO SE COMPORTAM NA PRÁTICA:</span> <br>
                                <ul class="py-4 space-y-2">
                                    <li>
                                        A força motriz de um Conquistador é o desejo de provar sua competência através de feitos mensuráveis. Eles são orientados a objetivos e focados em completar tudo o que lhes é proposto com o máximo de eficiência.
                                    </li>
                                    <li>
                                        Em uma plataforma de treinamento, são os primeiros a completar todos os módulos, incluindo os opcionais, apenas para ganhar o certificado de "Especialista".
                                    </li>
                                    <li>
                                        Eles gerenciam meticulosamente suas tarefas em um software de projetos para garantir que sua barra de progresso esteja sempre em 100%, vendo cada tarefa concluída como uma pequena vitória.
                                    </li>
                                    <li>
                                        Diante de um desafio, eles focam imediatamente em encontrar a maneira mais rápida e eficaz de resolvê-lo, buscando não apenas a solução, mas a melhor solução possível.
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <span class="font-bold">ESTRATÉGIAS DE ENGAJAMENTO:</span> <br>
                                <ul class="py-4 space-y-2">
                                    <li>
                                        Implemente barras de progresso e percentuais que mostrem visualmente o quão perto eles estão de completar um objetivo. Este feedback constante de avanço é um poderoso motivador para eles.
                                    </li>
                                    <li>
                                        Crie certificados e níveis de status claros (Ex: Iniciante, Proficiente, Mestre). Para os Conquistadores, ter um título que exiba sua competência é muitas vezes mais valioso que a recompensa em si.
                                    </li>
                                    <li>
                                        Faça placares (leaderboards) que mostrem rankings de performance. Eles precisam de um palco para exibir suas conquistas e se comparar com os outros, alimentando seu impulso competitivo e seu desejo de chegar ao topo.
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
                        Motivação principal: Propósito e Significado. <br> <br>

                        Para os Filantropos, o sistema é uma comunidade a ser nutrida. O que os engaja de verdade é a oportunidade de ajudar os outros e de contribuir para um bem maior, sem esperar nada em troca. A sensação de ter um impacto positivo e o progresso do grupo são a sua maior recompensa. Psicologia por Trás do Perfil: Sua motivação primária é o altruísmo e a empatia. Eles prosperam em ambientes onde suas ações têm um propósito claro e significativo. A validação vem da satisfação intrínseca de ajudar e de ver a comunidade florescer.

                        <br>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <span class="font-bold">COMO SE COMPORTAM NA PRÁTICA:</span> <br>
                                <ul class="py-4 space-y-2">
                                    <li>
                                        A força motriz de um Filantropo é o desejo de deixar um legado positivo. Eles se sentem compelidos a compartilhar seu conhecimento e a apoiar os outros em sua jornada, agindo como os mentores e guardiões do sistema.

                                    </li>
                                    <li>
                                        Em uma plataforma de e-learning, são eles que respondem pacientemente às dúvidas de outros alunos nos fóruns, mesmo que isso não lhes dê nenhum ponto ou benefício direto.
                                    </li>

                                    <li>
                                        Eles se voluntariam para mentorar novos membros da equipe, dedicando seu tempo para garantir que os novatos se sintam acolhidos e tenham sucesso.
                                    </li>
                                    <li>
                                        Eles se engajam mais com desafios coletivos que tenham um propósito maior (ex: "se o time atingir a meta, faremos uma doação") do que com competições por prêmios individuais.
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <span class="font-bold">ESTRATÉGIAS DE ENGAJAMENTO:</span> <br>
                                <ul class="py-4 space-y-2">
                                    <li>
                                        Dê a eles papéis de mentoria ou moderação, reconhecendo formalmente sua disposição para ajudar. Isso valida seu comportamento e lhes dá mais ferramentas para contribuir com a comunidade.
                                    </li>
                                    <li>
                                        Crie uma narrativa com um "sentido épico", onde a participação de todos contribui para um objetivo grandioso. Mostre claramente como o engajamento deles está fazendo a diferença.
                                    </li>
                                    <li>
                                        Implemente mecânicas de "presente" ou ajuda, permitindo que usuários experientes "doem" dicas, recursos ou pequenos bônus para novatos, engajando diretamente seu impulso altruísta.
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
                        Motivação principal: Obter Recompensas Externas e status por meio do sistema. <br> <br>

                        Para os Jogadores, o sistema é um meio para um fim: a recompensa. O que os engaja de verdade é a busca por prêmios, pontos, medalhas e qualquer outro benefício tangível que possam acumular. A satisfação vem de completar as tarefas necessárias para desbloquear a próxima recompensa e ver seu progresso quantificado.

                        Psicologia por Trás do Perfil: Sua motivação primária é extrínseca. Eles são impulsionados pelo desejo de obter compensações externas e de serem reconhecidos por suas conquistas. A validação vem do sistema na forma de prêmios e da comparação de seu desempenho com o de outros, como em placares de líderes.

                        <br>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <span class="font-bold">COMO SE COMPORTAM NA PRÁTICA:</span> <br>
                                <ul class="py-4 space-y-2">
                                    <li>
                                        A força motriz de um Jogador é o retorno sobre o investimento de seu esforço. Eles calculam o que precisam fazer para ganhar o máximo de recompensas com a menor dificuldade possível. A validação que buscam é quantitativa: quantos pontos acumularam, qual a sua posição no ranking, ou quantos emblemas já conquistaram.
                                    </li>
                                    <li>
                                        Buscam o caminho mais curto para a recompensa. Se uma tarefa oferece muitos pontos por pouco esforço, eles a priorizarão. Eles são os "caçadores de conquistas" do sistema, focados em desbloquear todos os prêmios disponíveis.
                                    </li>

                                    <li>
                                        Monitoram constantemente seu progresso. Estão sempre de olho nos placares de líderes, nas barras de progresso e nas coleções de emblemas. A comparação com outros serve como um forte motivador para continuarem participando e melhorando seus números.
                                    </li>
                                    <li>
                                        O "porquê" da tarefa é menos importante que o "o quê" se ganha. Diferente de outros perfis, a tarefa em si pode não ser interessante para eles; o que importa é a recompensa prometida ao final.
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <span class="font-bold">ESTRATÉGIAS DE ENGAJAMENTO:</span> <br>
                                <ul class="py-4 space-y-2">
                                    <li>
                                        Implemente um sistema de pontos claro e visível. Os Jogadores precisam ver o resultado imediato de suas ações. Atribua pontos a cada tarefa relevante e mostre o acúmulo em tempo real no perfil do usuário.
                                    </li>
                                    <li>
                                        Crie emblemas e coleções de conquistas. Ofereça uma variedade de medalhas por diferentes tipos de feitos (diários, semanais, por completar módulos, etc.). Os Jogadores são motivados a "colecionar todos", o que os incentiva a explorar diferentes partes do sistema.
                                    </li>
                                    <li>
                                        Utilize placares de líderes (Leaderboards) de forma eficaz. Crie rankings que comparem os usuários com base em pontos ou outras métricas de desempenho. Para evitar desmotivação, use placares temporários (semanais ou mensais) ou que comparem o usuário apenas com um grupo próximo a ele, incentivando a competição direta.
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
                        Motivação principal: Provocar mudanças e testar os limites do sistema. <br> <br>

                        Para os Desordeiros, o sistema é um laboratório para ser explorado, testado e, muitas vezes, quebrado. O que os engaja de verdade não é seguir as regras, mas sim descobrir o que acontece quando elas são ignoradas ou subvertidas. Eles são motivados pela curiosidade de encontrar falhas, explorar brechas e provocar reações, sejam elas do sistema ou da comunidade.

                        Psicologia por Trás do Perfil: Sua motivação primária é a mudança. Eles prosperam ao desafiar o status quo e explorar os limites estabelecidos. A validação para eles vem de sua capacidade de impactar o sistema de maneiras imprevistas, seja de forma construtiva ou destrutiva, e da possibilidade de serem ouvidos.

                        <br>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <div>
                                <span class="font-bold">COMO SE COMPORTAM NA PRÁTICA:</span> <br>
                                <ul class="py-4 space-y-2">
                                    <li>
                                        A força motriz de um Desordeiro é o desejo de ir além do que é esperado. Eles são os pensadores "fora da caixa" que ativamente procuram por vulnerabilidades ou formas alternativas de interagir com as mecânicas propostas.
                                    </li>
                                    <li>
                                        Testam os limites constantemente. Se há um campo de texto, eles tentarão inserir códigos. Se há uma regra, eles tentarão contorná-la. Seu comportamento é guiado pela pergunta "O que acontece se eu fizer isso?".
                                    </li>

                                    <li>
                                        Podem agir de forma construtiva ou destrutiva. Um Desordeiro pode ser o primeiro a reportar um bug crítico que melhora o sistema para todos. Por outro lado, ele também pode explorar essa mesma falha para ganho pessoal ou para criar o caos, sentindo prazer em atividades anarquistas.
                                    </li>
                                    <li>
                                        Gostam de ter sua voz ouvida. Eles são motivados pela oportunidade de dar feedback direto, propor mudanças radicais e ver suas ideias disruptivas gerarem uma transformação no ambiente.
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <span class="font-bold">ESTRATÉGIAS DE ENGAJAMENTO:</span> <br>
                                <ul class="py-4 space-y-2">
                                    <li>
                                        Crie "programas de sandbox" ou ambientes de teste. Dê aos Desordeiros um espaço seguro onde eles possam experimentar e tentar "quebrar" o sistema sem prejudicar a experiência dos outros usuários. Recompense-os por encontrar e reportar falhas de forma construtiva.
                                    </li>
                                    <li>
                                        Implemente canais de feedback abertos e transparentes. Crie fóruns específicos para sugestões de melhoria ou "hackathons" internos onde eles possam propor mudanças radicais. Mostre que suas ideias são ouvidas e consideradas, canalizando sua inclinação para a inovação.
                                    </li>
                                    <li>
                                       Ofereça elementos de anonimato controlado. Em certas atividades, permitir um grau de anonimato pode atrair os Desordeiros, que gostam de explorar os limites sem o peso da reputação social. Isso permite que eles ajam de forma mais livre, o que pode levar a insights inesperados sobre o comportamento do usuário.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        {{-- <section id="referencias" class="scroll-mt-15" data-link-highlight="bg-gray-400 text-gray-800">

            
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

        </section> --}}

    </div>
</x-filament::page>
