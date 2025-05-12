<?php

namespace App\Filament\Resources\TurmasResource\Widgets;

use App\Filament\Resources\TurmasResource\Pages\ListResults;
use EightyNine\FilamentAdvancedWidget\AdvancedStatsOverviewWidget as BaseWidget;
use EightyNine\FilamentAdvancedWidget\AdvancedStatsOverviewWidget\Stat;

class HexadTestStats extends BaseWidget
{
    public int $items;
    public string $filantropo;
    public string $socializadores;
    public string $livre_espirito;
    public string $conquistador;
    public string $disruptor;
    public string $jogador;

    protected function getColumns(): int
    {
        return 2;
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
            Stat::make('Porcentagem Socializador', $this->socializadores)
                ->extraAttributes([
                    'style' => 'background-color: #0085c2; opacity: 0.8;',
                ])
                ->icon('icon-maos')
                ->iconPosition('start'),
            Stat::make('Porcentagem Espírito Livre', $this->livre_espirito)
                ->extraAttributes([
                    'style' => 'background-color: #1bcba3; opacity: 0.8;',
                ])
                ->icon('icon-borboleta')
                ->iconPosition('start'),
            Stat::make('Porcentagem Conquistador', $this->conquistador)
                ->extraAttributes([
                    'style' => 'background-color: #e8b107; opacity: 0.8;',
                ])
                ->icon('icon-bandeira')
                ->iconPosition('start'),
            Stat::make('Porcentagem Disruptor', $this->disruptor)
                ->extraAttributes([
                    'style' => 'background-color: #8d3153; opacity: 0.8;',
                ])
                ->icon('icon-bomba')
                ->iconPosition('start'),
            Stat::make('Porcentagem Filantropo', $this->filantropo)
                ->extraAttributes([
                    'style' => 'background-color: #25bb48; opacity: 0.8;',
                ])
                ->icon('icon-filantropo')
                ->iconPosition('start'),
            Stat::make('Porcentagem Jogador', $this->jogador)
                ->extraAttributes([
                    'style' => 'background-color: #6d49b5; opacity: 0.8;',
                ])
                ->icon('icon-manete')
                ->iconPosition('start'),
        ];
    }

    protected function getTablePage(): string
    {
        return ListResults::class;
    }
}
