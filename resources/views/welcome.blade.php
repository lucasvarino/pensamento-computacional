<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Game Persona</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />

    <!-- SCRIPT para adicionar/remover sombra ao scroll (já existia) -->
<script>
    window.addEventListener("scroll", function () {
        const navbar = document.getElementById("navbar");
        if (window.scrollY > 50) {
            navbar.classList.add("shadow-md");
        } else {
            navbar.classList.remove("shadow-md");
        }
    });
</script>
</head>
<body class="
    relative flex flex-col min-h-screen
    bg-gradient-to-r
    dark:from-dark-bg-grad-l
    dark:to-dark-bg-grad-r
    from-bg-grad-l
    to-bg-grad-r
    selection:bg-red-500 selection:text-white
    dark:text-white
">

<!-- AOS init (já existia) -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        easing: 'ease-out-quart',
        once: true,
    });
</script>

<header id="navbar" class="fixed top-0 w-full z-50 bg-gradient-to-r
    dark:from-dark-bg-grad-l
    dark:to-dark-bg-grad-r
    from-bg-grad-l
    to-bg-grad-r
    transition-shadow
">
    <div class="mx-auto max-w-[90%] flex items-center justify-between px-4 sm:px-6 lg:px-8 py-3">
        <a href="/" class="flex items-center gap-2">
            <x-icon name="game-persona-logo" class="sm:h-12 sm:w-12 h-10 w-10 bg-transparent"/>
            <h1 class="font-mono sm:text-2xl text-xl font-semibold hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                dark:text-white dark:hover:text-fuchsia-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                GAME<br>PERSONA
            </h1>
        </a>

        <button id="btn-mobile-menu" type="button"
                class="inline-flex items-center justify-center rounded-md p-2 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-fuchsia-500 sm:hidden"
                aria-controls="mobile-menu"
                aria-expanded="false"
        >
            <svg id="icon-open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 8h16M4 16h16"/>
            </svg>
            <svg id="icon-close" class="h-6 w-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <nav class="hidden sm:flex sm:items-center sm:space-x-8"
             data-aos="fade-down" data-aos-duration="300"
        >
            <a href="#inicio" class="font-mono font-semibold text-[1rem]
                hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                dark:text-gray-400 dark:hover:text-fuchsia-300 hidden lg:block
                focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >Início</a>
            <a href="#sobre" class="font-mono font-semibold text-[1rem]
                hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                dark:text-gray-400 dark:hover:text-fuchsia-300
                focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >Sobre nós</a>
            <a href="#metodos" class="font-mono font-semibold text-[1rem]
                hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                dark:text-gray-400 dark:hover:text-fuchsia-300
                focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >Métodos</a>
            <a href="#contato" class="font-mono font-semibold text-[1rem]
                hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                dark:text-gray-400 dark:hover:text-fuchsia-300
                focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >Contato</a>
            <a href="#equipe" class="font-mono font-semibold text-[1rem]
                hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                dark:text-gray-400 dark:hover:text-fuchsia-300
                focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >Nossa equipe</a>
            <button class="ml-24 sm:px-6 rounded-2xl bg-container-400" data-aos="fade-up" data-aos-duration="600">
              <span class="font-mono text-2xl font-semibold text-black dark:text-white">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/admin') }}" class="font-mono font-semibold text-xl
                            hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                            dark:text-gray-400 dark:hover:text-fuchsia-300
                            focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Painel</a>
                    @else
                        <a href="{{ route('login') }}" class="font-mono font-semibold text-xl
                            hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                            dark:text-gray-400 dark:hover:text-fuchsia-300
                            focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Entrar</a>
                    @endauth
                @endif
              </span>
            </button>
        </nav>
    </div>

    <div id="mobile-menu" class="sm:hidden hidden px-4 pb-4">
        <nav class="flex flex-col space-y-3">
            <a href="#inicio" class="font-mono font-semibold text-lg
                hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                dark:text-gray-400 dark:hover:text-fuchsia-300
                focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >Início</a>
            <a href="#sobre" class="font-mono font-semibold text-lg
                hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                dark:text-gray-400 dark:hover:text-fuchsia-300
                focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >Sobre nós</a>
            <a href="#metodos" class="font-mono font-semibold text-lg
                hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                dark:text-gray-400 dark:hover:text-fuchsia-300
                focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >Métodos</a>
            <a href="#contato" class="font-mono font-semibold text-lg
                hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                dark:text-gray-400 dark:hover:text-fuchsia-300
                focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >Contato</a>
            <a href="#equipe" class="font-mono font-semibold text-lg
                hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                dark:text-gray-400 dark:hover:text-fuchsia-300
                focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >Nossa equipe</a>
            <button class="rounded-2xl bg-container-400">
              <span class="font-mono text-2xl font-semibold text-black dark:text-white">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/admin') }}" class="font-mono font-semibold text-xl
                            hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                            dark:text-gray-400 dark:hover:text-fuchsia-300
                            focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Painel</a>
                    @else
                        <a href="{{ route('login') }}" class="font-mono font-semibold text-xl
                            hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                            dark:text-gray-400 dark:hover:text-fuchsia-300
                            focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Entrar</a>
                    @endauth
                @endif
              </span>
            </button>
        </nav>
    </div>
</header>

<script>
    const btnMobile = document.getElementById('btn-mobile-menu');
    const menuMobile = document.getElementById('mobile-menu');
    const iconOpen = document.getElementById('icon-open');
    const iconClose = document.getElementById('icon-close');

    btnMobile.addEventListener('click', () => {
        const isOpen = !menuMobile.classList.contains('hidden');
        if (isOpen) {
            menuMobile.classList.add('hidden');
            iconOpen.classList.remove('hidden');
            iconClose.classList.add('hidden');
            btnMobile.setAttribute('aria-expanded', 'false');
        } else {
            menuMobile.classList.remove('hidden');
            iconOpen.classList.add('hidden');
            iconClose.classList.remove('hidden');
            btnMobile.setAttribute('aria-expanded', 'true');
        }
    });
</script>

