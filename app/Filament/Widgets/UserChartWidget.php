<?php

namespace App\Filament\Widgets;

use App\Models\User;


use EightyNine\FilamentAdvancedWidget\AdvancedChartWidget as BaseWidget;

class UserChartWidget extends BaseWidget
{

    public static function canView(): bool
    {
        $user = auth()->user();
        return $user && $user->isVerified() && $user->isAdmin(); // adapte as condições conforme necessário
    }

    protected static ?string $heading = '187.2k';
    protected static string $color = 'primary';
    protected static ?string $icon = 'icon-chart-bar';
    protected static ?string $iconColor = 'primary';
    protected static ?string $iconBackgroundColor = 'primary';
    protected static ?string $label = 'Numero de usuários?';
 
    protected static ?string $badge = 'new';
    protected static ?string $badgeColor = 'primary';
    protected static ?string $badgeIcon = 'heroicon-o-check-circle';
    protected static ?string $badgeIconPosition = 'after';
    protected static ?string $badgeSize = 'xs';
 
 
    public ?string $filter = 'today';

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
        ];
    }
 
    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }
 
    protected function getType(): string
    {
        return 'line';
    }
}
