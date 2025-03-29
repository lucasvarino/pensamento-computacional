<?php

namespace App\Filament\Resources\TurmasResource\Widgets;

use App\Models\BartleResult;
use Filament\Widgets\ChartWidget;
use Filament\Support\RawJs;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Illuminate\Support\Collection;

class TestResultChart extends ChartWidget
{
    protected static ?string $heading = 'Teste de Bartle';
    public array $result;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Pontuação',
                    'data' => $this->result
                ]
            ],
            'labels' => ['Empreendedor', 'Explorador', 'Assassino', 'Socializador']
        ];
    }

    protected function getType(): string
    {
        return 'radar';
    }

    protected function getMaxHeight(): ?string
    {
        return '600px';
    }


    protected function getOptions(): RawJs
    {
        return RawJs::make(<<<JS
        {
            scales: {
                r: {
                    suggestedMin: 10,
                    suggestedMax: 80
                },
            },
            options: {
                maintainAspectRatio: false,
            }
        }
    JS);
    }
}
