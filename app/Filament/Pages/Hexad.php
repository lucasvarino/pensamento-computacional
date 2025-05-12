<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Hexad extends Page
{
    protected static string $view = 'filament.pages.hexad';
    
    protected static ?string $title = 'Método Hexad';
    protected static ?string $navigationGroup = 'Métodos Disponíveis';

    public static function getNavigationIcon(): ?string
    {
        return request()->routeIs('filament.admin.pages.hexad')
            ? 'icon-user-group'
            : 'icon-user-group-b&w';
    }

    public static function canAccess(): bool
    {
        $user = auth()->user();
        return $user && $user->isVerified();
    }

}
