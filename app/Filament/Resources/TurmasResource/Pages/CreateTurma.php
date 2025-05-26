<?php

namespace App\Filament\Resources\TurmasResource\Pages;

use App\Filament\Resources\TurmaResource;
use Filament\Pages\Actions\CreateAction;
use Filament\Pages\Actions\ButtonAction;
use Filament\Actions;
use Filament\Pages\Actions\Action;
use Illuminate\View\View;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use Filament\Pages\Actions\Action as ActionButton;

class CreateTurma extends CreateRecord
{
    protected static string $resource = TurmaResource::class;
    

    public function getTitle(): string
    {
        return 'Criar Turma';
    }

    public function getBreadcrumb(): string
    {
        return 'Criar';
    }
    
    public function mount(): void
    {
        $user = auth()->user();
        $verified = $user && $user->isVerified() ? true : false;
        
        if (!$user) {
            $this->previousUrl = url()->previous();
            Notification::make()
            ->title('Acesso negado')
            ->body('Você precisa estar autenticado para acessar esta página.')
            ->danger()
            ->send();

            redirect($this->previousUrl);
        }

        if ($user && !$verified) {

            $this->previousUrl = url()->previous();
            Notification::make()
            ->title('Acesso negado')
            ->body('Você precisa estar verificado para acessar esta página.')
            ->danger()
            ->send();

            redirect($this->previousUrl);
        }
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    
    public function getActions(): array
    {
        return [
            Action::make('viewTermo')
                ->label('Ver Termo de Consentimento de Dados')
                ->button()
                ->modalHeading('Termo de Consentimento de Dados')
                ->modalContent(fn (): View => view('components.termo-content'))
                ->modalActions([
                    ActionButton::make('close')
                        ->label('Fechar')
                        ->close(),
                ]),
        ];
    }
}
