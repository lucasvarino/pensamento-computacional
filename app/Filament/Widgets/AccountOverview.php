<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AccountOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $verified = auth()->user()?->isVerified();
        $status = $verified ? 'Verificada' : 'Não Verificada';
        $description = $verified ? '' : 'Aguarde sua conta ser verificada ou entre em contato com os administradores';
        return [
            Stat::make('Situação da conta', $status)
                ->description($description)
        ];
    }
}