<!-- <script>
    window.addEventListener("scroll", function () {
        const navbar = document.getElementById("navbar");
        if (window.scrollY > 50) {
            navbar.classList.add("shadow-md");
        } else {
            navbar.classList.remove("shadow-md");
        }
    });
</script>

</head>


    <body class="
    relative flex flex-col min-h-screen
    bg-gradient-to-r
    dark:from-dark-bg-grad-l
    dark:to-dark-bg-grad-r
    from-bg-grad-l
    to-bg-grad-r
    selection:bg-red-500 selection:text-white
    dark:text-white
    ">

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
    AOS.init({
        easing: 'ease-out-quart',
        once: true,      // roda só na primeira vez que aparece
    });
    </script>

        <header id="navbar" class="sm:fixed sm:top-0 w-full z-50 bg-gradient-to-r
    dark:from-dark-bg-grad-l
    dark:to-dark-bg-grad-r
    from-bg-grad-l
    to-bg-grad-r
    ">


    <div class="mx-auto max-w-7xl flex items-center justify-between px-4 sm:px-6 lg:px-8 py-3">
        <a href="/" class="flex items-center gap-2">
            <x-icon name="game-persona-logo" class="h-12 w-12 bg-transparent"/>
            <h1 class="font-mono text-2xl font-semibold hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                dark:text-white dark:hover:text-fuchsia-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                GAME<br>PERSONA
            </h1>
        </a>


        <div class="flex relative text-black dark:text-white mx-auto w-full items-center px-10">
            <a href="/" class="flex left-0 m-3">
                <x-icon name="game-persona-logo" class="h-16 w-16 bg-transparent"/>
                <h1 class="font-mono text-2xl font-semibold hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb] dark:text-white dark:hover:text-fuschia-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">GAME <br> PERSONA</h1>
            </a>
            <div class="flex w-5/6 items-center justify-center gap-7 px-5 ">
                <a href="#inicio" data-aos="fade-up" data-aos-duration="200" class="font-mono font-semibold text-x1
                hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb] dark:text-gray-400 dark:hover:text-fuschia-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"> 
                    Início
                </a>
                <a href="#sobre" data-aos="fade-up" data-aos-duration="250" class="font-mono font-semibold text-x1
                hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb] dark:text-gray-400 dark:hover:text-fuschia-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"> 
                    Sobre nós
                </a>
                <a href="#metodos" data-aos="fade-up" data-aos-duration="300" class="font-mono font-semibold text-x1
                hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb] dark:text-gray-400 dark:hover:text-fuschia-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"> 
                    Métodos
                </a>
                <a href="#equipe" data-aos="fade-up" data-aos-duration="350" class="font-mono font-semibold text-x1
                hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb] dark:text-gray-400 dark:hover:text-fuschia-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"> 
                    Nossa equipe
                </a>
                <a href="#contato" data-aos="fade-up" data-aos-duration="400" class="font-mono font-semibold text-x1
                hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb] dark:text-gray-400 dark:hover:text-fuschia-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"> 
                    Contato
                </a>
            </div>
            @if (Route::has('login'))
                <nav class="flex text-right right-0 px-3" data-aos="fade-up" data-aos-duration="450">
                    @auth
                        <a href="{{ url('/admin') }}" class="font-mono font-semibold text-xl hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb] dark:text-gray-400 dark:hover:text-fuschia-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Painel</a>
                    @else
                        <a href="{{ route('login') }}" class="font-mono font-semibold text-xl hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb] dark:text-gray-400 dark:hover:text-fuschia-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Entrar</a>
                        <!--
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font-mono ml-4 font-semibold text-xl hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb] dark:text-gray-400 dark:hover:text-fuschia-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Cadastre-se</a>
                        @endif 
                        
              <nav class="hidden sm:flex sm:items-center sm:space-x-8"
             data-aos="fade-down" data-aos-duration="300"
        >
            <a href="#inicio" class="font-mono font-semibold text-xl
                hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                dark:text-gray-400 dark:hover:text-fuchsia-300
                focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >Início</a>
            <a href="#sobre" class="font-mono font-semibold text-xl
                hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                dark:text-gray-400 dark:hover:text-fuchsia-300
                focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >Sobre nós</a>
            <a href="#metodos" class="font-mono font-semibold text-xl
                hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                dark:text-gray-400 dark:hover:text-fuchsia-300
                focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >Métodos</a>
            <a href="#equipe" class="font-mono font-semibold text-xl
                hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                dark:text-gray-400 dark:hover:text-fuchsia-300
                focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >Nossa equipe</a>
            <a href="#contato" class="font-mono font-semibold text-xl
                hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                dark:text-gray-400 dark:hover:text-fuchsia-300
                focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >Contato</a>

            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/admin') }}" class="font-mono font-semibold text-xl
                        hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                        dark:text-gray-400 dark:hover:text-fuchsia-300
                        focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Painel</a>
                @else
                    <a href="{{ route('login') }}" class="font-mono font-semibold text-xl
                        hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                        dark:text-gray-400 dark:hover:text-fuchsia-300
                        focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Entrar</a>
                @endauth
            @endif
        </nav>
                    @endauth
                </nav>
            @endif
        </div>
    </header> -->

