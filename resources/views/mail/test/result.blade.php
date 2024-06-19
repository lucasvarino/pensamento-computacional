<div>
        <div class="w-full max-w-3xl mx-auto px-4">
            <h2 class="text-2xl dark:text-white font-semibold text-center mt-8">Resultados do Teste {{ $className ?? '' }}</h2>
            <div class="grid md:flex md:flex-col-reverse md:gap-4">
                <div class="bg-gray-100 shdc-shadow-2 rounded-lg overflow-hidden flex flex-wrap items-center justify-center">
                    <div class="border-t border-gray-200 w-full"></div>
                    <div class="grid gap-4 p-6">
                        @foreach($results as $result)
                            <div class="flex items-center">
                                <h3 class="text-lg font-bold">{{ $result['group'] }}: {{ $result['value'] }}%</h3>
                            </div>
                            <p class="text-sm text-gray-500">
                                {{ $result['description'] }}
                            </p>
                            <div class="border-t border-gray-200 w-full"></div>
                        @endforeach
                </div>
            </div>
        </div>
</div>
