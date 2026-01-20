<?php

namespace App\Filament\Resources\TurmasResource\Pages;

use App\Models\Answer;

use Filament\Resources\Pages\Page;
use Filament\Notifications\Notification;

use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Actions\DeleteBulkAction;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

use App\Models\TestClass;

use App\Filament\Exports\BartleResultsExporter;
use App\Filament\Resources\TurmaResource;

use App\Filament\Resources\TurmasResource\Widgets\TestResultChart;
use App\Filament\Resources\TurmasResource\Widgets\TestStats;

use App\Filament\Resources\TurmasResource\Widgets\HexadTestResultChart;
use App\Filament\Resources\TurmasResource\Widgets\HexadTestStats;
use App\Filament\Exports\HexadResultsExporter;

use App\Filament\Resources\TurmasResource\Widgets\EGameFlowTestResultChart;
use App\Filament\Resources\TurmasResource\Widgets\EGameFlowTestStats;
use App\Filament\Exports\EGameFlowExporter;

use Webbingbrasil\FilamentCopyActions\Pages\Actions\CopyAction;

class ListResults extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string $resource = TurmaResource::class;

    protected static string $view = 'filament.resources.turmas-resource.pages.list-results';

    protected $listeners = ['refreshPageComponents' => '$refresh'];

    public static function canAccess(array $parameters = []): bool
    {
        return auth()->check() && auth()->user()->isVerified();
    }

    public function getBreadcrumb(): string
    {
        return 'Visão Geral';
    }

    public $url;

    public function table(Table $table): Table
    {
        $col = $this->getAllColumns();
        $query = Answer::select('answers.*')
            ->distinct()
            ->join('answers_classes', 'answers.id', '=', 'answers_classes.answer_id')
            ->join('classes', 'answers_classes.class_id', '=', 'classes.id')
            ->where('classes.url', $this->url);

        $methodId = TestClass::where('url', $this->url)->value('method_id');

        if($methodId == 1)
            $exporterClass = BartleResultsExporter::class;
        elseif($methodId == 2)
            $exporterClass = HexadResultsExporter::class;
        elseif($methodId == 3)
            $exporterClass = EGameFlowExporter::class;

        return $table
            ->columns([
            TextColumn::make('name')->label('Nome')->searchable()->sortable(),
            TextColumn::make('age')->label('Idade')->sortable(),
            ...$col
            // ...$this->getAllColumns(),
        ])
            ->recordUrl(fn (Answer $answer): string => TestResult::getUrl(['id' => $answer->id]))
            ->query($query)
            ->bulkActions([
                ExportBulkAction::make('Exportar em formato csv')
                    ->exporter($exporterClass)
                    ->label('Exportar resultados')
                    ->modalHeading('Selecione as colunas para exportar')
                    ->modalSubheading(''),
                DeleteBulkAction::make()
                    ->label('Deletar respostas')
                    ->requiresConfirmation()
                    ->modalHeading('Tem certeza que deseja excluir as respostas selecionadas?')
                    ->modalButton('Sim, excluir')
                    ->modalSubheading('Esta ação não poderá ser desfeita.')  
                    ->action(function ($records) {
                        $records->each->delete();
                        
                        Notification::make()
                            ->title('Registros deletados com sucesso')
                            ->body('Atualize a página para ver as alterações.')
                            ->success()
                            ->send();
                        })
                ])->striped();
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
    } elseif ($method === 'eGameFlow') {
        $columns = ['Concentração', 'Desafios', 'Autonomia', 'Objetivos', 'Feedback', 'Imersão', 'Interação Social', 'Melhoria de Conhecimento'];
        return array_map(fn ($column, $key) => 
            TextColumn::make($column)
                ->state(fn (Answer $answer) => $answer->eGameFlowResults->isNotEmpty() ? $answer->eGameFlowResults[$key]->value . "%" : ''),
            $columns,
            array_keys($columns)
        );
    }

    return [];
}

protected function getAverageResults($answers)
{
    $groupAverages = collect();

    $method = TestClass::where('url', $this->url)->value('method_id');

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

            $order = [5, 6, 7, 8, 9, 10];

            return collect($order)
            ->map(fn($groupId) => $groupAverages->get($groupId, 0))
            ->values()
            ->all();
    } elseif ($method === 3) {
        $answers->flatMap(fn($answer) => collect($answer->eGameFlowResults))
            ->groupBy('group_id')
            ->each(fn($results, $groupId) => 
                $groupAverages->put($groupId, round($results->avg('value'), 2))
            );

            $order = [11, 12, 13, 14, 15, 16, 17, 18];

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

    $method = TestClass::where('url', $this->url)->value('method_id');

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
    } elseif ($method === 2) {
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
    } elseif ($method === 3) {
        $percentage = $this->getAverageResults($answers);
        if (count($percentage) < 8) {
            $percentage = [0, 0, 0, 0, 0, 0, 0, 0];
        }
        return [
            EGameFlowTestResultChart::make([
                'result' => $percentage,
                'title' => 'eGameFlow Test Results'
            ]),
            EGameFlowTestStats::make([
                'items' => $answers->count(),
                'concentracao' => $percentage[0] . '%',
                'desafios' => $percentage[1] . '%',
                'autonomia' => $percentage[2] . '%',
                'objetivos' => $percentage[3] . '%',
                'feedback' => $percentage[4] . '%',
                'imersao' => $percentage[5] . '%',
                'interacao_social' => $percentage[6] . '%',
                'melhoria_de_conhecimento' => $percentage[7] . '%',
            ])
        ];
    } else {
        return [];
    }
}
    public function getHeaderWidgetsColumns(): int|string|array
    {
        return 1;
    }

    public function copyLink(): void
    {
        $link = url('/admin/turmas/' . $this->url . '/test');
        $this->emit('copyTestLink', $link);
    }
    
    public function getHeaderActions(): array
    {
        return [
            CopyAction::make('copyTestLink')
                ->label('Copiar link do teste')
                ->copyable(fn () => url('/admin/turmas/' . $this->url . '/test'))
                ->successNotificationTitle('Link copiado com sucesso!'),
        ];
    }

    public function getTitle(): string
    {
        $turma = TestClass::where('url', $this->url)->value('name');
        return "Resultados gerais da turma: " . ($turma ?? "Desconhecida");
    }
}