@props(['result'])
<div class="relative bg-conquistador rounded-2xl shadow-lg overflow-visible mb-6
            h-auto sm:h-44 py-10 sm:py-0">

  <div class="absolute inset-y-0 right-0 flex items-center overflow-hidden">
    <div class="relative h-40 w-40">
      <svg
        class="absolute top-1/2 transform -translate-y-1/2 z-0"
        width="256" height="256"
        viewBox="10 -10 256 256"
        xmlns="http://www.w3.org/2000/svg"
        >
        <circle cx="128" cy="128" r="108" fill="#ffc500" />
        <circle cx="128" cy="128" r="72" fill="#e8b107" />
        <circle cx="128" cy="128" r="36" fill="#d4a30b" />
      </svg>
      <div class="absolute inset-0 flex items-center justify-end z-10 transform -translate-y-5">
      <x-icon name="bandeira" class="hidden sm:block h-20 w-20"/>
      </div>
    </div>
  </div>

    <div class="absolute left-0 top-1/2 transform -translate-y-1/2
                w-40 h-40 flex items-center justify-center z-10">
      <x-icon name="medalha" class="hidden sm:block h-24 w-24"/>
    </div>

  <div class="relative flex flex-col items-center text-center h-full
      justify-center px-4 py-0">
      <img src="{{ asset('img/bandeira.png') }}" alt="Bandeira" class="block sm:hidden w-20 h-20" />
      <h3 class="m-2 text-xl sm:text-3xl font-bold text-conquistador-txt uppercase w-full">
        {{ $result['role'] ?? 'CONQUISTADOR' }}:
        {{ number_format($result['value'], 2, ',', '.') }}%
      </h3>
      <p class="text-sm font-semibold text-conquistador-txt w-full sm:px-32">
        {{ $result['description'] }}
      </p>
  </div>
</div>
