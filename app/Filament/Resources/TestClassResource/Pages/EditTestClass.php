<?php

namespace App\Filament\Resources\TestClassResource\Pages;

use App\Filament\Resources\TestClassResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTestClass extends EditRecord
{
    protected static string $resource = TestClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
