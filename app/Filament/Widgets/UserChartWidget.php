<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Carbon\Carbon;
use EightyNine\FilamentAdvancedWidget\AdvancedChartWidget as BaseWidget;

class UserChartWidget extends BaseWidget
{
    public static function canView(): bool
    {
        $user = auth()->user();
        return $user && $user->isVerified() && $user->isAdmin();
    }

    protected static string $color = 'primary';
    protected static ?string $icon = 'icon-chart-bar';
    protected static ?string $iconColor = 'primary';
    protected static ?string $iconBackgroundColor = 'primary';
    protected static ?string $label = 'Número de usuários';

    // protected static ?string $badge = 'novo';
    // protected static ?string $badgeColor = 'primary';
    // protected static ?string $badgeIcon = 'heroicon-o-check-circle';
    // protected static ?string $badgeIconPosition = 'after';
    // protected static ?string $badgeSize = 'xs';

    public ?string $filter = 'week';

    protected function getFilters(): ?array
    {
        return [
            'week'  => 'Última Semana',
            'month' => 'Últimos 30 dias',
            'year'  => 'Último Ano',
        ];
    }

    public function getHeading(): ?string
    {
        $total = User::count();
        return number_format($total, 0, ',', '.');
    }

    protected function getData(): array
    {
        Carbon::setLocale('pt_BR');

        $filter = $this->filter ?? 'week';
        $now = Carbon::now();

        $labels = [];
        $data = [];

        switch ($filter) {
            case 'week':
                // Últimos 7 dias (inclui hoje)
                $start = Carbon::today()->subDays(6);
                $end = $now;
                $period = [];
                for ($i = 0; $i < 7; $i++) {
                    $d = $start->copy()->addDays($i);
                    $key = $d->toDateString();
                    $period[$key] = 0;
                    $labels[] = $d->translatedFormat('D d');
                }
                $users = User::whereBetween('created_at', [$start->startOfDay(), $end])->get(['created_at']);
                foreach ($users as $u) {
                    $k = $u->created_at->toDateString();
                    if (isset($period[$k])) {
                        $period[$k]++;
                    }
                }
                $data = array_values($period);
                break;

            case 'month':
                // Últimos 30 dias
                $start = Carbon::today()->subDays(29);
                $end = $now;
                $period = [];
                for ($i = 0; $i < 30; $i++) {
                    $d = $start->copy()->addDays($i);
                    $key = $d->toDateString();
                    $period[$key] = 0;
                    $labels[] = $d->format('d/m');
                }
                $users = User::whereBetween('created_at', [$start->startOfDay(), $end])->get(['created_at']);
                foreach ($users as $u) {
                    $k = $u->created_at->toDateString();
                    if (isset($period[$k])) {
                        $period[$k]++;
                    }
                }
                $data = array_values($period);
                break;

            case 'year':
            default:
                // Últimos 12 meses
                $start = Carbon::now()->subMonths(11)->startOfMonth();
                $end = $now;
                $period = [];
                for ($i = 0; $i < 12; $i++) {
                    $m = $start->copy()->addMonths($i);
                    $key = $m->format('Y-m');
                    $period[$key] = 0;
                    $labels[] = $m->translatedFormat('M Y');
                }
                $users = User::whereBetween('created_at', [$start, $end])->get(['created_at']);
                foreach ($users as $u) {
                    $k = $u->created_at->format('Y-m');
                    if (isset($period[$k])) {
                        $period[$k]++;
                    }
                }
                $data = array_values($period);
                break;
        }

        $data = array_map(function ($v) {
            return max(0, (int) $v);
        }, $data);

        $calculatedMax = max($data) ?: 0;
        $yMin = 0;
        $yMax = $calculatedMax > 0 ? (int) ceil($calculatedMax * 1.1) : 1;

        return [
            'datasets' => [
                [
                    'label' => 'Novos Usuários registrados',
                    'data' => $data,
                    'fill' => false,
                    'borderWidth' => 2,
                    'borderColor' => '#4A90E2',
                    'backgroundColor' => 'rgba(74, 144, 226, 0.1)',
                    'tension' => 0.3,
                ],
            ],
            'labels' => $labels,
            'options' => [
                'responsive' => true,
                'maintainAspectRatio' => false,
                'scales' => [
                    'y' => [
                        'beginAtZero' => true,
                        'min' => $yMin,
                        'suggestedMin' => 0,
                        'max' => $yMax,
                        'suggestedMax' => $yMax,
                        'ticks' => [
                            'min' => $yMin,
                            'max' => $yMax,
                        ],
                        'title' => [
                            'display' => true,
                            'text' => 'Usuários',
                        ],
                    ],
                ],
                'plugins' => [
                    'legend' => [
                        'display' => false,
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
