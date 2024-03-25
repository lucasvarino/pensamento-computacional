<?php

namespace App\Filament\Resources\TestClassResource\Pages;

use App\Filament\Resources\TestClassResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTestClasses extends ListRecords
{
    protected static string $resource = TestClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
