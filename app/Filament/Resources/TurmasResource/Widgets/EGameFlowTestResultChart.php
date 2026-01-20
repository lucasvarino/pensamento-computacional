<?php

namespace App\Filament\Resources\TurmasResource\Widgets;

use Filament\Widgets\ChartWidget;
use Filament\Support\RawJs;

class EGameFlowTestResultChart extends ChartWidget
{
    protected static ?string $heading = 'Teste eGameFlow';
    public array $result;

    protected function getMaxHeight(): ?string
    {
        return '500px';
    }
    
    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label'               => 'Pontuação',
                    'data'                => $this->result,

                    'borderColor'         => 'rgba(196, 120, 255, 1)',
                    'backgroundColor'     => 'rgba(196, 120, 255, 0.2)',
                    'pointBackgroundColor'=> 'rgba(196, 120, 255, 1)',
                ],
            ],
            'labels' => ['Concentração', 'Desafios', 'Autonomia', 'Objetivos', 'Feedback', 'Imersão', 'Interação Social', 'Melhoria de Conhecimento']
        ];
    }

    protected function getType(): string
    {
        return 'radar';
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