<main class="flex flex-col items-center pt-9 overflow-hidden">

  <section id="inicio" class="relative flex sm:pt-28 sm:pl-12 sm:gap-5 w-full justify-center items-center">
    <div class="lg:min-w-[50%] lg:max-w-[70%] xl:w-1/2 sm:p-16 p-5 pt-16 text-left">
      <h1 class="font-mono font-semibold sm:text-7xl text-3xl text-black dark:text-white" data-aos="fade-up" data-aos-duration="500" >
        GAMIFICANDO<br>O
        <span class="text-violet-600 dark:text-violet-500 drop-shadow-[0_0_10px_#b74ae1] brightness-125">
        APRENDIZADO</span>.
      </h1>
      <p class="font-mono my-4 sm:text-2xl text-xl font-semibold text-black dark:text-white" data-aos="fade-up" data-aos-duration="550">
        Utilizando o Game Persona, é possível identificar os perfis de pessoas para personalizar
        estratégias de engajamento que atendam tanto às necessidades individuais, quanto coletivas!
      </p>
      <button class="px-6 py-2 rounded-2xl bg-container-400 m-1" data-aos="fade-up" data-aos-duration="600">
        <span class="font-mono text-2xl font-semibold text-black dark:text-white">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/admin') }}"> Painel </a>
                @else
                    <a href="{{ url('login') }}"> Entrar </a>
                @endauth
            @endif
        </span>
      </button>
    </div>
    <div class="relative h-[450px] xl:w-1/2 lg:w-2/5" data-aos="fade-left" data-aos-duration="600">
        <div class="absolute inset-0 rounded-[3em] bg-container-800 -translate-x-16"></div>
        <div class="absolute inset-0 rounded-[3em] bg-container-600 -translate-x-11"></div>
        <div class="absolute inset-0 rounded-[3em] bg-container-400 -translate-x-6"></div>
        <div class="absolute inset-0 rounded-s-[3em] bg-container-200 -translate-x-1"> <x-icon name="icon-img-game-persona" class="w-full h-full p-5" /> </div>
    </div>
  </section>

<section id="sobre" class="relative flex flex-col items-center justify-center py-12 w-full">

    <h1 class="font-mono font-semibold sm:text-5xl text-3xl text-white sm:mb-16" data-aos="fade-up" data-aos-duration="600">
        O QUE 
        <span class="text-violet-600 drop-shadow-[0_0_10px_#b74ae1] brightness-125">FAZEMOS</span>?
    </h1>

    <div class="grid grid-cols-1 gap-12 sm:w-4/5 w-full px-6">
        
      <div class="flex lg:flex-row flex-col items-center w-full">
          <div class="relative m-5 w-auto md:w-4/5 lg:w-1/2" data-aos="fade-left" data-aos-duration="500">
              <img src="{{ asset('img/CriarTurmaHomePage.png') }}" alt="Criar Turma" class="relative rounded-[2em] sm:p-4 p-1 z-10">
              <div class="absolute inset-0 rounded-[2em] bg-container-800 translate-x-16 hidden sm:block"></div>
              <div class="absolute inset-0 rounded-[2em] bg-container-600 translate-x-12 hidden sm:block"></div>
              <div class="absolute inset-0 rounded-[2em] bg-container-400 translate-x-6 hidden sm:block"></div>
              <div class="absolute inset-0 rounded-[2em] bg-container-200"></div>
          </div>
          <div class="lg:text-left lg:w-2/5 text-center lg:ml-16" data-aos="fade-left" data-aos-duration="550">
            <h2 class="sm:text-3xl text-2xl font-bold mb-2">Crie uma Turma!</h2>
              <p class="font-mono my-4 sm:text-xl text-[1rem] font-semibold text-black dark:text-white" >
              Comece organizando seus alunos, colaboradores ou participantes em grupos exclusivos.
              Com uma interface simples e intuitiva, você pode nomear suas turmas, definir objetivos e criar um ambiente controlado para cada contexto de aprendizado ou análise. 
              Esta organização é o primeiro passo para aplicar os testes de forma direcionada e gerenciar os resultados com eficiência.</p>
          </div>
      </div>

      <div class="flex lg:flex-row-reverse flex-col items-center w-auto">
          <div class="relative m-5 w-auto md:w-4/5 lg:w-1/2" data-aos="fade-right" data-aos-duration="550">
              <img src="{{ asset('img/ApliqueTesteHomePage.png') }}" alt="Perfil Image" class="relative rounded-[2em] sm:p-4 p-1 z-10">
              <div class="absolute inset-0 rounded-[2em] bg-container-800 -translate-x-16  hidden sm:block"></div>
              <div class="absolute inset-0 rounded-[2em] bg-container-600 -translate-x-12  hidden sm:block"></div>
              <div class="absolute inset-0 rounded-[2em] bg-container-400 -translate-x-6 hidden sm:block "></div>
              <div class="absolute inset-0 rounded-[2em] bg-container-200"></div>
          </div>
          <div class="lg:text-right text-center lg:w-2/5 lg:mr-16" data-aos="fade-right" data-aos-duration="550">
            <h2 class="sm:text-3xl text-2xl font-bold mb-2">Aplique o Teste!</h2>
              <p class="font-mono my-4 sm:text-xl text-[1rem] font-semibold text-black dark:text-white" >
              Com a turma formada, é hora de descobrir os perfis! 
              Nossa plataforma gera um link que você pode compartilhar com os participantes. 
              Eles serão guiados por um questionário interativo, 
              baseado nos nossos métodos, projetado para mapear suas preferências e motivações de forma rápida e engajadora.</p>
          </div>
      </div>

      <div class="flex lg:flex-row flex-col items-center w-full">
          <div class="relative m-5 w-auto md:w-4/5 lg:w-1/2" data-aos="fade-left" data-aos-duration="550">
              <img src="{{ asset('img/AnaliseResultadosHomePage.png') }}" alt="Perfil Image" class="relative rounded-[2em] sm:p-4 p-1 z-10">
              <div class="absolute inset-0 rounded-[2em] bg-container-800 translate-x-16 hidden sm:block"></div>
              <div class="absolute inset-0 rounded-[2em] bg-container-600 translate-x-12 hidden sm:block"></div>
              <div class="absolute inset-0 rounded-[2em] bg-container-400 translate-x-6 hidden sm:block"></div>
              <div class="absolute inset-0 rounded-[2em] bg-container-200"></div>
          </div>
          <div class="lg:text-left text-center lg:w-2/5 lg:ml-16" data-aos="fade-left" data-aos-duration="550">
            <h2 class="sm:text-3xl text-2xl font-bold mb-2">Analise os Resultados!</h2>
              <p class="font-mono my-4 sm:text-xl text-[1rem] font-semibold text-black dark:text-white">
              O verdadeiro poder do Game Persona está aqui. A plataforma compila as respostas e as transforma em dashboards visuais e intuitivos. 
              Visualize a distribuição dos perfis (como Socializador, Conquistador, etc.) em gráficos claros, identifique padrões e obtenha insights valiosos sobre as motivações do seu grupo. 
              Com esses dados em mãos, você estará pronto para criar estratégias de gamificação e engajamento verdadeiramente personalizadas e eficazes.</p>
          </div>
      </div>

    </div>
