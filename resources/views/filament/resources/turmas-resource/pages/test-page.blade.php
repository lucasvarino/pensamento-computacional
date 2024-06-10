<x-filament-panels::page>
    <div>
        @if(!$this->expirated)
            <form wire:submit="create">
                {{ $this->form }}
                <div class="mt-6">
                    <x-filament::button type="submit">
                        Enviar
                    </x-filament::button>
                </div>
            </form>
        @else
            <div class="mx-auto text-center flex items-center justify-center">
                <h1 class="font-bold">Este teste já foi encerrado, entre em contato com o professor responsável.</h1>
            </div>
        @endif
    </div>
</x-filament-panels::page>
