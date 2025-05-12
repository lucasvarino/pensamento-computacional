@props(['result'])
<div class="relative bg-assassino rounded-2xl shadow-lg overflow-visible mb-6
            mx-0 h-auto sm:h-48 py-8 sm:py-0">

    <div class="absolute left-0 top-1/2 transform -translate-y-1/2
        w-40 h-40 flex items-center justify-center z-10">
        <x-icon name="espadas" class="hidden sm:block h-36 w-36 text-white"/>
    </div>
        
    <div
        class="hidden sm:block
        absolute left-0 top-1/2
        transform -translate-y-1/2 -translate-x-full
        z-10 mx-0"
        >
        <img src="{{ asset('img/espada-dir.png') }}" alt="Espada Sangue Assassino" class="w-16 h-16" />
      </div>
        
    <div
    class="hidden sm:block
    absolute right-0 top-1/2
    transform -translate-y-1/2 translate-x-full
    z-10 mx-0"
    >
      <img src="{{ asset('img/espada-esq.png') }}" alt="Espada Sangue Assassino" class="w-16 h-16" />
    </div>

  <div class="relative flex flex-col items-center text-center h-full
              justify-center px-4 py-0">
    <img src="{{ asset('img/espadas.png') }}" alt="Espada Sangue Assassino" class="block sm:hidden w-28 h-28" />
    <h3 class="m-2 text-xl sm:text-3xl font-bold text-assassino-txt uppercase w-full">
      {{ $result['role'] ?? 'ASSASSINO' }}:
      {{ number_format($result['value'], 2, ',', '.') }}%
    </h3>
    <p class="text-sm font-semibold text-assassino-txt w-full sm:px-32">
      {{ $result['description'] }}
    </p>
  </div>
</div>