</section>


  <!-- <section id="sobre" class="relative flex py-12 w-full">
  <div class="flex pt-16">
    <div class="relative w-full py-7">

      <div class="absolute inset-y-0 w-4/5 rounded-[5em] bg-container-800 translate-x-24"></div>
      <div class="absolute inset-y-0 w-4/5 rounded-[5em] bg-container-600 translate-x-16"></div>
      <div class="absolute inset-y-0 w-4/5 rounded-[5em] bg-container-400 translate-x-7"></div>
      <div class="absolute inset-y-0 w-4/5 rounded-[5em] bg-container-200"></div>
      <div class="relative flex flex-col items-center w-full h-full">
        
      <div class="flex w-full justify-center">

        <h1 class="font-mono font-semibold text-5xl text-black dark:text-white" data-aos="fade-up" data-aos-duration="600">
            O QUE 
            <span class="text-violet-600 dark:text-violet-600 drop-shadow-[0_0_10px_#b74ae1] brightness-125">
          FAZEMOS</span>?
        </h1>

      </div>
        <div class="px-[20%] grid grid-cols-1 text-center">

            <div class="flex flex-row items-center"> 
                <x-icon name="icon-user" class="h-40 w-40"/> 
                <div class="px-7">
                    <h1 class="font-mono my-4 text-2xl font-semibold text-black dark:text-white" data-aos="fade-up" data-aos-duration="550">
                        Crie uma Turma!</h1>
                  <p class="font-mono my-4 text-xl font-semibold text-black dark:text-white" data-aos="fade-up" data-aos-duration="550">
                      Descreve o tópico. Lorem, neque provident voluptatibus vitae debitis earum officia adipisci cum illum accusantium quia libero ad consequuntur explicabo, quis accusamus ut soluta harum. Architecto.</p>
                </div>
            </div>
            <div class="flex flex-row items-center"> 
                <x-icon name="icon-user" class="h-40 w-40"/> 
                <div class="px-7">
                    <h1 class="font-mono my-4 text-2xl font-semibold text-black dark:text-white" data-aos="fade-up" data-aos-duration="550">
                        Aplique os testes!</h1>
                <p class="font-mono my-4 text-xl font-semibold text-black dark:text-white" data-aos="fade-up" data-aos-duration="550">
                    Descreve o tópico. Lorem, neque provident voluptatibus vitae debitis earum officia adipisci cum illum accusantium quia libero ad consequuntur explicabo, quis accusamus ut soluta harum. Architecto.</p>
                </div>
            </div>
            <div class="flex flex-row items-center"> 
                <x-icon name="icon-user" class="h-40 w-40"/> 
                <div class="px-7">
                    <h1 class="font-mono my-4 text-2xl font-semibold text-black dark:text-white" data-aos="fade-up" data-aos-duration="550">
                        Analise os resultados!</h1>
                <p class="font-mono my-4 text-xl font-semibold text-black dark:text-white" data-aos="fade-up" data-aos-duration="550">
                    Descreve o tópico. Lorem, neque provident voluptatibus vitae debitis earum officia adipisci cum illum accusantium quia libero ad consequuntur explicabo, quis accusamus ut soluta harum. Architecto.</p>
                </div>
            </div>
    
        </div>
      </div>
    </div>
    </section> -->

    <!-- <section id="sobre" class="relative flex py-12 w-full">
<div class="flex pt-16">
<div class="relative w-4/5 py-7">
    <div class="absolute inset-y-0 left-0 w-4/5 rounded-[5em] bg-container-800 translate-x-24"></div>
    <div class="absolute inset-y-0 left-0 w-4/5 rounded-[5em] bg-container-600 translate-x-16"></div>
    <div class="absolute inset-y-0 left-0 w-4/5 rounded-[5em] bg-container-400 translate-x-7"></div>
    <div class="absolute inset-y-0 left-0 w-4/5 rounded-e-[5em] bg-container-200 -translate-x-3"></div>
    <div class="relative flex flex-col items-center w-4/5 h-full">
    <div class="flex p-3 w-full justify-around">
        <x-icon name="icon-ufjf" class="h-20 w-20" data-aos="fade-up" data-aos-duration="450"/>
        <x-icon name="icon-lapic" class="h-20 w-20" data-aos="fade-up" data-aos-duration="500"/>
        <x-icon name="icon-fadepe" class="h-20 w-20" data-aos="fade-up" data-aos-duration="550"/>
    </div>
    <p class="font-mono my-4 text-3xl font-semibold text-black dark:text-white px-5" data-aos="fade-up" data-aos-duration="600">
        A plataforma desenvolvida no Laboratório de Aplicações e Inovação em Computação (LApIC) <br> da UFJF,
        como parte das atividades relacionadas ao Programa de Pós-graduação em Educação Matemática.
        O projeto contou com o financiamento da Secretaria de Educação do Estado de Minas Gerais.
        O sistema foi desenvolvido com o intuito de Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum distinctio quas deserunt nihil est in sapiente pariatur, nam deleniti perspiciatis?
    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit reprehenderit inventore nam corrupti esse eum a explicabo maiores vitae corporis!
    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel aliquam fugit minus reprehenderit enim eligendi veritatis, voluptate numquam vitae ipsa?
    </p>
    </div>
</div>
</section> -->

