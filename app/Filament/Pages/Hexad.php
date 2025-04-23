<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Hexad extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static string $view = 'filament.pages.hexad';
    
    protected static ?string $title = 'Método Hexad';
    protected static ?string $navigationGroup = 'Métodos Disponíveis';

    public static function canAccess(): bool
    {
        $user = auth()->user();
        return $user && $user->isVerified();
    }

}
