<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Game Persona</title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />

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
    to-bg-grad-r">
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
                        -->
                    @endauth
                </nav>
            @endif
        </div>
    </header>

<main class="flex flex-col items-center pt-9 overflow-hidden">

  <section id="inicio" class="relative flex pt-28 pl-12 gap-5 w-full justify-center items-center">
    <div class="w-1/2 p-16 text-left">
      <h1 class="font-mono font-semibold text-7xl text-black dark:text-white" data-aos="fade-up" data-aos-duration="500" >
        GAMIFICANDO<br>O
        <span class="text-violet-600 dark:text-violet-500 drop-shadow-[0_0_10px_#b74ae1] brightness-125">
        APRENDIZADO</span>.
      </h1>
      <p class="font-mono my-4 text-2xl font-semibold text-black dark:text-white" data-aos="fade-up" data-aos-duration="550">
        Utilizando o Game Persona, é possível identificar os perfis de pessoas para personalizar
        estratégias de engajamento que atendam às necessidades individuais de cada um!
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
    <div class="relative h-[450px] w-1/2 translate-x-5" data-aos="fade-left" data-aos-duration="600">
        <div class="absolute inset-0 rounded-[5em] bg-container-800 -translate-x-16"></div>
        <div class="absolute inset-0 rounded-[5em] bg-container-600 -translate-x-11"></div>
        <div class="absolute inset-0 rounded-[5em] bg-container-400 -translate-x-6"></div>
        <div class="absolute inset-0 rounded-s-[5em] bg-container-200 -translate-x-1"> formulando alguma imagem (quase pronta) </div>
    </div>
  </section>

  <section id="sobre" class="relative flex py-12 w-full">
  <div class="flex pt-16">
    <div class="relative w-4/5 py-7">
      <div class="absolute inset-y-0 left-0 w-4/5 rounded-[5em] bg-container-800 translate-x-24"></div>
      <div class="absolute inset-y-0 left-0 w-4/5 rounded-[5em] bg-container-600 translate-x-16"></div>
      <div class="absolute inset-y-0 left-0 w-4/5 rounded-[5em] bg-container-400 translate-x-7"></div>
      <div class="absolute inset-y-0 left-0 w-4/5 rounded-e-[5em] bg-container-200 -translate-x-3"></div>
      <div class="relative flex flex-col items-center w-4/5 h-full">
      <div class="flex w-full justify-center">
        <h1 class="font-mono font-semibold text-5xl text-black dark:text-white" data-aos="fade-up" data-aos-duration="600">
            O QUE 
            <span class="text-violet-600 dark:text-violet-600 drop-shadow-[0_0_10px_#b74ae1] brightness-125">
          FAZEMOS</span>?
        </h1>
      </div>
        <div class="px-10 grid grid-cols-1 text-left">

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
    </section>

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

<section id="metodos" class="relative flex-col flex w-full justify-center justify-items-center p-12">

    <div class="relative py-7 w-full items-center justify-center justify-items-center">
        <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-800 translate-y-6"></div>
        <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-600 translate-y-4"></div>
        <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-400 translate-y-2"></div>
        <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-200" data-aos="fade-up" data-aos-duration="200"></div>
        
        <div class="relative flex flex-col items-center text-center h-full">
            <div class="grid grid-cols-1 w-full">
                <h1 class="font-mono font-semibold text-5xl text-black dark:text-white" data-aos="fade-up" data-aos-duration="450">
                    TESTE DE
                    <span class="text-violet-600 dark:text-violet-600 drop-shadow-[0_0_10px_#b74ae1] brightness-125">
                        BARTLE</span>
                </h1>
                <p class="font-mono my-4 text-2xl font-semibold text-black dark:text-white" data-aos="fade-up" data-aos-duration="450">
                    Para o teste de Bartle, temos os seguintes resultados: <br> (descrever cada um)
                </p>
            </div>
        </div>
    </div>