<!-- <section class="relative flex pt-12 gap-5 w-full justify-end items-center -translate-y-48">
  <div class="relative w-2/5 py-7" data-aos="fade-left" data-aos-duration="450">
    <div class="absolute inset-y-0 right-0 w-full rounded-s-[5em] bg-container-800 translate-x-1"></div>
    <div class="absolute inset-y-0 right-0 w-full rounded-s-[5em] bg-container-600 translate-x-6"></div>
    <div class="absolute inset-y-0 right-0 w-full rounded-s-[5em] bg-container-400 translate-x-11"></div>
    <div class="absolute inset-y-0 right-0 w-full rounded-s-[5em] bg-container-200 translate-x-16"></div>

    <div class="relative flex flex-col items-center h-full px-5">
      <div class="flex w-full justify-center pl-16">
        <h1 class="font-mono font-semibold text-5xl text-black dark:text-white" data-aos="fade-up" data-aos-duration="600">
            O QUE 
            <span class="text-violet-600 dark:text-violet-600 drop-shadow-[0_0_10px_#b74ae1] brightness-125">
          FAZEMOS</span>?
        </h1>
      </div>
      <p class="font-mono my-4 text-2xl text-right pl-16 font-semibold text-black dark:text-white" data-aos="fade-up" data-aos-duration="650">
        O sistema foi desenvolvido com o intuito de Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum distinctio quas deserunt nihil est in sapiente pariatur, nam deleniti perspiciatis?
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit reprehenderit inventore nam corrupti esse eum a explicabo maiores vitae corporis!
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel aliquam fugit minus reprehenderit enim eligendi veritatis, voluptate numquam vitae ipsa?
      </p>
    </div>
  </div>
</section> -->

<section id="metodos" class="relative flex-col flex w-full justify-center justify-items-center sm:p-12 p-5">

    <div class="relative sm:py-7 py-2 w-full items-center justify-center justify-items-center" data-aos="fade-up" data-aos-duration="200">
        <!-- <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-800 translate-y-6"></div>
        <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-600 translate-y-4"></div>
        <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-400 translate-y-2"></div>
        <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-200" data-aos="fade-up" data-aos-duration="200"></div> -->
        
        <div class="relative flex flex-col items-center text-center h-full">
            <div class="grid grid-cols-1 w-full">
                <h1 class="font-mono font-semibold sm:text-5xl text-3xl text-black dark:text-white" data-aos="fade-up" data-aos-duration="450">
                    TESTE DE
                    <span class="text-violet-600 dark:text-violet-600 drop-shadow-[0_0_10px_#b74ae1] brightness-125">
                        BARTLE</span>
                </h1>
                <p class="font-mono my-4 sm:text-2xl text-xl font-semibold text-black dark:text-white" data-aos="fade-up" data-aos-duration="450">
                    Para o teste de Bartle, temos os seguintes resultados:
                </p>
            </div>
        </div>
    </div>

<div class="lg:pt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

    <div class="relative w-full min-h-30 lg:min-h-96" data-aos="fade-up" data-aos-duration="400">
      <div class="flex flex-col items-center text-center lg:justify-start lg:text-start lg:items-start p-6 lg:p-10 rounded-[2em] bg-socializador-600">
        <x-icon name="icon-megafone" class="w-16 h-auto mb-2 transform -scale-x-100"/>
        <h1 class="font-mono sm:text-2xl text-xl font-semibold dark:text-white mb-5 uppercase text-socializador-txt">Socializador</h1>
        <p class="font-mono text-sm lg:text-[1.1rem] font-semibold dark:text-white text-socializador-txt"> Os socializadores ficam felizes em colaborar para alcançar coisas maiores e melhores do que conseguiriam sozinhos.</p>
      </div>
    </div>

    <div class="relative w-full min-h-30 lg:min-h-96" data-aos="fade-up" data-aos-duration="400">
      <div class="relative flex flex-col items-center text-center lg:justify-start lg:text-start lg:items-start p-6 lg:p-10 rounded-[2em] bg-conquistador-600">
        <x-icon name="icon-medalha" class="w-16 h-auto mb-2"/>
        <h1 class="font-mono sm:text-2xl text-xl font-semibold dark:text-white mb-5 uppercase text-socializador-txt">Empreendedor</h1>
        <p class="font-mono text-sm lg:text-[1.1rem] font-semibold dark:text-white text-socializador-txt"> Para os Empreendedores o objetivo é ter destaque no jogo em relação aos demais jogadores em qualquer coisa que fizerem.</p>
      </div>
    </div>
    
    <div class="relative w-full min-h-30 lg:min-h-96" data-aos="fade-up" data-aos-duration="400">
      <div class="relative flex flex-col items-center text-center lg:justify-start lg:text-start lg:items-start p-6 lg:p-10 rounded-[2em] bg-explorador-600">
        <x-icon name="icon-lanterna" class="w-16 h-auto mb-2"/>
        <h1 class="font-mono sm:text-2xl text-xl font-semibold dark:text-white mb-5 uppercase text-socializador-txt">Explorador</h1>
        <p class="font-mono text-sm lg:text-[1.1rem] font-semibold dark:text-white text-socializador-txt"> Os Exploradores querem ver coisas novas e descobrir novos segredos. Eles não se importam tanto com pontos ou prêmios.</p>
      </div>
    </div>

    <div class="relative w-full min-h-30 lg:min-h-96" data-aos="fade-up" data-aos-duration="400">
      <div class="relative flex flex-col items-center text-center lg:justify-start lg:text-start lg:items-start p-6 lg:p-10 rounded-[2em] bg-assassino-600">
        <x-icon name="icon-espadas" class="w-16 h-auto mb-2"/>
        <h1 class="font-mono sm:text-2xl text-xl font-semibold dark:text-white mb-5 uppercase text-socializador-txt">Assassino</h1>
        <p class="font-mono text-sm lg:text-[1.1rem] font-semibold dark:text-white text-socializador-txt">  Assassinos querem ver outras pessoas perderem, são extremamente competitivos, e vencer é o que os motiva.</p>
      </div>
    </div>



</div>
  
</section>

