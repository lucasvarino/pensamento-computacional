@props(['result'])
<div class="relative bg-imersao rounded-2xl shadow-lg overflow-hidden mb-6
            h-auto sm:h-44 py-10 sm:py-0">

  <div class="absolute translate-y-12 right-16 w-60 h-60 flex items-center justify-center">
    
    <div class="absolute inset-0 bg-imersao-200 rounded-full scale-100 shadow-inner"></div>
    <div class="absolute inset-0 bg-imersao-400 rounded-full scale-75 shadow-md"></div>
    <div class="absolute inset-0 bg-imersao-600 rounded-full scale-50 shadow-sm"></div>
    
    <div class="z-10 -translate-x-4 -translate-y-4 opacity-90">
      <i class="bi bi-target text-2xl text-[#082f49]"></i>
    </div>
  </div>

    <div class="absolute left-10 top-1/2 transform -translate-y-1/2
                flex items-center justify-center z-10">
      <img  class="hidden sm:block h-20 w-auto" src="{{ asset('img/imersao.png') }}" alt="Desafios">
    </div>


<div class="relative flex flex-col items-center text-center h-full
            justify-center px-4 py-0">
  <img src="{{ asset('img/imersao.png') }}" alt="Espada Sangue imersao" class="block sm:hidden w-20 h-auto" />
  <h3 class="m-2 text-xl sm:text-3xl font-bold text-imersao-txt uppercase w-full">
    {{ $result['role'] ?? 'IMERSÃO' }}:
    {{ number_format($result['value'], 2, ',', '.') }}%
  </h3>
  <p class="text-sm font-semibold text-imersao-txt w-full sm:px-32">
    {{ $result['description'] }}
  </p>
</div>
</div>

