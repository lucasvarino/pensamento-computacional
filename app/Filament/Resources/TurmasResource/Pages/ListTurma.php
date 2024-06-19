<?php

namespace App\Filament\Resources\TurmasResource\Pages;

use App\Filament\Resources\TurmaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTurma extends ListRecords
{
    protected static string $resource = TurmaResource::class;

    public function mount(): void
    {
        if (!auth()->user()) {
            $this->redirect('/login');
        }

        if (!auth()->user()->isVerified()) {
            $this->redirect('/admin');
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Criar Turma'),
        ];
    }
}
