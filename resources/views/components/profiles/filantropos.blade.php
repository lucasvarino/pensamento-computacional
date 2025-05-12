@props(['result'])

<div class="relative bg-filantropo rounded-2xl shadow-lg overflow-hidden mb-6
            h-auto sm:h-40 py-8 sm:py-0">

  <svg
    class="hidden sm:block absolute -left-16 sm:-left-0 top-1/2 transform -translate-y-1/2"
    width="256" height="256"
    viewBox="50 0 256 256"
    xmlns="http://www.w3.org/2000/svg"
  >
    <circle cx="128" cy="128" r="128" fill="#1f7d35" />
    <circle cx="128" cy="128" r="96" fill="#0fa156" />
    <circle cx="128" cy="128" r="64" fill="#4ad277" />
    <circle cx="128" cy="128" r="32" fill="#9af097" />
  </svg>
  
  
  <div class="absolute top-1/2 transform -translate-y-1/2
  sm:w-40 sm:h-40 flex items-center justify-center">
  <svg
    class="bock sm:hidden absolute"
    width="256" height="256"
    viewBox="0 0 256 256"
    xmlns="http://www.w3.org/2000/svg"
  >
    <circle cx="128" cy="128" r="128" fill="#1f7d35" />
    <circle cx="128" cy="128" r="96" fill="#0fa156" />
    <circle cx="128" cy="128" r="64" fill="#4ad277" />
    <circle cx="128" cy="128" r="32" fill="#9af097" />
  </svg>
  <img src="{{ asset('img/filantropo.png') }}" alt="Filantropo" class="hidden sm:block w-24 h-24" />
  </div>


  <div class="relative flex flex-col items-center text-center h-full
            justify-center px-4 py-0">
            
    <img src="{{ asset('img/filantropo.png') }}" alt="Filantropo" class="block sm:hidden w-20 h-20" />
    <h3 class="m-2 text-xl sm:text-3xl font-bold text-filantropo-txt uppercase w-full">
      {{ $result['role'] ?? 'FILANTROPO' }}:
      {{ number_format($result['value'], 2, ',', '.') }}%
    </h3>

    <p class="text-sm font-semibold text-filantropo-txt w-full sm:px-32">
      {{ $result['description'] }}
    </p>
  </div>
</div>

<!-- @props(['result'])

<div class="relative bg-filantropo rounded-2xl shadow-lg overflow-hidden mb-6 h-40">
  
  <svg
      class="absolute top-1/2 transform -translate-y-1/2"
      width="256" height="256"
      viewBox="50 0 256 256"
      xmlns="http://www.w3.org/2000/svg"
      >
      <circle cx="128" cy="128" r="128" fill="#1f7d35" />
      <circle cx="128" cy="128" r="96" fill="#0fa156" />
      <circle cx="128" cy="128" r="64" fill="#4ad277" />
      <circle cx="128" cy="128" r="32" fill="#9af097" />
    </svg>

  <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-40 h-40 flex items-center justify-center">
    <x-heroicon-o-hand-raised class="w-12 h-12 text-white" />
  </div>

  <div class="relative flex flex-col items-center text-center justify-center
              py-12 px-8 ml-48 h-full">
    <h3 class="text-3xl font-bold text-filantropo-txt uppercase w-full">
      {{ $result['role'] ?? 'FILANTROPO' }}:
      {{ number_format($result['value'], 2, ',', '.') }}%
    </h3>
    <p class="mt-2 text-sm text-white/90 w-full">
      {{ $result['description'] }}
    </p>
  </div>
</div>
-->