<?php

namespace App\Filament\Resources\TurmasResource\Pages;

use App\Filament\Resources\TurmaResource;
use App\Models\Answer;
use App\Models\AnswerClass;
use App\Models\BartleResult;
use App\Models\Group;
use App\Models\Question;
use App\Models\State;
use App\Models\TestClass;
use Carbon\Carbon;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TestPage extends Page
{
    protected static string $resource = TurmaResource::class;

    protected static string $view = 'filament.resources.turmas-resource.pages.test-page';

    protected static ?string $title = '';

    public TestClass $testClass;

    public ?array $data = [];

    public bool $expirated = false;

    public function mount(string $url): void
    {
        $this->testClass = TestClass::where('url', $url)->firstOrFail();

        if (Carbon::now() > $this->testClass->expire_date) {
            $this->expirated = true;
        }

        self::$title = $this->testClass->name;
        $this->form->fill();
    }

    public function create(): void
    {
        $states = $this->form->getState();

        DB::transaction(function () use ($states) {
            $answer = Answer::create([
                'name' => $states['name'],
                'age' => $states['age'],
                'gender' => $states['gender'],
                'state' => $states['state']
            ]);

            $answers = array_filter($states, fn ($key) => $key !== 'name' && $key !== 'age' && $key !== 'gender' && $key !== 'state' && $key !== 'sendEmail' && $key !== 'email', ARRAY_FILTER_USE_KEY);

            foreach ($answers as $response) {
                AnswerClass::create([
                    'answer_id' => $answer->id,
                    'class_id' => $this->testClass->id,
                    'answer_option_id' => $response
                ]);
            }

            $allAnswers = AnswerClass::where('answer_id', $answer->id)->get();

            $results = collect(range(1, 4))
                ->map(function ($groupId) use ($allAnswers, $answer) {
                    $value = $allAnswers
                            ->filter(fn ($answer) => $answer->answerOption->group_id === $groupId)
                            ->count() * (100 / 15);

                    return ['group_id' => $groupId, 'value' => $value, 'answer_id' => $answer->id];
                })->map(fn (array $arr) => BartleResult::create($arr));


            if ($states['sendEmail'] && $states['email']) {
                Mail::to($states['email'])
                    ->send(new \App\Mail\TestResult($results, $this->testClass->name));
            }

            // Notify the owner of the class
            Notification::make()
                ->title('O aluno ' . $states['name']. ' respondeu à pesquisa da turma ' . $this->testClass->name)
                ->success()
                ->body('Clique para ver o resultado individual do aluno')
                ->actions([
                    Action::make('Acessar')
                        ->link()
                        ->url('/admin/turmas/test/' . $answer->id . '/result')
                ])
                ->sendToDatabase($this->testClass->user);

            // Redirect the user
            $this->redirect('/admin/turmas/test/' . $answer->id . '/result');
        });
        $this->reset();
    }

    public function form(Form $form): Form
    {
        $questions = Question::query()
            ->where('method_id', $this->testClass->method->id)
            ->get();

        $questions = $questions->map(function (Question $question, $index) {
            return Radio::make($question->id)
                ->label($index + 1 . ') ' . $question->title)
                ->options($question->answerOptions->keyBy('id')->map(fn ($option) => $option->title)->toArray())
                ->required();
        })->toArray();

        $states = State::all()->pluck('name', 'id')->toArray();

        return $form
            ->schema([
                Section::make('Dados Pessoais')
                    ->description('Insira seus dados para identificação')
                    ->schema([
                        TextInput::make('name')->label('Nome Completo')->required(),
                        TextInput::make('age')->label('Idade')->numeric()->required(),
                        Select::make('gender')
                            ->options([
                                'M' => 'Masculino',
                                'F' => 'Feminino'
                            ])
                            ->native(false)
                            ->required()
                            ->label('Gênero'),
                        Select::make('state')
                            ->options($states)
                            ->searchable()
                            ->required()
                            ->native(false)
                            ->label('Estado'),
                        Checkbox::make('sendEmail')
                            ->label('Enviar resultado do teste por e-mail?')
                            ->live(),
                        TextInput::make('email')
                            ->label('E-mail')
                            ->email()
                            ->required(fn (Get $get): bool => $get('sendEmail'))
                            ->visible(fn (Get $get): bool => $get('sendEmail')),
                    ])->columns(2),
                Section::make('Questionário')
                    ->description('Responda o questionário e em seguida mostraremos o resultado')
                    ->schema($questions),
            ])->statePath('data');
    }
}
