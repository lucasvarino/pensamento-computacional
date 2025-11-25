<?php

namespace App\Filament\Widgets;
use App\Models\TestClass;
use App\Models\AnswerClass;

use EightyNine\FilamentAdvancedWidget\AdvancedChartWidget;

class AdvancedChartTurmas extends AdvancedChartWidget
{

    public static function canView(): bool
    {
        $user = auth()->user();
        return $user && $user->isVerified();
    }

    protected static ?string $heading  = "Teste por turmas";
    protected static string $color = 'info';
    protected static ?string $icon = 'icon-chart-bar';
    protected static ?string $iconBackgroundColor = 'primary';

protected function getData(): array
{
    $user = auth()->user();

    // Se não houver usuário logado, retorna gráfico vazio
    if (! $user) {
        return [
            'labels' => [],
            'datasets' => [],
            'options' => [],
        ];
    }

    // Pega as últimas 7 turmas criadas pelo usuário (mais recentes)
    $classes = TestClass::where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->take(7)
                ->get();

    // Se não tiver turmas, retorna um gráfico vazio com mensagem/zeros
    if ($classes->isEmpty()) {
        return [
            'labels' => ['Sem turmas'],
            'datasets' => [
                [
                    'label' => 'Testes Enviados',
                    'data' => [0],
                    'backgroundColor' => ['rgba(74, 144, 226, 0.7)'],
                    'borderColor' => ['#4A90E2'],
                    'borderWidth' => 2,
                ],
            ],
            'options' => [
                'responsive' => true,
                'maintainAspectRatio' => false,
            ],
        ];
    }

    $classes = $classes->reverse()->values();

    $labels = $classes->map(function ($c) {
        return $c->name ?? $c->title ?? $c->url ?? "Turma {$c->id}";
    })->toArray();

    $data = $classes->map(function ($c) {
        return AnswerClass::where('class_id', $c->id)
                    ->distinct('answer_id')
                    ->count('answer_id');
    })->toArray();

    $backgroundPalette = [
        'rgba(74, 144, 226, 0.7)',
        'rgba(80, 227, 194, 0.7)',
        'rgba(245, 166, 35, 0.7)',
        'rgba(208, 2, 27, 0.7)',
        'rgba(189, 16, 224, 0.7)',
        'rgba(100, 181, 246, 0.7)',
        'rgba(255, 193, 7, 0.7)',
    ];
    $borderPalette = [
        '#4A90E2', '#50E3C2', '#F5A623', '#D0021B', '#BD10E0', '#64B5F6', '#FFC107',
    ];

    $bgColors = array_slice($backgroundPalette, 0, count($labels));
    $borderColors = array_slice($borderPalette, 0, count($labels));

    return [
        'labels' => $labels,
        'datasets' => [
            [
                'label' => 'Testes Enviados',
                'data' => $data,
                'backgroundColor' => $bgColors,
                'borderColor' => $borderColors,
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
                        'text' => 'Testes',
                    ],
                ],
                'x' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Turmas (últimas 7)',
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
