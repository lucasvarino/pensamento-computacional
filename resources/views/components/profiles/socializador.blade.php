@props(['result'])

<div class="relative bg-socializador rounded-2xl shadow-lg overflow-hidden mb-6
            h-auto sm:h-44 py-8 sm:py-0">
  <svg
    class="absolute -right-40 top-1/2 transform -translate-y-1/2"
    width="300" height="300"
    viewBox="0 0 300 300"
    xmlns="http://www.w3.org/2000/svg"
  >
    <circle cx="150" cy="150" r="150" fill="#0098e1" />
    <circle cx="150" cy="150" r="110" fill="#0085c2" />
    <circle cx="150" cy="150" r="70" fill="#0074a1" />
  </svg>
  
  <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-40 h-40 flex items-center justify-center">
    <x-icon name="maos" class="hidden sm:block w-24 h-24"/>
  </div>
  
  <div class="absolute inset-0 flex items-center justify-end z-10">
    <x-icon name="megafone" class="hidden sm:block w-16 h-16 transform translate-x-1"/>
  </div>

  <div class="relative flex flex-col items-center text-center h-full
            justify-center px-4 py-0 z-20">
    <img src="{{ asset('img/megafone.png') }}" alt="Espada Sangue Assassino" class="block sm:hidden w-20 h-20" />
    <h3 class="m-2 text-xl sm:text-3xl font-bold text-socializador-txt uppercase w-full">
      {{ $result['role'] ?? 'SOCIALIZADOR' }}:
      {{ number_format($result['value'], 2, ',', '.') }}%
    </h3>
    <p class="text-sm font-semibold text-socializador-txt w-full sm:px-32">
      {{ $result['description'] ?? '' }}
    </p>
  </div>
</div>