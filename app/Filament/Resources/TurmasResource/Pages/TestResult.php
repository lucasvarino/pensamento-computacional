<?php

namespace App\Filament\Resources\TurmasResource\Pages;

use App\Filament\Resources\TurmaResource;
use App\Filament\Resources\TurmasResource;
use App\Models\BartleResult;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Collection;

class TestResult extends Page
{
    protected static string $resource = TurmaResource::class;

    protected static string $view = 'filament.resources.turmas-resource.pages.test-result';
    protected static ?string $title = '';

    /** @var BartleResult[] */
    public Collection $result;
    public $formatResult;


    public function mount($id): void
    {
        $this->result = BartleResult::where('answer_id', $id)
            ->with(['group', 'answer'])
            ->orderBy('group_id', 'ASC')
            ->get();

        self::$title = 'Resultado do Teste: ' . $this->result->first()->answer->name;

        $this->formatResult = $this->getResultTest();
    }

    protected function getHeaderWidgets(): array
    {
        return [
          TurmasResource\Widgets\TestResultChart::make([
              'result' => $this->getTestValuesChart()
          ])
        ];
    }

    public function getHeaderWidgetsColumns(): int|string|array
    {
        return 1;
    }

    public function resultInfo(Infolist $infolist)
    {
    }

    public function getResultTest()
    {
        return $this->result->map(function (BartleResult $result) {
           return [
               'group' => $result->group->name,
               'value' => $result->value,
               'description' => $result->group->description
           ];
        });
    }

    public function getTestValuesChart()
    {
        return $this->result->map(fn (BartleResult $result) => $result->value)->toArray();
    }
}
