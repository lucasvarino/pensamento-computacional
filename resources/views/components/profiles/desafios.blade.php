@props(['result'])
<div class="relative bg-desafios rounded-2xl shadow-lg overflow-hidden mb-6
            h-auto sm:h-44 py-10 sm:py-0">

  <div class="absolute -left-10 -top-8 flex h-60 w-60 items-center justify-center">
    <div class="absolute inset-0 scale-100 rounded-full bg-desafios-200 shadow-inner"></div>
    <div class="absolute inset-0 scale-75 rounded-full bg-desafios-400 shadow-md"></div>
    <div class="absolute inset-0 scale-50 rounded-full bg-desafios-600 shadow-sm"></div>

    <div class="-translate-x- -translate-y- z-10 opacity-90">
      <i class="bi bi-fire text-4xl text-[#450a0a]"></i>
    </div>
  </div>

    <div class="absolute left-10 top-1/2 transform -translate-y-1/2
                flex items-center justify-center z-10">
      <img  class="hidden sm:block h-24 w-auto" src="{{ asset('img/desafio.png') }}" alt="Desafios">
    </div>

  <div class="relative flex flex-col items-center text-center h-full
            justify-center px-4 py-0">
    <img src="{{ asset('img/desafio.png') }}" alt="Espada Sangue desafios" class="block sm:hidden w-20 h-auto" />
      <h3 class="m-2 text-xl sm:text-3xl font-bold text-desafios-txt uppercase w-full">
        {{ $result['role'] ?? 'DESAFIOS' }}:
        {{ number_format($result['value'], 2, ',', '.') }}%
      </h3>
    <p class="text-sm font-semibold text-desafios-txt w-full sm:px-32">
      {{ $result['description'] }}
    </p>
</div>
</div>

