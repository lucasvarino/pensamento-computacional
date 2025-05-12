<x-filament-panels::page class="overflow-visible">
    <div class="w-full">
        <div class="flex flex-col gap-4">
            @foreach($formatResult as $result)
                @php
                    $viewName = Str::kebab($result['group']);
                @endphp

                @includeFirst([
                    "components.profiles.{$viewName}",
                    'components.profiles.default',
                ], ['result' => $result])
            @endforeach
        </div>
    </div>
</x-filament-panels::page>