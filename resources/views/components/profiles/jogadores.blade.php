@props(['result'])
<div class="relative bg-jogador rounded-2xl shadow-lg overflow-hidden mb-6
            h-auto sm:h-40 py-8 sm:py-0">
    <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-40 h-40 flex items-center justify-center">
      <x-icon name="botoes" class="hidden sm:block w-24 h-24"/>
    </div>

    <div class="absolute bottom-0 flex justify-center h-full w-full z-0">
  <svg
      class="hidden sm:block absolute"
      width="256" height="256"
      viewBox="0 0 256 256"
      xmlns="http://www.w3.org/2000/svg"
      >
      <circle cx="128" cy="150" r="108" fill="#6242b4" />
      <circle cx="128" cy="150" r="72" fill="#5335a4" />
      <circle cx="128" cy="150" r="36" fill="#472997" />
    </svg>
      <div class="hidden sm:block absolute bottom-0">
        <x-icon name="manete" class="w-16 h-16"/>
      </div>
    </div>

    <div class="absolute bottom-0 right-0
                sm:w-40 sm:h-40 flex items-center justify-center">
    <svg
      class="block sm:hidden absolute"
      width="256" height="256"
      viewBox="0 0 256 256"
      xmlns="http://www.w3.org/2000/svg"
    >
      <circle cx="128" cy="128" r="108" fill="#6242b4" />
      <circle cx="128" cy="128" r="72" fill="#5335a4" />
      <circle cx="128" cy="128" r="36" fill="#472997" />
    </svg>
    </div>
    
    <div class="relative flex flex-col items-center text-center h-full
            justify-center px-4 py-0">
            <img src="{{ asset('img/botoes.png') }}" alt="Botões" class="block sm:hidden w-20 h-20" />
            <h3 class="m-2 text-xl sm:text-3xl font-bold text-jogador-txt uppercase w-full">
      {{ $result['role'] ?? 'JOGADOR' }}: {{ number_format($result['value'], 2, ',', '.') }}%
    </h3>
    <p class="text-sm font-semibold text-jogador-txt w-full sm:px-32">
      {{ $result['description'] }}
    </p>
  </div>

</div>
