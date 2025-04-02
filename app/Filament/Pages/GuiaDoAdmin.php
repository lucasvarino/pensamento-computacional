<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class GuiaDoAdmin extends Page
{
    
    public static function canAccess(): bool
    {
        $user = auth()->user();
        return $user && $user->isVerified() && $user->isAdmin();
    }

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static string $view = 'filament.pages.guia-do-admin';
    protected static ?string $title = 'Guia do Administrador';

    protected static ?string $navigationGroup = 'Ajuda e Suporte';
}
