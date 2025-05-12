@props(['result'])

<div class="relative bg-gradient-to-r from-orange-400 to-orange-200 rounded-2xl shadow-xl overflow-hidden mb-6">
  {{-- “Raio” de sombra inclinado atrás --}}
  <div class="absolute inset-y-0 left-0 w-48 bg-orange-600 transform -skew-x-12 origin-top-left"></div>

  {{-- Ícone à esquerda --}}
  <div class="absolute top-4 left-4">
    {{-- troque por <x-heroicon-o-light-bulb> ou whatever faça sentido --}}
    <x-heroicon-o-light-bulb class="w-10 h-10 text-white" />
  </div>

  {{-- Ícone à direita --}}
  <div class="absolute top-4 right-4">
    {{-- por exemplo uma tocha, se tiver um SVG/ícone --}}
    <x-heroicon-o-fire class="w-10 h-10 text-white" />
  </div>

  {{-- Conteúdo central --}}
  <div class="relative flex flex-col items-center justify-center py-12 px-8">
    <h3 class="text-3xl font-bold text-white uppercase">
      {{ $result['role'] ?? 'EXPLORADOR' }}: {{ number_format($result['value'], 2, ',', '.') }}%
    </h3>
    <p class="mt-2 text-sm text-white/90 text-center">
      {{ $result['description'] }}
    </p>
  </div>
</div>