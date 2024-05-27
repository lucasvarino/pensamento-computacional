<?php

namespace App\Livewire;

use App\Models\GroupResult;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ListGroupResult extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(GroupResult::query())
            ->columns([
                TextColumn::make('nome')->sortable(),
                TextColumn::make('achiever')->sortable(),
                TextColumn::make('explorer')->sortable(),
                TextColumn::make('killer')->sortable(),
                TextColumn::make('socializer')->sortable(),
                TextColumn::make('predominante'),
            ])
            ->paginated()
            ->actions([
                Action::make('Ver gráfico')
                    ->action(fn(GroupResult $record) => $record->test())
                    ->modalContent(function (GroupResult $result) {
                        $data = ['data' => [$result->achiever, $result->explorer, $result->killer, $result->socializer]];
                        return view('groupResult', compact('data'));
                    })
                    ->modalSubmitAction(false)
                    ->button()
                    ->color('info')
            ]);
    }

    public function render(): View
    {
        return view('livewire.list-group-result');
    }
}
