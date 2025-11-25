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
                    'data' => $this->result,

                    'borderColor'         => 'rgba(196, 120, 255, 1)',
                    'backgroundColor'     => 'rgba(196, 120, 255, 0.2)',
                    'pointBackgroundColor'=> 'rgba(196, 120, 255, 1)',
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
        $maxValue = max($this->result);
        $suggestedMax = ceil($maxValue * 1.1);
        $suggestedMax = ($suggestedMax > 100)? 100 : $suggestedMax;
        return RawJs::make(<<<JS
        {
            scales: {
                x: {
                    display: false,
                },
                y: {
                    display: false,
                },

                r: {
                    suggestedMin: 0,
                    suggestedMax: $suggestedMax,
                    
                    ticks: {
                        z: 10,
                    },
                    grid: {
                        z: 0,
                        color: 'rgba(196, 120, 255, 1)',
                    },
                    angleLines: {
                        z: 0,
                        color: 'rgba(196, 120, 255, 1)',
                    },
                },
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            },
        }
    JS);
    }
}
