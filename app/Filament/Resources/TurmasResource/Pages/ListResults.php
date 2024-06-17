<?php

namespace App\Filament\Resources\TurmasResource\Pages;

use App\Filament\Exports\BartleResultsExporter;
use App\Filament\Resources\TurmaResource;
use App\Filament\Resources\TurmasResource\Widgets\InlineTestResultChart;
use App\Filament\Resources\TurmasResource\Widgets\TestResultChart;
use App\Filament\Resources\TurmasResource\Widgets\TestStats;
use App\Models\Answer;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Resources\Pages\Page;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use LaraZeus\InlineChart\Tables\Columns\InlineChart;
use Ramsey\Collection\Collection;

class ListResults extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string $resource = TurmaResource::class;

    protected static string $view = 'filament.resources.turmas-resource.pages.list-results';

    public $url;

    public function table(Table $table): Table
    {
        $col = $this->getAllColumns();
        $query = Answer::select('answers.*')
            ->distinct()
            ->join('answers_classes', 'answers.id', '=', 'answers_classes.answer_id')
            ->join('classes', 'answers_classes.class_id', '=', 'classes.id')
            ->where('classes.url', $this->url);

        return $table
            ->columns([
            TextColumn::make('name')->label('Nome')->searchable(),
            TextColumn::make('age')->label('Idade'),
            ...$col
        ])
            ->recordUrl(fn (Answer $answer): string => TestResult::getUrl(['id' => $answer->id]))
            ->query($query)
            ->bulkActions([
                ExportBulkAction::make('Exportar em formato csv')
                    ->exporter(BartleResultsExporter::class)
                    ->label('Exportar resultados')
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
            $average = round($results->avg('value'), 2);

            $groupAverages->put($groupId, $average);
        });

        return $groupAverages->values()->all();
    }

    protected function getHeaderWidgets(): array
    {
        $answers = Answer::select('answers.*')
            ->distinct()
            ->join('answers_classes', 'answers.id', '=', 'answers_classes.answer_id')
            ->join('classes', 'answers_classes.class_id', '=', 'classes.id')
            ->where('classes.url', $this->url)
            ->get();

        $percentage = $this->getAverageResults($answers);

       if (count($percentage) < 4) {
           $percentage = [0,0,0,0];
       }

        return [
            TestResultChart::make([
                'result' => $percentage,
            ]),
            TestStats::make([
                'items' => $answers->count(),
                'explorador' => $percentage[0] . '%',
                'empreendedor' => $percentage[1] . '%',
                'assassino' => $percentage[2] . '%',
                'socializador' => $percentage[3] . '%'
            ])
        ];
    }

    public function getHeaderWidgetsColumns(): int|string|array
    {
        return 1;
    }
}
