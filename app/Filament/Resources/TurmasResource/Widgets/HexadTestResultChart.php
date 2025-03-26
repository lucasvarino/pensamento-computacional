<?php

namespace App\Filament\Resources\TurmasResource\Widgets;

use Filament\Widgets\ChartWidget;
use Filament\Support\RawJs;

class HexadTestResultChart extends ChartWidget
{
    protected static ?string $heading = 'Teste Hexad';
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
            'labels' => ['Filantropo', 'Socializador', 'Espírito Livre', 'Conquistador', 'Disruptor', 'Jogador']
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
        $maxValue = max($this->result);
        $suggestedMax = ceil($maxValue * 1.2);
        return RawJs::make(<<<JS
        {
            scales: {
                r: {
                    suggestedMin: 20,
                    suggestedMax: $suggestedMax
                },
            },
            options: {
                maintainAspectRatio: false,
            }
        }
    JS);
    }
}
