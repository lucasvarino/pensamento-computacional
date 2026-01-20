<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Answer;
use App\Models\AnswerClass;
use App\Models\HexadAnswer;
use App\Models\TestClass;


// use Filament\Widgets\StatsOverviewWidget as BaseWidget;
// use Filament\Widgets\StatsOverviewWidget\Stat;

use EightyNine\FilamentAdvancedWidget\AdvancedStatsOverviewWidget as BaseWidget;
use EightyNine\FilamentAdvancedWidget\AdvancedStatsOverviewWidget\Stat;

class AccountOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $user = auth()->user();

        // Se não houver usuário logado
        if (! $user) {
            return [
                Stat::make('Situação da conta', 'Não logado')
                    ->icon('heroicon-o-x-circle')
                    ->iconPosition('start')
                    ->description('Faça login para ver as estatísticas')
                    ->iconColor('danger'),
            ];
        }

        $verified = $user->isVerified();
        $admin = $user->isAdmin();

        // Estatísticas que serão retornadas
        $stats = [];

        // Se for usuário verificado e admin, adiciona estatísticas globais
        if ($verified && $admin) {
            $stats[] = Stat::make('Total de usuários', User::count())
                ->icon('icon-user')
                ->chart([7, 2, 10, 3, 15, 4, 12])
                ->iconPosition('start')
                ->description('Usuários Cadastrados')
                ->iconColor('primary')
                ->chartColor('primary');

            $stats[] = Stat::make('Testes Bartle', Answer::where('method_id', 1)->count())
                ->icon('icon-user-group')
                ->chart([12, 2, 7, 3, 10, 4, 5])
                ->description('Total de testes Bartle realizados')
                ->descriptionIcon('heroicon-o-inbox-arrow-down', 'before')
                ->iconColor('primary')->chartColor('primary');

            $stats[] = Stat::make('Testes Hexad', Answer::where('method_id', 2)->count())
                ->icon('icon-trofeu')
                ->chart([5, 2, 10, 3, 8, 4, 12])
                ->description('Total de testes Hexad realizados')
                ->descriptionIcon('heroicon-o-inbox-arrow-down', 'before')
                ->iconColor('primary')->chartColor('primary');
        }

        // Estatísticas do usuário verificado (apenas para usuários verificados)
        if ($verified) {
            // Recupera IDs das turmas do usuário (assumindo relação classes())
            $classIds = $user->classes()->pluck('id')->toArray();

            $totalTurmas = TestClass::where('user_id', $user->id)
                ->distinct('url')
                ->count('url');

            $totalTestsApplied = 0;
            if (! empty($classIds)) {
                $totalTestsApplied = AnswerClass::whereIn('class_id', $classIds)
                    ->distinct('answer_id')
                    ->count('answer_id');
            }

            $stats[] = Stat::make('Minhas Turmas', $totalTurmas)
                ->icon('icon-user-group')
                ->chart([5, 2, 10, 3, 8, 4, 12])
                ->description('Total das Minhas Turmas')
                ->iconColor('primary')->chartColor('primary');

            $stats[] = Stat::make('Testes Aplicados', $totalTestsApplied)
                ->icon('icon-trofeu')
                ->chart([12, 2, 7, 3, 10, 4, 5])
                ->description('Meus Testes Aplicados')
                ->descriptionIcon('heroicon-o-inbox-arrow-down', 'before')
                ->iconColor('primary')->chartColor('primary');

            return $stats;
        }

        // Se chegou aqui: usuário existe mas NÃO está verificado
        $status = $verified ? 'Verificada' : 'Não Verificada';
        $description = $verified ? '' : 'Aguarde sua conta ser verificada ou entre em contato com projeto.perfiljogador@ufjf.br';

        return [
            Stat::make('Situação da conta', $status)
                ->icon('heroicon-o-x-circle')
                ->iconPosition('start')
                ->description($description)
                ->iconColor('danger'),
        ];
    }
}