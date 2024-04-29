<?php

namespace App\Filament\Resources\TurmasResource\Widgets;

use App\Models\BartleResult;
use Filament\Support\RawJs;
use LaraZeus\InlineChart\InlineChartWidget;

class InlineTestResultChart extends InlineChartWidget
{
    protected static ?string $heading = 'Chart';
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
            'labels' => ['Empreendedor', 'Explorador', 'Assassino', 'Socializador']
        ];
    }

    public function getRecordData(): array
    {
        return $this->record->bartleResults
            ->map(fn(BartleResult $result) => $result->value)
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
                    suggestedMax: 80
                },
            },
        }
        JS);
    }
}
