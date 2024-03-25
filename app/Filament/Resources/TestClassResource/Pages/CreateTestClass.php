<?php

namespace App\Filament\Resources\TestClassResource\Pages;

use App\Filament\Resources\TestClassResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTestClass extends CreateRecord
{
    protected static string $resource = TestClassResource::class;
}
