<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Bartle extends Page
{
    protected static string $view = 'filament.pages.bartle';

    protected static ?string $navigationGroup = 'Métodos Disponíveis';
    protected static ?string $title = 'Método de Bartle';

    public static function getNavigationIcon(): ?string
    {
        return request()->routeIs('filament.admin.pages.bartle')
            ? 'icon-trofeu'
            : 'icon-trofeu-b&w';
    }

    public static function canAccess(): bool
    {
        $user = auth()->user();
        return $user && $user->isVerified();
    }

    public static function getColumnSpan(): int
    {
        return 3; 
    }

    public static function getColumnStart(): int
    {
        return 1;
    }

}