<section class="relative flex-col flex w-full justify-center justify-items-center sm:p-12 p-5">
        
        <div class="relative sm:py-7 py-2 w-full items-center justify-center justify-items-center" data-aos="fade-up" data-aos-duration="200">
        <!-- <div class="absolute inset-y-0 top-0 w-full rounded-[2em] bg-container-800 translate-y-6"></div>
        <div class="absolute inset-y-0 top-0 w-full rounded-[2em] bg-container-600 translate-y-4"></div>
        <div class="absolute inset-y-0 top-0 w-full rounded-[2em] bg-container-400 translate-y-2"></div>
        <div class="absolute inset-y-0 top-0 w-full rounded-[2em] bg-container-200"></div> -->
        
        <div class="relative flex flex-col items-center text-center h-full sm:px-5 px-1">
            <div class="grid grid-cols-1 w-full justify-around">
                <h1 class="font-mono font-semibold sm:text-5xl text-3xl text-black dark:text-white" data-aos="fade-up" data-aos-duration="450">
                    TESTE
                    <span class="text-violet-600 dark:text-violet-600 drop-shadow-[0_0_10px_#b74ae1] brightness-125">
                        HEXAD</span>
                </h1>
                <p class="font-mono my-4 sm:text-2xl text-xl font-semibold text-black dark:text-white" data-aos="fade-up" data-aos-duration="450">
                    Para o teste HEXAD, temos os seguintes resultados:
                </p>
            </div>
        </div>
    </div>

<div class="lg:pt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-16 text-left lg:justify-start">

    <div class="relative w-full lg:min-h-80" data-aos="fade-up" data-aos-duration="400">
     <div class="relative flex flex-col items-center text-center lg:justify-start lg:text-start lg:items-start p-6 lg:p-10 rounded-[2em] bg-jogador-600">
        <x-icon name="icon-manete" class="w-16 h-auto mb-2 transform -scale-x-100"/>
        <h1 class="font-mono sm:text-2xl text-xl font-semibold dark:text-white mb-5 uppercase text-socializador-txt">Jodagor</h1>
        <p class="font-mono text-sm lg:text-[1.1rem] font-semibold dark:text-white text-socializador-txt">Os Jogadores são mais individualistas. Eles farão o necessário para coletar recompensas, visando somente os ganhos próprios.</p>
      </div>
    </div>

    <div class="relative w-full lg:min-h-80" data-aos="fade-up" data-aos-duration="400">
     <div class="relative flex flex-col items-center text-center lg:justify-start lg:text-start lg:items-start p-6 lg:p-10 rounded-[2em] bg-espirito-livre-600">
        <x-icon name="icon-borboleta" class="w-16 h-auto mb-2"/>
        <h1 class="font-mono sm:text-2xl text-xl font-semibold dark:text-white mb-5 uppercase text-socializador-txt">Espírito Livre</h1>
        <p class="font-mono text-sm lg:text-[1.1rem] font-semibold dark:text-white text-socializador-txt">Motivados pela autonomia. Os Espíritos Lívres desejam criar e explorar, gostam de liberdade para experimentar o mundo ao seu ritmo.</p>
      </div>
    </div>

    <div class="relative w-full lg:min-h-80" data-aos="fade-up" data-aos-duration="400">
     <div class="relative flex flex-col items-center text-center lg:justify-start lg:text-start lg:items-start p-6 lg:p-10 rounded-[2em] bg-filantropo-600">
        <x-icon name="icon-filantropo" class="w-16 h-auto mb-2"/>
        <h1 class="font-mono sm:text-2xl text-xl font-semibold dark:text-white mb-5 uppercase text-socializador-txt">Filantropo</h1>
        <p class="font-mono text-sm lg:text-[1.1rem] font-semibold dark:text-white text-socializador-txt"> Os Filantropos são altruístas, querendo sempre ajudar outras pessoas e enriquecer a vida delas de alguma forma, sem esperar algo em troca.</p>
      </div>
    </div>

    <div class="relative w-full lg:min-h-80" data-aos="fade-up" data-aos-duration="400">
     <div class="relative flex flex-col items-center text-center lg:justify-start lg:text-start lg:items-start p-6 lg:p-10 rounded-[2em] bg-conquistador-600">
        <x-icon name="icon-medalha" class="w-16 h-auto mb-2"/>
        <h1 class="font-mono sm:text-2xl text-xl font-semibold dark:text-white mb-5 uppercase text-socializador-txt">Conquistador</h1>
        <p class="font-mono text-sm lg:text-[1.1rem] font-semibold dark:text-white text-socializador-txt">Eles estão procurando aprender coisas novas e se aprimorar. Reforçam seu status através da demonstração daquilo que possuem.</p>
      </div>
    </div>

    <div class="relative w-full lg:min-h-80" data-aos="fade-up" data-aos-duration="400">
     <div class="relative flex flex-col items-center text-center lg:justify-start lg:text-start lg:items-start p-6 lg:p-10 rounded-[2em] bg-socializador-600">
        <x-icon name="icon-megafone" class="w-16 h-auto mb-2 transform -scale-x-100"/>
        <h1 class="font-mono sm:text-2xl text-xl font-semibold dark:text-white mb-5 uppercase text-socializador-txt">Socializador</h1>
        <p class="font-mono text-sm lg:text-[1.1rem] font-semibold dark:text-white text-socializador-txt"> Os socializadores ficam felizes em colaborar para alcançar coisas maiores e melhores do que conseguiriam sozinhos. Motivados pela conexão</p>
      </div>
    </div>
    
    <div class="relative w-full lg:min-h-80" data-aos="fade-up" data-aos-duration="400">
     <div class="relative flex flex-col items-center text-center lg:justify-start lg:text-start lg:items-start p-6 lg:p-10 rounded-[2em] bg-disruptor-600">
        <x-icon name="icon-bomba" class="w-16 h-auto mb-2"/>
        <h1 class="font-mono sm:text-2xl text-xl font-semibold dark:text-white mb-5 uppercase text-socializador-txt">Disruptor</h1>
        <p class="font-mono text-sm lg:text-[1.1rem] font-semibold dark:text-white text-socializador-txt"> Em geral, eles querem impactar o sistema, seja diretamente ou através de outros usuários, para forçar mudanças positivas ou negativas.</p>
      </div>
    </div>
  

</div>
  
</section>

