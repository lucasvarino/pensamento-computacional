<?php

namespace App\Filament\Resources\TurmasResource\Pages;

use App\Filament\Resources\TurmaResource;
use App\Models\Answer;
use App\Models\AnswerClass;
use App\Models\Question;
use App\Models\TestClass;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\DB;

class TestPage extends Page
{
    protected static string $resource = TurmaResource::class;

    protected static string $view = 'filament.resources.turmas-resource.pages.test-page';

    protected static ?string $title = '';

    protected static ?string $navigationLabel = 'Teste de Bartle';

    public TestClass $testClass;

    public ?array $data = [];

    public function mount(string $url): void
    {
        $this->testClass = TestClass::where('url', $url)->firstOrFail();
        self::$title = $this->testClass->name;
        $this->form->fill();
    }

    public function create(): void
    {
        $states = $this->form->getState();

        DB::transaction(function () use ($states) {
            $answer = Answer::create([
                'name' => $states['name'],
                'age' => $states['age']
            ]);

            $states = array_filter($states, fn ($key) => $key !== 'name' && $key !== 'age', ARRAY_FILTER_USE_KEY);

            foreach ($states as $response) {
                AnswerClass::create([
                    'answer_id' => $answer->id,
                    'class_id' => $this->testClass->id,
                    'answer_option_id' => $response
                ]);
            }
        });
    }

    public function form(Form $form): Form
    {
        $questions = Question::query()
            ->where('method_id', 1)
            ->get();

        $questions = $questions->map(function (Question $question, $index) {
            return Radio::make($question->id)
                ->label($index + 1 . ') ' . $question->title)
                ->options($question->answerOptions->keyBy('id')->map(fn ($option) => $option->title)->toArray())
                ->required();
        })->toArray();

        return $form
            ->schema([
                Section::make('Dados Pessoais')
                    ->description('Insira seus dados para identificação')
                    ->schema([
                        TextInput::make('name')->label('Nome Completo')->required(),
                        TextInput::make('age')->label('Idade')->numeric()->required(),
                    ])->columns(2),
                Section::make('Questionário')
                    ->description('Responda o questionário e em seguida mostraremos o resultado')
                    ->schema($questions),
            ])->statePath('data');
    }
}
