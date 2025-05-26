<?php

namespace App\Filament\Pages;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;


class Dashboard extends \Filament\Pages\Dashboard
{
    // protected static ?string $title = 'Painel';

    public static function getNavigationIcon(): ?string
    {
        return request()->routeIs('filament.admin.pages.dashboard')
            ? 'icon-home'
            : 'icon-home-b&w';
    }

    public function mount(): void
    {
        $user = auth()->user();

        if (!$user) {
            $this->previousUrl = url()->previous();
            Notification::make()
            ->title('Acesso negado')
            ->body('Você precisa estar autenticado para acessar esta página.')
            ->danger()
            ->send();

            redirect($this->previousUrl);
        }
    }

}