<section id="contato" class="relative flex-col flex w-full justify-center justify-items-center sm:p-12 p-5">
        
        <div class="relative sm:py-7 py-2 w-full items-center justify-center justify-items-center" data-aos="fade-up" data-aos-duration="200">
        <!-- <div class="absolute inset-y-0 top-0 w-full rounded-[2em] bg-container-800 translate-y-6"></div>
        <div class="absolute inset-y-0 top-0 w-full rounded-[2em] bg-container-600 translate-y-4"></div>
        <div class="absolute inset-y-0 top-0 w-full rounded-[2em] bg-container-400 translate-y-2"></div>
        <div class="absolute inset-y-0 top-0 w-full rounded-[2em] bg-container-200"></div> -->
        
        <div class="relative flex flex-col items-center text-center h-full sm:px-5 px-1">
            <div class="grid grid-cols-1 w-full justify-around">
                <h1 class="font-mono font-semibold sm:text-5xl text-3xl text-black dark:text-white" data-aos="fade-up" data-aos-duration="450">
                    FAÇA
                    <span class="text-violet-600 dark:text-violet-600 drop-shadow-[0_0_10px_#b74ae1] brightness-125">
                        PARTE</span>!
                </h1>
                <p class="font-mono my-4 sm:text-2xl text-xl font-semibold text-black dark:text-white" data-aos="fade-up" data-aos-duration="450">
                    Se está interessado em fazer parte da nossa plataforma, faça o  <a class="text-violet-600 dark:text-violet-600 drop-shadow-[0_0_10px_#b74ae1] brightness-125" href="{{ url('login') }}"> Login </a> e espere nossos administradores entrarem em contato!
                    Você pode nos mandar o que te motivou a fazer parte desse projeto entrando em contato conosco por meio do formulário <a href="{{ url('#contato') }}" class="text-violet-600 dark:text-violet-600 drop-shadow-[0_0_10px_#b74ae1] brightness-125"> abaixo </a>.
                </p>
            </div>
        </div>
    </div>

</section>

<section class="relative flex flex-col w-full justify-center items-center sm:p-12 p-5 mt-12" data-aos="fade-down" data-aos-duration="500">
  <div class="relative py-7 w-full md:max-w-[80%] lg:max-w-[60%]">
    <div class="absolute inset-y-0 top-0 w-full sm:rounded-[5em] rounded-[2rem] bg-container-800 -translate-y-16"></div>
    <div class="absolute inset-y-0 top-0 w-full sm:rounded-[5em] rounded-[2rem] bg-container-600 -translate-y-10"></div>
    <div class="absolute inset-y-0 top-0 w-full sm:rounded-[5em] rounded-[2rem] bg-container-400 -translate-y-5"></div>
    <div class="absolute inset-y-0 top-0 w-full sm:rounded-[5em] rounded-[2rem] bg-container-200"></div>

    <div class="relative flex flex-col items-center text-center h-full px-8 py-12 bg-transparent">
      <h1 class="font-mono font-semibold sm:text-5xl text-3xl text-black dark:text-white mb-8">
        ENTRE EM CONTATO
        <span class="text-violet-600 dark:text-violet-600 drop-shadow-[0_0_10px_#b74ae1] brightness-125">
          CONOSCO</span>!
      </h1>

      <form class="w-full sm:space-y-6 space-y-2">
        <div class="flex flex-col text-left">
          <label for="nome" class="font-mono sm:text-lg text-sm font-semibold text-black dark:text-white mb-2">
            Nome
          </label>
          <input
            id="nome"
            type="text"
            placeholder="Seu nome"
            class="w-full px-4 py-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-violet-500"
          />
        </div>
        <div class="flex flex-col text-left">
          <label for="email" class="font-mono sm:text-lg text-sm font-semibold text-black dark:text-white mb-2">
            Email
          </label>
          <input
            id="email"
            type="email"
            placeholder="seu@email.com"
            class="w-full px-4 py-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-violet-500"
          />
        </div>
        <div class="flex flex-col text-left">
          <label for="assunto" class="font-mono sm:text-lg text-sm font-semibold text-black dark:text-white mb-2">
            Assunto
          </label>
          <input
            id="assunto"
            type="assunto"
            placeholder="O assunto do Email"
            class="w-full px-4 py-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-violet-500"
          />
        </div>
        <div class="flex flex-col text-left">
          <label for="mensagem" class="font-mono sm:text-lg text-sm font-semibold text-black dark:text-white mb-2">
            Mensagem
          </label>
          <textarea
            id="mensagem"
            rows="4"
            placeholder="Escreva sua mensagem..."
            class="w-full px-4 py-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-violet-500 resize-none"
          ></textarea>
        </div>
        <button
          type="submit"
          class="w-full py-3 rounded-2xl bg-container-600 hover:bg-container-800 text-white font-mono text-xl font-semibold transition"
        >
          Enviar
        </button>
      </form>
    </div>
  </div>
</section>


