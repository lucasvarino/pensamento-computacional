<?php

namespace App\Filament\Resources\TurmasResource\Widgets;

use App\Filament\Resources\TurmasResource\Pages\ListResults;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TestStats extends BaseWidget
{
    public int $items;
    public string $empreendedor;
    public string $explorador;
    public string $assassino;
    public string $socializador;
    protected function getStats(): array
    {
        return [
            Stat::make('Respostas de Alunos', $this->items),
            Stat::make('Porcentagem Empreendedor', $this->empreendedor),
            Stat::make('Porcentagem Explorador', $this->explorador),
            Stat::make('Porcentagem Assassino', $this->assassino),
            Stat::make('Porcentagem Socializador', $this->socializador)
        ];
    }

    protected function getTablePage(): string
    {
        return ListResults::class;
    }
}
