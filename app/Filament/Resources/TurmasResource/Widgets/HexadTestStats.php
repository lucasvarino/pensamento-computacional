<?php

namespace App\Filament\Resources\TurmasResource\Widgets;

use App\Filament\Resources\TurmasResource\Pages\ListResults;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class HexadTestStats extends BaseWidget
{
    public int $items;
    public string $filantropo;
    public string $socializadores;
    public string $livre_espirito;
    public string $conquistador;
    public string $disruptor;
    public string $jogador;

    protected function getStats(): array
    {
        return [
            Stat::make('Respostas de Alunos', $this->items),
            Stat::make('Porcentagem Filantropo', $this->filantropo),
            Stat::make('Porcentagem Socializadores', $this->socializadores),
            Stat::make('Porcentagem Livre Espírito', $this->livre_espirito),
            Stat::make('Porcentagem Conquistador', $this->conquistador),
            Stat::make('Porcentagem Disruptor', $this->disruptor),
            Stat::make('Porcentagem Jogador', $this->jogador),
        ];
    }

    protected function getTablePage(): string
    {
        return ListResults::class;
    }
}