<div class="pt-20 grid grid-cols-4 gap-4 text-center">

    <div class="relative w-full h-64" data-aos="fade-up" data-aos-duration="400">
      <div class="absolute inset-0 rounded-[5em] bg-socializador-600 translate-y-4"></div>
      <div class="absolute inset-0 rounded-[5em] bg-socializador-400 translate-y-2"></div>
      <div class="absolute inset-0 rounded-[5em] bg-socializador-200"></div>
      <div class="relative flex items-center justify-center h-full">
        <span class="font-mono text-xl font-semibold dark:text-white text-socializador-txt">Socializador</span>
      </div>
    </div>

    <div class="relative w-full h-64" data-aos="fade-up" data-aos-duration="500">
    <div class="absolute inset-0 rounded-[5em] bg-explorador-600 translate-y-4"></div>
    <div class="absolute inset-0 rounded-[5em] bg-explorador-400 translate-y-2"></div>
    <div class="absolute inset-0 rounded-[5em] bg-explorador-200"></div>
    <div class="relative flex items-center justify-center h-full">
      <span class="font-mono text-xl font-semibold dark:text-white text-explorador-txt-txt">Explorador</span>
    </div>
  </div>

  <div class="relative w-full h-64" data-aos="fade-up" data-aos-duration="600">
    <div class="absolute inset-0 rounded-[5em] bg-conquistador-800 translate-y-4"></div>
    <div class="absolute inset-0 rounded-[5em] bg-conquistador-600 translate-y-2"></div>
    <div class="absolute inset-0 rounded-[5em] bg-conquistador-400"></div>
    <div class="relative flex items-center justify-center h-full">
      <span class="font-mono text-xl font-semibold dark:text-white text-conquistador-txt-txt">Empreendedor</span>
    </div>
  </div>

  <div class="relative w-full h-64" data-aos="fade-up" data-aos-duration="700">
    <div class="absolute inset-0 rounded-[5em] bg-assassino-600 translate-y-4"></div>
    <div class="absolute inset-0 rounded-[5em] bg-assassino-400 translate-y-2"></div>
    <div class="absolute inset-0 rounded-[5em] bg-assassino-200"></div>
    <div class="relative flex items-center justify-center h-full">
      <span class="font-mono text-xl font-semibold dark:text-white text-assassino-txt">Assassino</span>
    </div>
  </div>

</div>
  
</section>

<section class="relative flex-col flex w-full justify-center justify-items-center p-12">
        
    <div class="relative py-7 mb-16 w-full items-center justify-center justify-items-center" data-aos="fade-up" data-aos-duration="200">
        <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-800 translate-y-6"></div>
        <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-600 translate-y-4"></div>
        <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-400 translate-y-2"></div>
        <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-200"></div>
        
        <div class="relative flex flex-col items-center text-center h-full px-5">
            <div class="grid grid-cols-1 w-full justify-around">
                <h1 class="font-mono font-semibold text-5xl text-black dark:text-white" data-aos="fade-up" data-aos-duration="450">
                    TESTE
                    <span class="text-violet-600 dark:text-violet-600 drop-shadow-[0_0_10px_#b74ae1] brightness-125">
                        HEXAD</span>
                </h1>
                <p class="font-mono my-4 text-2xl font-semibold text-black dark:text-white" data-aos="fade-up" data-aos-duration="450">
                    Para o teste HEXAD, temos os seguintes resultados: <br> (descrever cada um)
                </p>
            </div>
        </div>
    </div>

