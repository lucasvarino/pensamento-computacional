<?php

namespace App\Filament\Resources\TurmasResource\Widgets;

use App\Filament\Resources\TurmasResource\Pages\ListResults;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TestStats extends BaseWidget
{
    public int $items;
    protected function getStats(): array
    {
        return [
            Stat::make('Respostas de Alunos', $this->items)
        ];
    }

    protected function getTablePage(): string
    {
        return ListResults::class;
    }
}
