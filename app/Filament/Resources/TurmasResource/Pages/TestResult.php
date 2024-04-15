<?php

namespace App\Filament\Resources\TurmasResource\Pages;

use App\Filament\Resources\TurmaResource;
use App\Filament\Resources\TurmasResource;
use App\Models\BartleResult;
use App\Models\Group;
use App\Models\TestClass;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Collection;

class TestResult extends Page
{
    protected static string $resource = TurmaResource::class;

    protected static string $view = 'filament.resources.turmas-resource.pages.test-result';

    public BartleResult $result;
    public Collection $group;


    public function mount(string $url, $id): void
    {
        $this->result = BartleResult::findOrFail($id);
        $this->group = Group::all();
    }

    protected function getHeaderWidgets(): array
    {
        return [
          TurmasResource\Widgets\TestResultChart::make([
              'result' => $this->result
          ])
        ];
    }

    public function getHeaderWidgetsColumns(): int|string|array
    {
        return 1;
    }

    public function resultInfo(Infolist $infolist)
    {
        return $infolist->schema([
            Section::make('Resultado do Teste')
                ->description('Descubra suas características de acordo com as questões respondidas no formulário')
                ->schema([

                ])
        ])->record($this->result);
    }
}