<div class="pt-10 grid grid-cols-3 gap-16 text-center">

    <div class="relative w-full h-64" data-aos="fade-up" data-aos-duration="500">
      <div class="absolute inset-0 rounded-[5em] bg-jogador-600 translate-y-4"></div>
      <div class="absolute inset-0 rounded-[5em] bg-jogador-400 translate-y-2"></div>
      <div class="absolute inset-0 rounded-[5em] bg-jogador-200"></div>
      <div class="relative flex items-center justify-center h-full">
        <span class="font-mono text-xl font-semibold dark:text-white text-jogador-txt">Jogador</span>
      </div>
    </div>

    <div class="relative w-full h-64" data-aos="fade-up" data-aos-duration="700">
    <div class="absolute inset-0 rounded-[5em] bg-espirito-livre-800 translate-y-4"></div>
    <div class="absolute inset-0 rounded-[5em] bg-espirito-livre-600 translate-y-2"></div>
    <div class="absolute inset-0 rounded-[5em] bg-espirito-livre-400"></div>
    <div class="relative flex items-center justify-center h-full">
      <span class="font-mono text-xl font-semibold dark:text-white text-espirito-livre-txt">Espírito Lívre</span>
    </div>
  </div>

  <div class="relative w-full h-64" data-aos="fade-up" data-aos-duration="900">
    <div class="absolute inset-0 rounded-[5em] bg-filantropo-800 translate-y-4"></div>
    <div class="absolute inset-0 rounded-[5em] bg-filantropo-600 translate-y-2"></div>
    <div class="absolute inset-0 rounded-[5em] bg-filantropo-400"></div>
    <div class="relative flex items-center justify-center h-full">
      <span class="font-mono text-xl font-semibold dark:text-white text-filantropo-txt">Filantropo</span>
    </div>
  </div>

  <div class="relative w-full h-64" data-aos="fade-up" data-aos-duration="500">
    <div class="absolute inset-0 rounded-[5em] bg-conquistador-800 translate-y-4"></div>
    <div class="absolute inset-0 rounded-[5em] bg-conquistador-600 translate-y-2"></div>
    <div class="absolute inset-0 rounded-[5em] bg-conquistador-400"></div>
    <div class="relative flex items-center justify-center h-full">
      <span class="font-mono text-xl font-semibold dark:text-white text-conquistador-txt">Conquistador</span>
    </div>
  </div>

  <div class="relative w-full h-64" data-aos="fade-up" data-aos-duration="700">
    <div class="absolute inset-0 rounded-[5em] bg-socializador-600 translate-y-4"></div>
    <div class="absolute inset-0 rounded-[5em] bg-socializador-400 translate-y-2"></div>
    <div class="absolute inset-0 rounded-[5em] bg-socializador-200"></div>
    <div class="relative flex items-center justify-center h-full">
      <span class="font-mono text-xl font-semibold dark:text-white text-socializador-txt">Socializador</span>
    </div>
  </div>

  <div class="relative w-full h-64" data-aos="fade-up" data-aos-duration="900">
    <div class="absolute inset-0 rounded-[5em] bg-disruptor-600 translate-y-4"></div>
    <div class="absolute inset-0 rounded-[5em] bg-disruptor-400 translate-y-2"></div>
    <div class="absolute inset-0 rounded-[5em] bg-disruptor-200"></div>
    <div class="relative flex items-center justify-center h-full">
      <span class="font-mono text-xl font-semibold dark:text-white text-disruptor-txt">Disruptor</span>
    </div>
  </div>

</div>
  
</section>

<section id="equipe" class="relative flex-col flex w-full justify-center justify-items-center p-12">

    <div class="relative py-7 w-full items-center justify-center justify-items-center" data-aos="fade-down" data-aos-duration="300">
        <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-800 -translate-y-6"></div>
        <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-600 -translate-y-4"></div>
        <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-400 -translate-y-2"></div>
        <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-200"></div>
        
        <div class="relative flex flex-col items-center text-center h-full px-5" data-aos="fade-down" data-aos-duration="450">
            <div class="grid grid-cols-1 w-full">
                <h1 class="font-mono font-semibold text-5xl text-black dark:text-white">
                    NOSSA
                    <span class="text-violet-600 dark:text-violet-600 drop-shadow-[0_0_10px_#b74ae1] brightness-125">
                        EQUIPE</span>
                </h1>
            </div>
        </div>
    </div>

    <div class="relative p-12 mt-10 w-full gap-[10%] flex items-center" data-aos="fade-down" data-aos-duration="500">
        <x-icon name="icon-design-game-persona-1" 
            class="sm:h-3/5 sm:w-3/5 w-full h-auto" />

        <div class="absolute top-[77%] left-[14%] -translate-x-[14%] -translate-y-[90%] w-1/4 h-1/4">
            <!-- <x-icon name="icon-design-gabriel" class="w-full h-full" /> -->
             <div class="h-[80%] w-[80%] bg-black text-center items-center">Gabriel</div>
        </div>

        <div class="absolute top-[39%] left-[33%] -translate-x-[40%] -translate-y-[40%] w-[27%] h-[27%]">
            <!-- <x-icon name="icon-design-gabriel" 
                class="w-full h-full" /> -->
            <div class="h-[80%] w-[80%] bg-black text-center items-center">Letícia</div>
        </div>
        
        <div class="absolute top-[80%] left-[42%] -translate-x-[40%] -translate-y-[60%] w-[27%] h-[27%]">
            <!-- <x-icon name="icon-design-gabriel" 
            class="w-full h-full" /> -->
            <div class="h-[80%] w-[80%] bg-black text-center items-center">Kami</div>
        </div>

        <div class="text-center">
            <h1 class="font-mono font-semibold text-5xl text-black dark:text-white" data-aos="fade-down" data-aos-duration="500">
                Equipe de Desgin
            </h1>
            <p class="font-mono my-4 text-2xl font-semibold text-black dark:text-white" data-aos="fade-down" data-aos-duration="500">
                Nossa equipe de design! Descrever integrantes
            </p>
        </div>

    </div>
        
    <div class="flex relative w-full p-12 mt-10 gap-[15%] items-center pl-[5%]" data-aos="fade-down" data-aos-duration="500">
        <div class="text-center left-0">
            <h1 class="font-mono font-semibold text-5xl text-black dark:text-white" data-aos="fade-down" data-aos-duration="500">
                Equipe de Desenvolvimento
            </h1>
            <p class="font-mono my-4 text-2xl font-semibold text-black dark:text-white" data-aos="fade-down" data-aos-duration="500">
                Nossa equipe de desenvolvimento! Descrever integrantes
            </p>
        </div>

        <x-icon name="icon-design-game-persona-2" 
            class="sm:h-3/5 sm:w-3/5 w-9/12 h-auto right-0 -scale-x-100"/>

        <div class="absolute top-[45%] left-[64%] -translate-x-[40%] -translate-y-[40%] w-[30%] h-[30%]">
            <!-- <x-icon name="icon-design-gabriel" 
            class="w-full h-full" /> -->
            <div class="h-[80%] w-[80%] bg-black text-center items-center">Barrere</div>
        </div>

        <div class="absolute top-[87%] left-[88%] -translate-x-[80%] -translate-y-[80%] w-[27%] h-[27%]">
            <!-- <x-icon name="icon-design-gabriel" 
            class="w-full h-full" /> -->
            <div class="h-[80%] w-[80%] bg-black text-center items-center">Vitor</div>
        </div>
    </div>
    
