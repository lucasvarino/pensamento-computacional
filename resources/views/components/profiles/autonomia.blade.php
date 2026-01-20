@props(['result'])
<div class="relative bg-autonomia rounded-2xl shadow-lg overflow-hidden mb-6
            h-auto sm:h-44 py-10 sm:py-0">

  <div class="absolute -top-24 -right-12 w-60 h-60 flex items-center justify-center">
    
    <div class="absolute inset-0 bg-autonomia-600 rounded-full scale-100 shadow-inner"></div>
    <div class="absolute inset-0 bg-autonomia-400 rounded-full scale-75 shadow-md"></div>
    <div class="absolute inset-0 bg-autonomia-200 rounded-full scale-50 shadow-sm"></div>
    
  </div>

    <div class="absolute left-8 top-1/2 transform -translate-y-1/2
               flex items-center justify-center z-10">
      <img  class="hidden sm:block h-20 w-auto" src="{{ asset('img/autonomia.png') }}" alt="Desafios">
    </div>


<div class="relative flex flex-col items-center text-center h-full
            justify-center px-4 py-0">
  <img src="{{ asset('img/autonomia2.png') }}" alt="Espada Sangue autonomia" class="block sm:hidden w-20 h-auto" />
  <h3 class="m-2 text-xl sm:text-3xl font-bold text-autonomia-txt uppercase w-full">
    {{ $result['role'] ?? 'AUTONOMIA' }}:
    {{ number_format($result['value'], 2, ',', '.') }}%
  </h3>
  <p class="text-sm font-semibold text-autonomia-txt w-full sm:px-32">
    {{ $result['description'] }}
  </p>
</div>
</div>

