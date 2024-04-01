<?php

namespace App\Filament\Resources\TurmasResource\Widgets;

use Filament\Widgets\ChartWidget;
use Filament\Support\RawJs;

class TestResultChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Pontuação',
                    'data' => [53.33, 66.67, 60, 20]
                ]
            ],
            'labels' => ['Empreendedor', 'Explorador', 'Assassino', 'Socializador']
        ];
    }

    protected function getType(): string
    {
        return 'radar';
    }


    protected function getOptions(): RawJs
    {
        return RawJs::make(<<<JS
        {
            scales: {
                r: {
                    suggestedMin: 0,
                    suggestedMax: 100
                },
            },
        }
    JS);
    }
}
