<?php

namespace App\Filament\Resources\TurmasResource\Widgets;

use App\Filament\Resources\TurmasResource\Pages\ListResults;
use EightyNine\FilamentAdvancedWidget\AdvancedStatsOverviewWidget as BaseWidget;
use EightyNine\FilamentAdvancedWidget\AdvancedStatsOverviewWidget\Stat;

class EGameFlowTestStats extends BaseWidget
{
    public int $items;
    // ['Concentração', 'Desafios', 'Autonomia', 'Objetivos', 'Feedback', 'Imersão', 'Interação Social', 'Melhoria de Conhecimento'];
    public string $concentracao;
    public string $desafios;
    public string $autonomia;
    public string $objetivos;
    public string $feedback;
    public string $imersao;
    public string $interacao_social;
    public string $melhoria_de_conhecimento;
    

    protected function getColumns(): int
    {
        return 4;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Respostas de Alunos', $this->items)
                ->icon('icon-user-group')
                ->chart([7, 2, 10, 3, 14, 4, 12])
                ->chartColor('primary')
                ->iconPosition('start')
                ->iconColor('primary')
                ->extraAttributes([
                    'class' => 'col-span-full',
                ]),
            Stat::make('Porcentagem Concentração', $this->concentracao)
            ->extraAttributes([
                'style' => 'background-color: #3970c7; opacity: 0.8;',
                ])
                // ->icon('icon-maos')
                ->iconPosition('start'),
            Stat::make('Porcentagem Desafios', $this->desafios)
                ->extraAttributes([
                    'style' => 'background-color: #b41212; opacity: 0.8;',
                ])
                // ->icon('icon-manete')
                ->iconPosition('start'),
            Stat::make('Porcentagem Autonomia', $this->autonomia)
                ->extraAttributes([
                    'style' => 'background-color: #20828f; opacity: 0.8;',
                ])
                // ->icon('icon-borboleta')
                ->iconPosition('start'),
            Stat::make('Porcentagem Anatomia', $this->objetivos)
                ->extraAttributes([
                    'style' => 'background-color: #a89026; opacity: 0.8;',
                ])
                // ->icon('icon-bandeira')
                ->iconPosition('start'),
            Stat::make('Porcentagem Feedback', $this->feedback)
                ->extraAttributes([
                    'style' => 'background-color: #8d3153; opacity: 0.8;',
                ])
                // ->icon('icon-bomba')
                ->iconPosition('start'),
            Stat::make('Porcentagem Imersão', $this->imersao)
                ->extraAttributes([
                    'style' => 'background-color: #602FA1; opacity: 0.8;',
                ])
                // ->icon('icon-filantropo')
                ->iconPosition('start'),
            Stat::make('Porcentagem Interação Social', $this->interacao_social)
                ->extraAttributes([
                    'style' => 'background-color: #B53B28; opacity: 0.8;',
                ])
                // ->icon('icon-manete')
                ->iconPosition('start'),
            Stat::make('Porcentagem Melhoria de Conhecimento', $this->melhoria_de_conhecimento)
                ->extraAttributes([
                    'style' => 'background-color: #4370A3; opacity: 0.8;',
                ])
                // ->icon('icon-manete')
                ->iconPosition('start'),
        ];
    }

    protected function getTablePage(): string
    {
        return ListResults::class;
    }
}
