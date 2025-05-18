<x-filament-widgets::widget class="w-full col-span-full">
    <h1 class="pb-3 text-lg font-semibold">
        Bem-vindo ao painel!
    </h1>

    <x-filament::section>
        <div class="w-full p-4 mb-4 text-white rounded-lg">
            <div class="flex justify-between items-center">
                <span class="text-lg font-semibold">
                    Que tal acessar o Guia do Colaborador para conhecer as funcionalidades da plataforma?
                </span>
                <div class="flex gap-2">
                    <x-filament::button wire:click="goToGuide">
                        Acessar Guia
                    </x-filament::button>

                    <x-filament::button color="gray" wire:click="dismissAlert">
                        Já sei como funciona
                    </x-filament::button>
                </div>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
