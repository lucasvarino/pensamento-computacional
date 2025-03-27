<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Answer;

// use Filament\Widgets\StatsOverviewWidget as BaseWidget;
// use Filament\Widgets\StatsOverviewWidget\Stat;

use EightyNine\FilamentAdvancedWidget\AdvancedStatsOverviewWidget as BaseWidget;
use EightyNine\FilamentAdvancedWidget\AdvancedStatsOverviewWidget\Stat;

class AccountOverview extends BaseWidget
{

    protected function getStats(): array
    {
        $user = auth()->user();

        $verified = $user && $user->isVerified() ? true : false;
        $admin = $user && $user->isAdmin() ? true : false;

        if($verified && $admin){

            $totalUsers = User::count();

            $totalBartleAnswers = Answer::where('method_id', 1)->count();
            $totalHexadAnswers = Answer::where('method_id', 2)->count();

            return [
                Stat::make('Total de usuários', $totalUsers)
                    ->icon('heroicon-o-users')
                    ->chart([7, 2, 10, 3, 15, 4, 12])
                    ->chartColor('success')
                    ->iconPosition('start')
                    ->description('Usuários Cadastrados')
                    ->iconColor('success')
                    ->chartColor('success'),
                    //->backgroundColor('info')
                    //->progress(69)
                    //->progressBarColor('success')
                    //->iconBackgroundColor('success')
                    //->descriptionIcon('heroicon-o-chevron-up', 'before')
                    //->descriptionColor('success'),

                    Stat::make('Testes Bartle', $totalBartleAnswers)
                        ->chart([12, 2, 7, 3, 10, 4, 5])
                        ->chartColor('warning')
                        ->icon('heroicon-o-user-group')
                        ->description('Total de testes Bartle feitos')
                        ->descriptionIcon('heroicon-o-inbox-arrow-down', 'before')
                        ->iconColor('warning'),
                    
                    Stat::make('Testes Hexad', $totalHexadAnswers)
                        ->chart([5, 2, 10, 3, 8, 4, 12])
                        ->chartColor('warning')
                        ->icon('heroicon-o-trophy')
                        ->description('Total de testes Hexad feitos')
                        ->descriptionIcon('heroicon-o-inbox-arrow-down', 'before')
                        ->iconColor('warning'),

            ];

        } elseif ($verified) {

            return[
                Stat::make('Testes Bartle', 123)
                        ->chart([12, 2, 7, 3, 10, 4, 5])
                        ->chartColor('warning')
                        ->icon('heroicon-o-user-group')
                        ->description('Total de testes Bartle feitos')
                        ->descriptionIcon('heroicon-o-inbox-arrow-down', 'before')
                        ->iconColor('warning'),
                    
                    Stat::make('Testes Hexad', 456)
                        ->chart([5, 2, 10, 3, 8, 4, 12])
                        ->chartColor('warning')
                        ->icon('heroicon-o-trophy')
                        ->description('Total de testes Hexad feitos')
                        ->descriptionIcon('heroicon-o-inbox-arrow-down', 'before')
                        ->iconColor('warning'),
            ];

        } else {

            $status = $verified ? 'Verificada' : 'Não Verificada';
            $description = $verified ? '' : 'Aguarde sua conta ser verificada ou entre em contato com os administradores';

            return [
                Stat::make('Situação da conta', $status)
                    ->icon('heroicon-o-x-circle')
                    ->iconPosition('start')
                    ->description($description)
                    ->iconColor('danger'),
            ];
            
        }
    }
}
