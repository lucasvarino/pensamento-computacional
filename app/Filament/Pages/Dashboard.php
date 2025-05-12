<?php

namespace App\Filament\Pages;
use Filament\Facades\Filament;

class Dashboard extends \Filament\Pages\Dashboard
{
    protected static ?string $title = 'Painel';

    public static function getNavigationIcon(): ?string
    {
        return request()->routeIs('filament.admin.pages.dashboard')
            ? 'icon-home'
            : 'icon-home-b&w';
    }

}
