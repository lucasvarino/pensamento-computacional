<?php

namespace App\Filament\Resources\TurmasResource\Widgets;

use App\Filament\Resources\TurmasResource\Pages\ListResults;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use EightyNine\FilamentAdvancedWidget\AdvancedStatsOverviewWidget as BaseWidget;
use EightyNine\FilamentAdvancedWidget\AdvancedStatsOverviewWidget\Stat;

class TestStats extends BaseWidget
{
    public int $items;
    public string $empreendedor;
    public string $explorador;
    public string $assassino;
    public string $socializador;

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
            Stat::make('Porcentagem Empreendedor', $this->empreendedor)
                ->extraAttributes([
                    'style' => 'background-color: #e8b107; opacity: 0.8;',
                ])
                ->icon('icon-bandeira')
                ->iconPosition('start'),
            Stat::make('Porcentagem Explorador', $this->explorador)
                ->extraAttributes([
                    'style' => 'background-color: #ce733c; opacity: 0.8;',
                ])
                ->icon('icon-tocha')
                ->iconPosition('start'),
            Stat::make('Porcentagem Assassino', $this->assassino)
                ->extraAttributes([
                    'style' => 'background-color: #c73d3d; opacity: 0.8;',
                ])
                ->icon('icon-espadas')
                ->iconPosition('start'),
            Stat::make('Porcentagem Socializador', $this->socializador)
                ->extraAttributes([
                    'style' => 'background-color: #0085c2; opacity: 0.8;',
                ])
                ->icon('icon-maos')
                ->iconPosition('start'),
        ];
    }

    protected function getTablePage(): string
    {
        return ListResults::class;
    }
}
