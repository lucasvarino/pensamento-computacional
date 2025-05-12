@props(['result'])
<div class="relative bg-explorador rounded-2xl shadow-lg overflow-hidden mb-6
            h-auto sm:h-44 py-8 sm:py-0">

  <div
  class="hidden sm:block absolute inset-y-0 left-10
         w-full sm:w-64
         h-full
         bg-gradient-to-l from-transparent to-yellow-300/70
         pointer-events-none
         [clip-path:polygon(100%_0%,0%_50%,100%_100%)]"
  ></div>

  <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-40 h-40 flex items-center justify-center">
  <x-icon name="lanterna" class="class= hidden sm:block w-36 h-36"/>
  </div>
  <img src="{{ asset('img/tocha.png') }}" alt="Tocha" class="hidden sm:block absolute w-20 h-20 top-0 right-0" />



  <div class="relative flex flex-col items-center text-center h-full
            justify-center px-4 py-0">
      <img src="{{ asset('img/tocha.png') }}" alt="Tocha" class="block sm:hidden w-28 h-28" />
      <h3 class="m-2 text-xl sm:text-3xl font-bold text-explorador-txt uppercase w-full">
        {{ $result['role'] ?? 'EXPLORADOR' }}:
        {{ number_format($result['value'], 2, ',', '.') }}%
      </h3>
      <p class="text-sm font-semibold text-explorador-txt w-full sm:px-32">
        {{ $result['description'] }}
      </p>
  </div>
</div>
