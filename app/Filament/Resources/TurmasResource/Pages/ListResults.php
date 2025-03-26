<?php

namespace App\Filament\Resources\TurmasResource\Pages;

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
use Ramsey\Collection\Collection;
use App\Models\TestClass;

use App\Filament\Exports\BartleResultsExporter;
use App\Filament\Resources\TurmaResource;

use LaraZeus\InlineChart\Tables\Columns\InlineChart;

use App\Filament\Resources\TurmasResource\Widgets\InlineTestResultChart;
use App\Filament\Resources\TurmasResource\Widgets\TestResultChart;
use App\Filament\Resources\TurmasResource\Widgets\TestStats;

use App\Filament\Resources\TurmasResource\Widgets\HexadTestResultChart;
use App\Filament\Resources\TurmasResource\Widgets\HexadTestStats;

use Filament\Actions\Action as FilamentAction;


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
    $columns = [];
    $method = $this->url;

    if ($method === 'Bartle') {
        $columns = ['Empreendedor', 'Explorador', 'Assassino', 'Socializador'];
        return array_map(fn ($column, $key) => 
            TextColumn::make($column)
                ->state(fn (Answer $answer) => $answer->bartleResults->isNotEmpty() ? $answer->bartleResults[$key]->value . "%" : ''),
            $columns,
            array_keys($columns)
        );
    } elseif ($method === 'Hexad') {
        $columns = ['Filantropo', 'Socializadores', 'Livre Espírito', 'Conquistador', 'Disruptor', 'Jogador'];
        return array_map(fn ($column, $key) => 
            TextColumn::make($column)
                ->state(fn (Answer $answer) => $answer->hexadResults->isNotEmpty() ? $answer->hexadResults[$key]->value . "%" : ''),
            $columns,
            array_keys($columns)
        );
    }

    return [];
}

protected function getAverageResults($answers)
{
    $groupAverages = collect();

    $method = \App\Models\TestClass::where('url', $this->url)->value('method_id');

    if ($method === 1) {
        $answers->flatMap(fn($answer) => collect($answer->bartleResults))
            ->groupBy('group_id')
            ->each(fn($results, $groupId) => 
                $groupAverages->put($groupId, round($results->avg('value'), 2))
            );

            $order = [1, 2, 3, 4];

            return collect($order)
            ->map(fn($groupId) => $groupAverages->get($groupId, 0))
            ->values()
            ->all();
    } elseif ($method === 2) {
        $answers->flatMap(fn($answer) => collect($answer->hexadResults))
            ->groupBy('group_id')
            ->each(fn($results, $groupId) => 
                $groupAverages->put($groupId, round($results->avg('value'), 2))
            );

            $order = [5, 6, 7, 8, 9, 10]; // IDs corretos dos grupos

            return collect($order)
            ->map(fn($groupId) => $groupAverages->get($groupId, 0))
            ->values()
            ->all();
    }
}

protected function getHeaderWidgets(): array
{
    $answers = Answer::select('answers.*', 'classes.method_id')
        ->distinct()
        ->join('answers_classes', 'answers.id', '=', 'answers_classes.answer_id')
        ->join('classes', 'answers_classes.class_id', '=', 'classes.id')
        ->where('classes.url', $this->url)
        ->get();

    $method = \App\Models\TestClass::where('url', $this->url)->value('method_id');

    if ($method === 1) {
        $percentage = $this->getAverageResults($answers);
        if (count($percentage) < 4) {
            $percentage = [0, 0, 0, 0];
        }
        return [
            TestResultChart::make([
                'result' => $percentage,
                'title' => 'Bartle Test Results'
            ]),
            TestStats::make([
                'items' => $answers->count(),
                'empreendedor' => $percentage[0] . '%',
                'explorador' => $percentage[1] . '%',
                'assassino' => $percentage[2] . '%',
                'socializador' => $percentage[3] . '%'
            ])
        ];
    } else {
        $percentage = $this->getAverageResults($answers);
        if (count($percentage) < 6) {
            $percentage = [0, 0, 0, 0, 0, 0];
        }
        return [
            HexadTestResultChart::make([
                'result' => $percentage,
                'title' => 'Hexad Test Results'
            ]),
            HexadTestStats::make([
                'items' => $answers->count(),
                'filantropo' => $percentage[0] . '%',
                'socializadores' => $percentage[1] . '%',
                'livre_espirito' => $percentage[2] . '%',
                'conquistador' => $percentage[3] . '%',
                'disruptor' => $percentage[4] . '%',
                'jogador' => $percentage[5] . '%',
            ])
        ];
    }
}
    public function getHeaderWidgetsColumns(): int|string|array
    {
        return 1;
    }

    public function getHeaderActions(): array
    {
        return [
            FilamentAction::make('copyLink')
                ->label('Copiar link do teste')
                ->icon('heroicon-o-clipboard')
                ->color('primary')
                ->action(fn () => null)
                ->extraAttributes([
                    'x-data' => '{}',
                    'x-on:click' => "navigator.clipboard.writeText('" . url('/admin/turmas/' . $this->url . '/test') . "').then(() => alert('Link copiado!')).catch(() => alert('Falha ao copiar link!'))",
                ]),
        ];
    }
    
    

    public function getTitle(): string
    {
        $turma = \App\Models\TestClass::where('url', $this->url)->value('name');
        return "Resultados gerais da turma: " . ($turma ?? "Desconhecida");
    }
}
