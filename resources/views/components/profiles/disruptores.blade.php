@props(['result'])
<div class="relative bg-disruptor rounded-2xl shadow-lg overflow-hidden mb-6
            h-auto sm:h-40 py-8 sm:py-0">
    <svg
    class="hidden sm:block absolute -left-16 sm:-left-0 top-1/2 transform -translate-y-1/2"
    width="256" height="256"
    viewBox="50 0 256 256"
    xmlns="http://www.w3.org/2000/svg"
  >
    <circle cx="128" cy="128" r="128" fill="#973459" />
    <circle cx="128" cy="128" r="96" fill="#a23967" />
    <circle cx="128" cy="128" r="64" fill="#bd4984" />
    <circle cx="128" cy="128" r="32" fill="#ce599b" />
  </svg>
  
  
  <div class="absolute top-1/2 transform -translate-y-1/2
  sm:w-40 sm:h-40 flex items-center justify-center">
  <svg
    class="block sm:hidden absolute"
    width="256" height="256"
    viewBox="0 0 256 256"
    xmlns="http://www.w3.org/2000/svg"
  >
    <circle cx="128" cy="128" r="128" fill="#ce599b" />
    <circle cx="128" cy="128" r="96" fill="#bd4984" />
    <circle cx="128" cy="128" r="64" fill="#a23967" />
    <circle cx="128" cy="128" r="32" fill="#973459" />
  </svg>
    <x-icon name="bomba" class="hidden sm:block w-20 h-20 sm:left-0"/>
  </div>
  <div class="relative flex flex-col items-center text-center h-full
            justify-center px-4 py-0">
            <img src="{{ asset('img/bomba.png') }}" alt="Mãos dadas" class="block sm:hidden w-20 h-20" />
            <h3 class="m-2 text-xl sm:text-3xl font-bold text-disruptor-txt uppercase w-full">
      {{ $result['role'] ?? 'DISRUPTOR' }}: {{ number_format($result['value'], 2, ',', '.') }}%
    </h3>
    <p class="text-sm font-semibold text-disruptor-txt w-full sm:px-32">
      {{ $result['description'] }}
    </p>
  </div>

</div>
