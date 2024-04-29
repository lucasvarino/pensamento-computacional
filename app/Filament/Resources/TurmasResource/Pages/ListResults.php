<?php

namespace App\Filament\Resources\TurmasResource\Pages;

use App\Filament\Resources\TurmaResource;
use App\Models\Answer;
use App\Models\BartleResult;
use Filament\Resources\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class ListResults extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string $resource = TurmaResource::class;

    protected static string $view = 'filament.resources.turmas-resource.pages.list-results';

    public function table(Table $table): Table
    {
        $col = $this->getAllColumns();
        return $table->columns([
            TextColumn::make('name')->label('Nome'),
            TextColumn::make('age')->label('Idade'),
            ...$col
        ])->query(Answer::latest()->with('bartleResults'));
    }

    public function getAllColumns(): array
    {
        $columns = ['Empreendedor', 'Explorador', 'Assassino', 'Socializador'];
        $textColumns = [];

        foreach ($columns as $key => $column) {
            $textColumns[] = TextColumn::make($column)->state(fn (Answer $answer) => $answer->bartleResults->isNotEmpty() ? $answer->bartleResults[$key]->value . "%" : '');
        }

        return $textColumns;
    }
}
