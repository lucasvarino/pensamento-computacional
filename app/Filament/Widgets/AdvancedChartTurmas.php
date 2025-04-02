<?php

namespace App\Filament\Widgets;

use EightyNine\FilamentAdvancedWidget\AdvancedChartWidget;

class AdvancedChartTurmas extends AdvancedChartWidget
{

    public static function canView(): bool
    {
        $user = auth()->user();
        return $user && $user->isVerified() && !($user->isAdmin()); // adapte as condições conforme necessário
    }

    protected static ?string $heading  = "Teste por turmas";
    protected static string $color = 'info';
    protected static ?string $icon = 'heroicon-o-chart-bar';
    protected static ?string $iconColor = 'info';
    protected static ?string $iconBackgroundColor = 'info';

    protected function getData(): array
    {
        return [
            'labels' => ['Turma A', 'Turma B', 'Turma C', 'Turma D', 'Turma E', 'Turma F', 'Turma G'],
            'datasets' => [
                [
                    'label' => 'Testes Enviados',
                    'data' => [85, 78, 92, 74, 88, 81, 90],
                    'backgroundColor' => ['rgba(74, 144, 226, 0.7)', 'rgba(80, 227, 194, 0.7)', 'rgba(245, 166, 35, 0.7)', 'rgba(208, 2, 27, 0.7)', 'rgba(189, 16, 224, 0.7)', 'rgba(100, 181, 246, 0.7)', 'rgba(255, 193, 7, 0.7)'],
                    'borderColor' => ['#4A90E2', '#50E3C2', '#F5A623', '#D0021B', '#BD10E0', '#64B5F6', '#FFC107'],
                    'borderWidth' => 2,
                ],
            ],
            'options' => [
                'responsive' => true,
                'maintainAspectRatio' => false,
                'scales' => [
                    'y' => [
                        'beginAtZero' => true,
                        'title' => [
                            'display' => true,
                            'text' => 'Valores',
                        ],
                    ],
                    'x' => [
                        'title' => [
                            'display' => true,
                            'text' => 'Turmas',
                        ],
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
