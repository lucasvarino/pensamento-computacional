<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class SobreNos extends Page
{
    protected static string $view = 'filament.pages.sobre-nos';

    protected static ?string $title = '';
    
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationLabel = 'Sobre Nós';

    protected static ?string $navigationGroup = 'Informações';

    protected static bool $shouldRegisterNavigation = false;

    public static function getNavigationSort(): int
    {
        return 999;
    }
}
