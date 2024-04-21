<x-filament-panels::page>
    <div class="text-black">
        <div class="w-full mx-auto px-4">
            <div class="grid md:flex md:flex-col-reverse md:gap-4">
                <div class="bg-bg shdc-shadow-2 rounded-lg overflow-hidden flex flex-wrap items-center justify-center">
                    <h1 class="text-center font-bold text-2xl">Descrição dos Resultados</h1>
                    <div class="grid gap-4 p-6">
                        @foreach($this->formatResult as $result)
                        <div class="flex items-center">
                            <h3 class="text-lg font-bold">{{ $result['group'] }}: {{ $result['value'] }}%</h3>
                        </div>
                        <p class="text-sm text-gray-400">
                            {{ $result['description'] }}
                        </p>
                        <div class="border-t border-gray-200 w-full my-4"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::page>
