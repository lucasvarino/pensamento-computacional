<?php

namespace App\Filament\Widgets;

// use App\Models\User;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AccountOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $verified = auth()->user()?->isVerified();
        $status = $verified ? 'Verificada' : 'Não Verificada';
        $description = $verified ? '' : 'Aguarde sua conta ser verificada ou entre em contato com os administradores';

        // $totalUsers = User::count();

        return [
            Stat::make('Situação da conta', $status)
                ->description($description),
            
            // Stat::make('Total de Usuários', $totalUsers)
            // ->description('Número total de usuários cadastrados'),

            Stat::make('Outra Métrica', '123')
                ->description('Exemplo de métrica'),

            Stat::make('Mais Uma Métrica', '456')
                ->description('Descrição adicional'),
        ];
    }
}
