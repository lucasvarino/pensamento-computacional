<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\View\Component;

class GuiaDoProfessor extends Page
{
    
    public static function canAccess(): bool
    {
        $user = auth()->user();
        return $user && $user->isVerified();
    }

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static string $view = 'filament.pages.guia-do-professor';
    protected static ?string $title = 'Guia do Professor';

    protected static ?string $navigationGroup = 'Ajuda e Suporte';

}
