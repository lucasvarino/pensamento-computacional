<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    {{-- <div class="flex justify-center">
        <a href="{{ url('auth/google') }}" class="inline-flex items-center px-4 py-2 dark:bg-gray-800 border border-transparent rounded-full font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
            <svg class="fill-current w-4 h-4 mr-2" viewBox="0 0 533.5 544.3" xmlns="http://www.w3.org/2000/svg">
                <path d="M533.5 278.4c0-18.5-1.5-37.1-4.7-55.3H272.1v104.8h147c-6.1 33.8-25.7 63.7-54.4 82.7v68h87.7c51.5-47.4 81.1-117.4 81.1-200.2z" fill="#4285f4"/>
                <path d="M272.1 544.3c73.4 0 135.3-24.1 180.4-65.7l-87.7-68c-24.4 16.6-55.9 26-92.6 26-71 0-131.2-47.9-152.8-112.3H28.9v70.1c46.2 91.9 140.3 149.9 243.2 149.9z" fill="#34a853"/>                        <path d="M119.3 324.3c-11.4-33.8-11.4-70.4 0-104.2V150H28.9c-38.6 76.9-38.6 167.5 0 244.4l90.4-70.1z" fill="#fbbc04"/>                        <path d="M272.1 107.7c38.8-.6 76.3 14 104.4 40.8l77.7-77.7C405 24.6 339.7-.8 272.1 0 169.2 0 75.1 58 28.9 150l90.4 70.1c21.5-64.5 81.8-112.4 152.8-112.4z" fill="#ea4335"/>
            </svg>
            <span class="ml-4">Entrar com o Google</span>
        </a>
    </div> --}}

    <section class="relative flex flex-col w-full justify-center items-center sm:p-12 p-5 mt-12" data-aos="fade-down" data-aos-duration="500">
  <div class="relative py-7 w-full md:max-w-[80%] lg:max-w-[60%]">
    <div class="absolute inset-y-0 top-0 w-full sm:rounded-[5em] rounded-[2rem] bg-container-800 -translate-y-16"></div>
    <div class="absolute inset-y-0 top-0 w-full sm:rounded-[5em] rounded-[2rem] bg-container-600 -translate-y-10"></div>
    <div class="absolute inset-y-0 top-0 w-full sm:rounded-[5em] rounded-[2rem] bg-container-400 -translate-y-5"></div>
    <div class="absolute inset-y-0 top-0 w-full sm:rounded-[5em] rounded-[2rem] bg-container-200"></div>

    <div class="relative flex flex-col items-center text-center h-full px-8 py-12 bg-transparent">
      <h1 class="font-mono font-semibold sm:text-5xl text-3xl text-black dark:text-white mb-8">
        FAÇA O SEU
        <span class="text-violet-600 dark:text-violet-600 drop-shadow-[0_0_10px_#b74ae1] brightness-125">
          LOGIN</span>!
      </h1>
    
      <div class="w-full sm:max-w-md mt-6 px-6 py-4 dark:bg-white bg-gray-800 text-black dark:text-white shadow-md overflow-hidden sm:rounded-lg">
              <a href="{{ url('auth/google') }}" class="inline-flex items-center px-4 py-2 dark:bg-gray-800 border border-transparent rounded-full font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
            <svg class="fill-current w-4 h-4 mr-2" viewBox="0 0 533.5 544.3" xmlns="http://www.w3.org/2000/svg">
                <path d="M533.5 278.4c0-18.5-1.5-37.1-4.7-55.3H272.1v104.8h147c-6.1 33.8-25.7 63.7-54.4 82.7v68h87.7c51.5-47.4 81.1-117.4 81.1-200.2z" fill="#4285f4"/>
                <path d="M272.1 544.3c73.4 0 135.3-24.1 180.4-65.7l-87.7-68c-24.4 16.6-55.9 26-92.6 26-71 0-131.2-47.9-152.8-112.3H28.9v70.1c46.2 91.9 140.3 149.9 243.2 149.9z" fill="#34a853"/>                        <path d="M119.3 324.3c-11.4-33.8-11.4-70.4 0-104.2V150H28.9c-38.6 76.9-38.6 167.5 0 244.4l90.4-70.1z" fill="#fbbc04"/>                        <path d="M272.1 107.7c38.8-.6 76.3 14 104.4 40.8l77.7-77.7C405 24.6 339.7-.8 272.1 0 169.2 0 75.1 58 28.9 150l90.4 70.1c21.5-64.5 81.8-112.4 152.8-112.4z" fill="#ea4335"/>
            </svg>
            <span class="ml-4">Entrar com o Google</span>
        </a>
            </div>
    </div>
  </div>
</section>
</x-guest-layout>