<section id="equipe" class="relative flex-col flex w-full justify-center justify-items-center p-12">

    <div class="relative py-7 w-full items-center justify-center justify-items-center" data-aos="fade-down" data-aos-duration="300">
        <div class="relative flex flex-col items-center text-center h-full sm:px-5" data-aos="fade-down" data-aos-duration="450">
            <div class="grid grid-cols-1 w-full">
                <h1 class="font-mono font-semibold sm:text-5xl text-3xl text-black dark:text-white">
                    NOSSA
                    <span class="text-violet-600 dark:text-violet-600 drop-shadow-[0_0_10px_#b74ae1] brightness-125">
                        EQUIPE</span>
                </h1>
            </div>
        </div>
    </div>

    <div class="relative sm:p-12 p-2 mt-10 w-full lg:gap-[10%] flex items-center justify-center" data-aos="fade-down" data-aos-duration="500">
        
        <span class="hidden lg:block justify-items-center">
          <x-icon name="icon-design-game-persona-1" 
              class="sm:w-[70%] w-full h-auto hidden lg:block" />

          <!-- <div class="absolute top-[77%] left-[14%] -translate-x-[14%] -translate-y-[90%] w-1/4 h-1/4">
              <x-icon name="icon-design-gabriel" class="w-full h-full" />
              <div class="h-[80%] w-[80%] bg-black text-center items-center">Gabriel</div>
          </div>

          <div class="absolute top-[39%] left-[33%] -translate-x-[40%] -translate-y-[40%] w-[27%] h-[27%]">
              <x-icon name="icon-design-gabriel" 
                  class="w-full h-full" />
              <div class="h-[80%] w-[80%] bg-black text-center items-center">Letícia</div>
          </div>
          
          <div class="absolute top-[80%] left-[42%] -translate-x-[40%] -translate-y-[60%] w-[27%] h-[27%]">
              <x-icon name="icon-design-gabriel" 
              class="w-full h-full" />
              <div class="h-[80%] w-[80%] bg-black text-center items-center">Kami</div>
          </div> -->
        </span>

        <div class="text-center">
            <h1 class="font-mono font-semibold sm:text-5xl text-2xl text-black dark:text-white" data-aos="fade-down" data-aos-duration="500">
                Equipe de Desgin
            </h1>
            <p class="font-mono my-4 sm:text-2xl text-ms font-semibold text-black dark:text-white" data-aos="fade-down" data-aos-duration="500">
                Nossa equipe de design! Descrever integrantes
            </p>
        </div>

    </div>
        
    <div class="flex relative w-full sm:p-12 p-2 mt-10 gap-[15%] items-center justify-center sm:pl-[5%]" data-aos="fade-down" data-aos-duration="500">
        <div class="text-center sm:left-0">
            <h1 class="font-mono font-semibold sm:text-5xl text-2xl text-black dark:text-white" data-aos="fade-down" data-aos-duration="500">
                Equipe de Desenvolvimento
            </h1>
            <p class="font-mono my-4 sm:text-2xl text-ms font-semibold text-black dark:text-white" data-aos="fade-down" data-aos-duration="500">
                Nossa equipe de desenvolvimento! Descrever integrantes
            </p>
        </div>

        <span class="hidden lg:block justify-items-center">
          <x-icon name="icon-design-game-persona-2" 
              class="sm:w-[70%] w-9/12 h-auto right-0 -scale-x-100"/>

          <!-- <div class="absolute top-[45%] left-[64%] -translate-x-[40%] -translate-y-[40%] w-[30%] h-[30%]">
              <x-icon name="icon-design-gabriel" 
              class="w-full h-full" />
              <div class="h-[80%] w-[80%] bg-black text-center items-center">Barrere</div>
          </div> -->

          <!-- <div class="absolute top-[87%] left-[88%] -translate-x-[80%] -translate-y-[80%] w-[27%] h-[27%]">
              <x-icon name="icon-design-gabriel" 
              class="w-full h-full" />
              <div class="h-[80%] w-[80%] bg-black text-center items-center">Vitor</div>
          </div> -->
        </span>
    </div>
    
</section>

<section class="relative flex flex-col w-full justify-center justify-items-center items-center sm:p-12 p-5" data-aos="fade-down" data-aos-duration="500">

    <div class="flex flex-row gap-[5%] justify-items-center justify-center w-[90%] lg:w-[60%]">
        <x-icon name="icon-ufjf" class="h-20" />
        <x-icon name="icon-lapic" class="h-20" />
        <x-icon name="icon-fadepe" class="h-20"/>
        <x-icon name="icon-secretaria-educacao" class="h-20" />
    </div>

    <p class="font-mono text-sm sm:px-7 font-semibold my-5 text-center text-black lg:w-[60%] dark:text-white right-1/2 left-1/2">
            A plataforma desenvolvida no Laboratório de Aplicações e Inovação em Computação (LApIC) da UFJF,
        como parte das atividades relacionadas ao Programa de Pós-graduação em Educação Matemática.
        O projeto contou com o financiamento da Secretaria de Educação do Estado de Minas Gerais.
    </p>

</section>

</main>
    <footer class="w-full bottom-0">
        <div class="relative mt-20 w-full h-[50%] justify-items-center">
            <div class="absolute inset-y-0 top-0 w-full rounded-[3em] sm:rounded-[5em] bg-container-800 -translate-y-16"></div>
            <div class="absolute inset-y-0 top-0 w-full rounded-[3em] sm:rounded-[5em] bg-container-600 -translate-y-10"></div>
            <div class="absolute inset-y-0 top-0 w-full rounded-[3em] sm:rounded-[5em] bg-container-400 -translate-y-5"></div>
            <div class="absolute inset-y-0 top-0 w-full rounded-t-[3em] sm:rounded-t-[5em] bg-container-200"></div>
            
            <div class="relative flex sm:flex-row flex-col text-center h-full px-8 py-12 w-[90%] lg:w-[80%] bg-transparent justify-around">
                <div class="flex items-center relative">
                    <x-icon name="game-persona-logo" class="h-16 w-16 bg-transparent"/>
                    <h1 class="font-mono text-2xl font-semibold hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb] dark:text-white dark:hover:text-fuschia-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        GAME PERSONA
                    </h1>
                </div>
                <div class="flex flex-col items-center">
                    <a href="#inicio" class="font-mono font-semibold text-x1 my-[10%]
                hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb] dark:text-white dark:hover:text-fuschia-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"> 
                    Início
                    </a>
                    <a href="#sobre" class="font-mono font-semibold text-x1 my-[10%]
                    hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb] dark:text-white dark:hover:text-fuschia-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"> 
                        Sobre nós
                    </a>
                    <a href="#metodos" class="font-mono font-semibold text-x1 my-[10%]
                    hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb] dark:text-white dark:hover:text-fuschia-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"> 
                        Métodos
                    </a>
                    <a href="#equipe" class="font-mono font-semibold text-x1 my-[10%]
                    hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb] dark:text-white dark:hover:text-fuschia-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"> 
                        Nossa equipe
                    </a>
                    <a href="#contato" class="font-mono font-semibold text-x1 my-[10%]
                    hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb] dark:text-white dark:hover:text-fuschia-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"> 
                        Contato
                    </a>
                </div>
            </div>
            <div class="relative flex flex-col text-right h-full px-8 w-[90%]  lg:w-[80%] bg-transparent justify-around">
                <hr>
                <p class="flex items-center justify-start py-7 text-black dark:text-white font-mono font-semibold text-x1">
                 <span class="text-lg mr-2">©</span> GAME PERSONA. Todos os direitos reservados.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>