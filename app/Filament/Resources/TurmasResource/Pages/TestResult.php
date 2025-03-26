<?php

namespace App\Filament\Resources\TurmasResource\Pages;

use App\Filament\Resources\TurmaResource;
use App\Filament\Resources\TurmasResource;
use App\Models\BartleResult;
use App\Models\HexadResult;
use App\Models\HexadAnswer;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
use Ramsey\Uuid\Uuid;
use App\Models\Answer;

use Illuminate\Support\Facades\Log;

class TestResult extends Page
{
    protected static string $resource = TurmaResource::class;

    protected static string $view = 'filament.resources.turmas-resource.pages.test-result';
    protected static ?string $title = '';

    /** @var BartleResult[] */
    public Collection $result;
    public $formatResult;
    public string $className;


    public function mount($id): void
    {
        $answer = Answer::with('method')->findOrFail($id);
        if ($answer->method->name === 'Hexad') {
            $this->result = HexadResult::where('answer_id', $id)
                ->with(['group', 'answer'])
                ->orderBy('group_id', 'ASC')
                ->get();

        } elseif ($answer->method->name === 'Bartle') {
            $this->result = BartleResult::where('answer_id', $id)
                ->with(['group', 'answer'])
                ->orderBy('group_id', 'ASC')
                ->get();

        }

        if ($this->result->isEmpty()) {
            abort(404, 'Resultados não encontrados.');
        }

        self::$title = 'Resultado do Teste: ' . $answer->name;

        $this->formatResult = $this->getResultTest();
    }
    
    protected function getHeaderWidgets(): array
    {       
        if ($this->result->first()->answer->method->name ==='Bartle') {
            return [
                TurmasResource\Widgets\TestResultChart::make([
                    'result' => $this->getTestValuesChart()
                ])
            ];
        } elseif ($this->result->first()->answer->method->name === 'Hexad') {            
            return [
                TurmasResource\Widgets\HexadTestResultChart::make([
                    'result' => $this->getTestValuesChart()
                ])
            ];
        }
    }

    public function getHeaderWidgetsColumns(): int|string|array
    {
        return 1;
    }

    protected function getHeaderActions(): array
    {
        return [
          Action::make('pdf')
            ->label('Baixar PDF')
            ->color('success')
            ->icon('heroicon-s-arrow-down-tray')
              ->action(function () {
                  return response()->streamDownload(function () {
                        echo Pdf::loadHtml(
                          Blade::render('mail.test.result', ['results' => $this->formatResult])
                      )->stream();
                  }, 'Resultados do Teste' . '.pdf');
              }),
        ];
    }

    public function resultInfo(Infolist $infolist)
    {
    }

    public function getResultTest(): Collection
    {
        if ($this->result->first()->answer->method->name === 'Hexad') {

            return HexadResult::formatTestResult($this->result);

        } else {

            return BartleResult::formatTestResult($this->result);
        }
    }

    public function getTestValuesChart()
    {
        if ($this->result->first()->answer->method->name === 'Hexad') {

            return $this->result->map(fn (HexadResult $result) => $result->value)->toArray();

        } else {

            return $this->result->map(fn (BartleResult $result) => $result->value)->toArray();
            
        }
    }
}
