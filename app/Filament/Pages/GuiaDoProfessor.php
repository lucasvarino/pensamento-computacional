<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\View\Component;

class GuiaDoProfessor extends Page
{
    protected static string $view = 'filament.pages.guia-do-professor';
    protected static ?string $title = 'Guia do Colaborador';

    protected static ?string $navigationGroup = 'Ajuda e Suporte';
    
    public static function canAccess(): bool
    {
        $user = auth()->user();
        return $user && $user->isVerified();
    }

    public static function getNavigationIcon(): ?string
    {
        return request()->routeIs('filament.admin.pages.guia-do-professor')
            ? 'icon-guia'
            : 'icon-guia-b&w';
    }

}