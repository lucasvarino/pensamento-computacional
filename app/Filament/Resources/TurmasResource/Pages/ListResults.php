<?php

namespace App\Filament\Resources\TurmasResource\Pages;

use App\Filament\Resources\TurmaResource;
use App\Filament\Resources\TurmasResource\Widgets\InlineTestResultChart;
use App\Filament\Resources\TurmasResource\Widgets\TestResultChart;
use App\Filament\Resources\TurmasResource\Widgets\TestStats;
use App\Models\Answer;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use Filament\Resources\Pages\Page;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use LaraZeus\InlineChart\Tables\Columns\InlineChart;
use Ramsey\Collection\Collection;

class ListResults extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string $resource = TurmaResource::class;

    protected static string $view = 'filament.resources.turmas-resource.pages.list-results';

    public function table(Table $table): Table
    {
        $col = $this->getAllColumns();
        return $table
            ->columns([
            InlineChart::make('Gráfico')->chart(InlineTestResultChart::class)
                ->maxHeight(300)
                ->maxWidth(350),
            TextColumn::make('name')->label('Nome')->searchable(),
            TextColumn::make('age')->label('Idade'),
            ...$col
        ])
            ->recordUrl(fn (Answer $answer): string => TestResult::getUrl(['id' => $answer->id]))
            ->query(Answer::latest()->with('bartleResults'))
            ->bulkActions([
                BulkAction::make('Exportar em formato csv')
            ]);
    }

    public function getAllColumns(): array
    {
        $columns = ['Empreendedor', 'Explorador', 'Assassino', 'Socializador'];
        $textColumns = [];

        foreach ($columns as $key => $column) {
            $textColumns[] = TextColumn::make($column)->state(fn(Answer $answer) => $answer->bartleResults->isNotEmpty() ? $answer->bartleResults[$key]->value . "%" : '');
        }

        return $textColumns;
    }

    public function getAverageResults($answers)
    {
        $groupAverages = collect();

        $answers->flatMap(function ($answer) {
            return collect($answer->bartleResults);
        })->groupBy('group_id')->each(function ($results, $groupId) use ($groupAverages) {
            $average = $results->avg('value');

            $groupAverages->put($groupId, $average);
        });

        return $groupAverages->values()->all();
    }

    protected function getHeaderWidgets(): array
    {
       $answers = Answer::latest()->get();
        return [
            TestResultChart::make([
                'result' => $this->getAverageResults($answers),
            ]),
            TestStats::make([
                'items' => $answers->count()
            ])
        ];
    }

    public function getHeaderWidgetsColumns(): int|string|array
    {
        return 1;
    }
}
