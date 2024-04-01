<x-filament-panels::page>
    <div x-data="{ open: $wire.entangle('answered')}">
        <form wire:submit="create" x-show="!open">
            {{ $this->form }}
            <div class="mt-6">
                <x-filament::button type="submit">
                    Enviar
                </x-filament::button>
            </div>
        </form>
        @livewire(\App\Filament\Resources\TurmasResource\Widgets\TestResultChart::class)
    </div>
</x-filament-panels::page>