</section>

<section id="contato" class="relative flex flex-col w-full justify-center items-center p-12" data-aos="fade-down" data-aos-duration="500">
  <div class="relative py-7 w-full max-w-[60%]">
    <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-800 -translate-y-16"></div>
    <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-600 -translate-y-10"></div>
    <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-400 -translate-y-5"></div>
    <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-200"></div>

    <div class="relative flex flex-col items-center text-center h-full px-8 py-12 bg-transparent">
      <h1 class="font-mono font-semibold text-5xl text-black dark:text-white mb-8">
        ENTRE EM CONTATO
        <span class="text-violet-600 dark:text-violet-600 drop-shadow-[0_0_10px_#b74ae1] brightness-125">
          CONOSCO</span>!
      </h1>

      <form class="w-full space-y-6">
        <div class="flex flex-col text-left">
          <label for="nome" class="font-mono text-lg font-semibold text-black dark:text-white mb-2">
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
          <label for="email" class="font-mono text-lg font-semibold text-black dark:text-white mb-2">
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
          <label for="assunto" class="font-mono text-lg font-semibold text-black dark:text-white mb-2">
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
          <label for="mensagem" class="font-mono text-lg font-semibold text-black dark:text-white mb-2">
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

<section class="relative flex flex-col w-full justify-center justify-items-center items-center p-12" data-aos="fade-down" data-aos-duration="500">

    <div class="flex flex-row gap-[5%] justify-items-center justify-center w-[60%]">
        <x-icon name="icon-ufjf" class="h-20" />
        <x-icon name="icon-lapic" class="h-20" />
        <x-icon name="icon-fadepe" class="h-20"/>
    </div>

    <p class="font-mono text-xs px-7 font-semibold my-5 text-center text-black w-[60%] dark:text-white right-1/2 left-1/2">
            A plataforma desenvolvida no Laboratório de Aplicações e Inovação em Computação (LApIC) da UFJF,
        como parte das atividades relacionadas ao Programa de Pós-graduação em Educação Matemática.
        O projeto contou com o financiamento da Secretaria de Educação do Estado de Minas Gerais.
    </p>

</section>

</main>
    <footer class="w-full bottom-0">
        <div class="relative mt-20 w-full h-[50%] justify-items-center">
            <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-800 -translate-y-16"></div>
            <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-600 -translate-y-10"></div>
            <div class="absolute inset-y-0 top-0 w-full rounded-[5em] bg-container-400 -translate-y-5"></div>
            <div class="absolute inset-y-0 top-0 w-full rounded-t-[5em] bg-container-200"></div>
            
            <div class="relative flex flex-row text-center h-full px-8 py-12 w-[80%] bg-transparent justify-around">
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
            <div class="relative flex flex-col text-right h-full px-8 w-[80%] bg-transparent justify-around">
                <hr>
                <p class="flex items-center justify-start py-7 text-black dark:text-white font-mono font-semibold text-x1">
                 <span class="text-lg mr-2">©</span> GAME PERSONA. Todos os direitos reservados.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>