<?php

namespace App\Filament\Resources\TurmasResource\Widgets;

use App\Models\HexadResult;
use Filament\Support\RawJs;
use LaraZeus\InlineChart\InlineChartWidget;

class InlineHexadTestResultChart extends InlineChartWidget
{
    protected static ?string $heading = 'Hexad Chart';
    public array $result;

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Pontuação',
                    'data' => $this->getRecordData()
                ]
            ],
            'labels' => ['Filantropo', 'Socializador', 'Espírito Livre', 'Conquistador', 'Disruptor', 'Jogador']
        ];
    }

    public function getRecordData(): array
    {
        return $this->record->hexadResults
            ->map(fn(HexadResult $result) => $result->value)
            ->toArray();
    }

    protected function getType(): string
    {
        return 'radar';
    }

    protected function getOptions(): RawJs
    {
        return RawJs::make(<<<'JS'
        {
            plugins: {
                legend: {
                        display: false,
                    },
                tooltip: {
                    enabled: false,
                    external: externalTooltipHandler
                }
            },
            scales: {
                y: {
                    ticks: {
                        display: false,
                    },
                    grid: {
                        display: false,
                    },
                },
                x: {
                    ticks: {
                        display: false,
                    },
                    grid: {
                        display: false,
                    },
                },
                r: {
                    suggestedMin: 20,
                    suggestedMax: 60,
                    ticks: {
                        stepSize: 10  // Define os intervalos como múltiplos de 10 (20, 30, 40, 50, 60)
                }
                },
            },
        }
        JS);
    }
}