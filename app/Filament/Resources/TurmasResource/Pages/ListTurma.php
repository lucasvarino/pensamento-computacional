<?php

namespace App\Filament\Resources\TurmasResource\Pages;

use App\Filament\Resources\TurmaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Notifications\Notification;

class ListTurma extends ListRecords
{
    protected static string $resource = TurmaResource::class;
    public $previousUrl;

    public function getBreadcrumb(): string
    {
        return 'Listar Turmas';
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

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Criar Turma'),
        ];
    }
}
