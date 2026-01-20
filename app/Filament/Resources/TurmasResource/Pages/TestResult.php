<?php

namespace App\Filament\Resources\TurmasResource\Pages;

use App\Filament\Resources\TurmaResource;
use App\Filament\Resources\TurmasResource;
use App\Models\BartleResult;
use App\Models\HexadResult;
use App\Models\EGameFlowResult;
use App\Models\HexadAnswer;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
use Ramsey\Uuid\Uuid;
use App\Models\Answer;
use Illuminate\Contracts\Support\Htmlable;

class TestResult extends Page
{
    protected static string $resource = TurmaResource::class;

    protected static string $view = 'filament.resources.turmas-resource.pages.test-result';
    protected static ?string $title = '';

    public function getBreadcrumb(): string
    {
        return 'Resultado Individual';
    }

    public function getTitle(): string | Htmlable
    {
        if (auth()->user()?->isVerified()) {
            return 'Resultado do Teste de ' . $this->answer->name;
        }
        
        return 'Resultado do Teste '. $this->answer->method->name . '';

        // if ($this->answer->method->name === 'Hexad') {
        //     return 'Resultado do Teste Hexad';
        // }
        
        // if ($this->answer->method->name === 'Bartle') {
        //     return 'Resultado do Teste de Bartle';
        // }
        
        // if ($this->answer->method->name === 'eGameFlow') {
        //     return 'Resultado do Teste de eGameFlow';
        // }

        // return 'Resultado do Teste';
    }

    /** @var BartleResult[] */
    public Collection $result;
    public $formatResult;
    public string $className;
    public Answer $answer;


    public function mount($id): void
    {
        $this->answer = Answer::with('method')->findOrFail($id);
        // $answer = Answer::with('method')->findOrFail($id);
        // if ($answer->method->name === 'Hexad') {
        //     $this->result = HexadResult::where('answer_id', $id)
        //         ->with(['group', 'answer'])
        //         ->orderBy('group_id', 'ASC')
        //         ->get();

        // } elseif ($answer->method->name === 'Bartle') {
        //     $this->result = BartleResult::where('answer_id', $id)
        //         ->with(['group', 'answer'])
        //         ->orderBy('group_id', 'ASC')
        //         ->get();

        // }

        if ($this->answer->method->name === 'Hexad') {
            $this->result = HexadResult::where('answer_id', $id)
                ->with(['group', 'answer'])
                ->orderBy('group_id', 'ASC')
                ->get();
        } elseif ($this->answer->method->name === 'eGameFlow') {
            $this->result = EGameFlowResult::where('answer_id', $id)
                ->with(['group', 'answer'])
                ->orderBy('group_id', 'ASC')
                ->get();
        } elseif ($this->answer->method->name === 'Bartle') {
            $this->result = BartleResult::where('answer_id', $id)
                ->with(['group', 'answer'])
                ->orderBy('group_id', 'ASC')
                ->get();
        }

        if ($this->result->isEmpty()) {
            abort(404, 'Resultados não encontrados.');
        }

        // if($this->user->isVerified() === false){
        //     if ($answer->method->name === 'Hexad') {
        //         self::$title = 'Resultado do Teste Hexad';
        //     } elseif ($answer->method->name === 'Bartle') {
        //         self::$title = 'Resultado do Teste Bartle';
        //     } else {
        //         self::$title = 'Resultado do Teste';
        //     }
        // }

        // if($this->user->isVerified() === true){
        //     self::$title = 'Resultado do Teste de ' . $answer->name;
        // }

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
        // elseif ($this->result->first()->answer->method->name === 'eGameFlow') {
            return [
                TurmasResource\Widgets\EGameFlowTestResultChart::make([
                    'result' => $this->getTestValuesChart()
                ])
            ];
        // }
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
            ->color('primary')
            ->icon('heroicon-s-arrow-down-tray')
            ->action(function () {
                return response()->streamDownload(function () {
                      echo Pdf::loadHtml(
                        Blade::render('pdf.test.test-result-pdf', ['formatResult' => $this->formatResult])
                    )->stream();
                }, 'Resultados do Teste' . '.pdf');
            }),
            // ->url(function () {
            //     $pdf = Pdf::loadView('pdf.test.test-result-pdf', ['formatResult' => $this->formatResult]);
            //     return $pdf->download('invoice.pdf');
            // })
            // ->openUrlInNewTab(),
        ];
    }

    public function resultInfo(Infolist $infolist)
    {
    }

    public function getResultTest(): Collection
    {
        if ($this->result->first()->answer->method->name === 'Hexad') {

            return HexadResult::formatTestResult($this->result);

        } elseif ($this->result->first()->answer->method->name === 'Bartle') {

            return BartleResult::formatTestResult($this->result);

        } 
        // elseif ($this->result->first()->answer->method->name === 'eGameFlow') {

            return EGameFlowResult::formatTestResult($this->result);
        // }
    }

    public function getTestValuesChart()
    {
        if ($this->result->first()->answer->method->name === 'Hexad') {

            return $this->result->map(fn (HexadResult $result) => $result->value)->toArray();

        } elseif ($this->result->first()->answer->method->name === 'Bartle') {

            return $this->result->map(fn (BartleResult $result) => $result->value)->toArray();
            
        } elseif ($this->result->first()->answer->method->name === 'eGameFlow') {

            return $this->result->map(fn (EGameFlowResult $result) => $result->value)->toArray();
        }
    }
}