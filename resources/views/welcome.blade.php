<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Game Persona - A platform for gamers">
    <meta name="author" content="Your Name">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Game Persona</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .dark\:bg-dots-lighter{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")}
        .bg-dots-darker{background-image:url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")},
    </style>

<script>
    window.addEventListener("scroll", function () {
        const navbar = document.getElementById("navbar");
        if (window.scrollY > 50) {
            navbar.classList.add("shadow-md", "bg-gray-100", "bg-opacity-70" , "dark:bg-gray-900", "dark:bg-opacity-70",);
        } else {
            navbar.classList.remove("shadow-md", "bg-gray-100", "bg-opacity-70" , "dark:bg-gray-900","dark:bg-opacity-50");
        }
    });
</script>

</head>

    <body class="relative flex flex-col min-h-screen bg-center bg-gray-300 bg-dots-darker dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <header id="navbar" class="sm:fixed sm:top-0 w-full z-50">
        <div class="flex items-center text-black gap-5 mx-auto w-4/5 justify-between">
            <a href="/" class="flex text-left items-center">
                <img class="h-28 w-auto" src="img/GamePersonaLogo.png" alt="Game Persona">
                <h1 class="font-mono text-2xl font-semibold hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb] dark:text-gray-400 dark:hover:text-fuschia-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Game Persona</h1>
            </a>
            @if (Route::has('login'))
                <nav class="flex text-right items-center px-1">
                    @auth
                        <a href="{{ url('/admin') }}" class="font-mono font-semibold text-xl hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb] dark:text-gray-400 dark:hover:text-fuschia-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-mono font-semibold text-xl hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb] dark:text-gray-400 dark:hover:text-fuschia-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font-mono ml-4 font-semibold text-xl hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb] dark:text-gray-400 dark:hover:text-fuschia-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Cadastre-se</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>

    <main class="flex-grow flex flex-col justify-center justify-items-center p-6 sm:p-9 m-3 bg-center ">

        <div class="flex p-12 gap-5 w-full justify-items-center justify-center items-center">
            <div class="max-w-3xl p-16 text-center items-start justify-items-start">
                <h1 class=" font-mono font-semibold text-7xl text-left text-black dark:text-white">GAMIFICANDO <br> O 
                <span class=" font-mono font-semibold text-7xl text-left text-fuchsia-600 dark:text-fuchsia-400 drop-shadow-[0_0_10px_#eb34eb] brightness-125">APRENDIZADO </span> </h1>
                <p class="  font-mono mt-4 text-lg font-semibold text-left text-black dark:text-white">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium fugit, illum sint consequatur a facilis assumenda labore ea inventore quaerat sed ex sunt sapiente alias praesentium vero, aliquid culpa commodi animi temporibus? Sunt cumque fugiat quo laboriosam quae perferendis a amet quibusdam veritatis ipsum quasi, obcaecati eos, recusandae voluptatum consequatur?
                </p>

            </div>
            <div class="h-auto w-auto justify-center justify-items-center">
                <img class="h-auto w-auto" src="img/cerebro.png" alt="Game Persona Control">
            </div>
        </div>
        <div class="p-5 justify-items-center">
            <h1 class=" font-mono font-semibold text-5xl text-left text-black dark:text-white">O QUE É <span class="text-fuchsia-600 dark:text-fuchsia-400 hover:drop-shadow-[0_0_10px_#eb34eb] drop-shadow-[0_0_10px_#eb34eb] brightness-125 " >GAMIFICAR?</span></h1>        
        <div class="flex justify-around gap-4"> 
                <div class="flex-col justify-center justify-items-center">
                    <img class="" src="img/GamePersonaLogo.png" alt="">
                    <p class=" font-mono mt-4 text-lg font-semibold text-center text-black dark:text-white">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa iste aut error excepturi pariatur quas corrupti nisi tempore quae vel praesentium perferendis repudiandae ipsam, voluptatibus deserunt hic, cupiditate eveniet fuga!</p>
                </div>
                <div class="flex-col justify-center align-center justify-items-center">
                    <img class="" src="img/GamePersonaLogo.png" alt="">
                    <p class=" font-mono mt-4 text-lg font-semibold text-center text-black dark:text-white">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa iste aut error excepturi pariatur quas corrupti nisi tempore quae vel praesentium perferendis repudiandae ipsam, voluptatibus deserunt hic, cupiditate eveniet fuga!</p>
                </div>
                <div class="flex-col justify-center align-center justify-items-center">
                    <img class="" src="img/GamePersonaLogo.png" alt="">
                    <p class=" font-mono mt-4 text-lg font-semibold text-center text-black dark:text-white">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa iste aut error excepturi pariatur quas corrupti nisi tempore quae vel praesentium perferendis repudiandae ipsam, voluptatibus deserunt hic, cupiditate eveniet fuga!</p>
                </div>
                <div class="flex-col justify-center align-center justify-items-center">
                    <img class="" src="img/GamePersonaLogo.png" alt="">
                    <p class=" font-mono mt-4 text-lg font-semibold text-center text-black dark:text-white">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa iste aut error excepturi pariatur quas corrupti nisi tempore quae vel praesentium perferendis repudiandae ipsam, voluptatibus deserunt hic, cupiditate eveniet fuga!</p>
                </div>
            </div>
        </div>




    </main>

    <footer class="py-4">
        <div class="container mx-auto text-center">
            <a href="/" class="font-mono font-semibold text-xl text-black dark:text-white mt-4  hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb] ">Game Persona</a>
        </div>
    </footer>
</body>
</html>