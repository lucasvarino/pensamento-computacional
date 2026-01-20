<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class EGameFlow extends Page
{
    protected static string $view = 'filament.pages.egameflow';
    
    protected static ?string $title = 'Método eGameFlow';
    protected static ?string $navigationGroup = 'Métodos Disponíveis';

    public static function getNavigationIcon(): ?string
    {
        return request()->routeIs('filament.admin.pages.egameflow')
            ? 'icon-user-group'
            : 'icon-user-group-b&w';
    }

    public static function canAccess(): bool
    {
        $user = auth()->user();
        return $user && $user->isVerified();
    }

}
