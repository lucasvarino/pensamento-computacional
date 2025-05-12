@props(['result'])

<div class="relative bg-espirito-livre rounded-2xl shadow-lg overflow-hidden mb-6
            h-auto sm:h-40 py-8 sm:py-0">
  
  <div class="ml-48 absolute bottom-0 flex justify-center h-full w-full z-0">
  <svg
      class="hidden sm:block absolute"
      width="256" height="256"
      viewBox="0 0 256 256"
      xmlns="http://www.w3.org/2000/svg"
      >
      <circle cx="128" cy="150" r="120" fill="#088675" />
      <circle cx="128" cy="150" r="90" fill="#1bcba3" />
      <circle cx="128" cy="150" r="60" fill="#7df2ca" />
      <circle cx="128" cy="150" r="30" fill="#98ffdc" />
    </svg>
      <div class="hidden sm:block absolute bottom-0">
        <img src="{{ asset('img/lamparina.png') }}" alt="Lamparina" class="w-16 h-16" />
      </div>
    </div>

    <div class="absolute bottom-0 left-0
                sm:w-40 sm:h-40 flex items-center justify-center">
    <svg
      class="block sm:hidden absolute"
      width="256" height="256"
      viewBox="0 0 256 256"
      xmlns="http://www.w3.org/2000/svg"
    >
      <circle cx="128" cy="128" r="128" fill="#088675" />
      <circle cx="128" cy="128" r="96" fill="#1bcba3" />
      <circle cx="128" cy="128" r="64" fill="#7df2ca" />
      <circle cx="128" cy="128" r="32" fill="#98ffdc" />
    </svg>
    </div>
    
  <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-40 h-40 flex items-center justify-center">
    <img src="{{ asset('img/borboleta.png') }}" alt="Borboleta" class="hidden sm:block w-24 h-24" />
  </div>
  
  <div class="relative flex flex-col items-center text-center h-full
            justify-center px-4 py-0">
    <img src="{{ asset('img/borboleta.png') }}" alt="Borboleta" class="block sm:hidden w-20 h-20" />
    <h3 class="m-2 text-xl sm:text-3xl font-bold text-espirito-livre-txt uppercase w-full">
    {{ $result['role'] ?? 'ESPÍRITO LIVRE' }}:
    {{ number_format($result['value'], 2, ',', '.') }}%
    </h3>
    <p class="text-sm font-semibold text-espirito-livre-txt w-full sm:px-32">
      {{ $result['description'] }}
    </p>
  </div>

</div>

<!--
@props(['result'])

<div class="relative bg-espirito-livre rounded-2xl shadow-lg overflow-hidden mb-6">
    {{-- Ícone da borboleta à esquerda --}}
    <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-40 h-40 flex items-center justify-center z-0">
      <x-heroicon-o-bug-ant class="w-12 h-12 text-teal-500 opacity-60"/> {{-- Substitua por borboleta se tiver --}}
    </div>

    <div class="relative flex flex-col items-center justify-center py-12 px-8 z-10">
    <h3 class="text-3xl font-bold text-espirito-livre-txt uppercase">
      {{ $result['role'] ?? 'ESPÍRITO LIVRE' }}: {{ number_format($result['value'], 2, ',', '.') }}%
    </h3>
    <p class="mt-2 text-sm text-white/90 text-center">
      {{ $result['description'] }}
    </p>
  </div>

  <div class="right-8 flex items-end justify-end z-0">
    <div class="absolute flex right-8 items-center justify-center">
      <svg
      class="absolute z-0"
      width="256" height="256"
      viewBox="0 0 256 256"
      xmlns="http://www.w3.org/2000/svg"
      >
      <circle cx="128" cy="128" r="128" fill="#088675" />
      <circle cx="128" cy="128" r="96" fill="#1bcba3" />
      <circle cx="128" cy="128" r="64" fill="#7df2ca" />
      <circle cx="128" cy="128" r="32" fill="#98ffdc" />
    </svg>
    <x-heroicon-o-light-bulb class="w-10 h-10 text-white z-0" />
    </div>
  </div>

</div>
-->