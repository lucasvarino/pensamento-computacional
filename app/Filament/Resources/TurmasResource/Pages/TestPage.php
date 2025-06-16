<?php

namespace App\Filament\Resources\TurmasResource\Pages;

use App\Filament\Resources\TurmaResource;
use App\Models\Answer;
use App\Models\AnswerClass;
use App\Models\BartleResult;
use App\Models\HexadAnswer;
use App\Models\HexadResult;
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
use Filament\Notifications\Actions\Action as NotificationAction; 
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Filament\Pages\Actions\CreateAction;
use Filament\Pages\Actions\ButtonAction;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions\Action;

class TestPage extends Page
{
    protected static string $resource = TurmaResource::class;

    protected static string $view = 'filament.resources.turmas-resource.pages.test-page';

    public TestClass $testClass;

    public ?array $data = [];

    public bool $expirated = false;

    public function getTitle(): string
    {
        return $this->testClass->name;
    }

    public function mount(string $url): void
    {
        $this->testClass = TestClass::where('url', $url)->firstOrFail();

        if ($this->testClass->expire_date && Carbon::now()->greaterThan($this->testClass->expire_date)) {
            $this->expirated = true;
        }
        
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
                'state' => $states['state'],
                'method_id' => $this->testClass->method_id,
            ]);

            $answers = array_filter($states, fn ($key) => $key !== 'name' && $key !== 'age' && $key !== 'gender' && $key !== 'state' && $key !== 'sendEmail' && $key !== 'email', ARRAY_FILTER_USE_KEY);
            
            foreach ($answers as $response) {
                AnswerClass::create([
                    'answer_id' => $answer->id,
                    'class_id' => $this->testClass->id,
                    'answer_option_id' => $response
                ]);
            }

        if ($this->testClass->method->name === 'Hexad') {
            foreach ($answers as $question_id => $value) {
                $group_id = DB::table('hexad_question_groups')
                    ->where('question_id', $question_id)
                    ->where('method_id', 2)
                    ->value('group_id');
            
                HexadAnswer::create([
                    'answer_id' => $answer->id,
                    'class_id' => $this->testClass->id,
                    'question_id' => $question_id,
                    'group_id' => $group_id,
                    'value' => $value,
                ]);
            }
        }

            $allAnswers = AnswerClass::where('answer_id', $answer->id)->get();

            // HEXAD calc
            if ($this->testClass->method->name === 'Hexad') {

                $allHexadAnswers = \App\Models\HexadAnswer::where('answer_id', $answer->id)->get();
                $totalSum = $allHexadAnswers->sum('value');
            
                $hexadGroups = DB::table('hexad_question_groups')
                    ->where('method_id', $this->testClass->method_id)
                    ->get()
                    ->groupBy('group_id');
            
                $hexadResults = $hexadGroups->map(function ($questions, $groupId) use ($allHexadAnswers, $totalSum, $answer) {
                    $questionIds = $questions->pluck('question_id');
                    $groupSum = $allHexadAnswers->whereIn('question_id', $questionIds)->sum('value');
                    
                    $rawScore = ($totalSum > 0) ? ($groupSum / $totalSum) * 100 : 0;
                    $score = round($rawScore, 2);
            
                    return ['group_id' => $groupId, 'value' => $score, 'answer_id' => $answer->id];
                })->map(fn (array $arr) => \App\Models\HexadResult::create($arr));
            }

        
        // BARTLE calc
        if ($this->testClass->method->name === 'Bartle') {
            $bartleResults = collect(range(1, 4))
                ->map(function ($groupId) use ($allAnswers, $answer) {
                    $value = $allAnswers
                            ->filter(fn ($answer) => $answer->answerOption->group_id === $groupId)
                            ->count() * (100 / 15);

                    return ['group_id' => $groupId, 'value' => $value, 'answer_id' => $answer->id];
                })->map(fn (array $arr) => BartleResult::create($arr));
        }

        if ($states['sendEmail'] && $states['email']) {
            $testType = strtolower($this->testClass->method->name);

            if ($testType === 'hexad') {
                $results = HexadResult::where('answer_id', $answer->id)->get();
            } elseif ($testType === 'bartle') {
                $results = BartleResult::where('answer_id', $answer->id)->get();
            } else {
                $results = collect();
            }

            Mail::to($states['email'])
                ->send(new \App\Mail\TestResult($results, $this->testClass->name, $testType));

            Notification::make()
                ->title('E-mail enviado com sucesso!')
                ->body('Não esqueça de verificar sua caixa de spam.')
                ->warning()
                ->send();
        }

            Notification::make()
                ->title('O aluno ' . $states['name']. ' respondeu à pesquisa da turma ' . $this->testClass->name)
                ->success()
                ->body('Clique para ver o resultado individual do aluno')
                ->actions([
                    NotificationAction::make('Acessar')
                        ->link()
                        ->url('/admin/turmas/test/' . $answer->id . '/result')
                ])
                ->sendToDatabase($this->testClass->user);

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
            if ($this->testClass->method->name === 'Hexad') {
                    $options = [
                        1 => 'Discordo totalmente',
                        2 => 'Discordo',
                        3 => 'Discordo um pouco',
                        4 => 'Neutro',
                        5 => 'Concordo um pouco',
                        6 => 'Concordo',
                        7 => 'Concordo totalmente',
                    ];
                } else {
                    $options = $question->answerOptions->keyBy('id')->map(fn ($option) => $option->title)->toArray();
                }
                
                return Radio::make($question->id)
                ->label(($index + 1) . ') ' . $question->title)
                    ->options($options)
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
                        Checkbox::make('term')
                            ->label('Aceita o Termo de Consentimento Livre e Esclarecido')
                            ->required(),
                        Checkbox::make('sendEmail')
                            ->label('Enviar resultado do teste por e-mail?')
                            ->live(),
                        TextInput::make('email')
                            ->label('E-mail')
                            ->email()
                            ->required(fn (Get $get): bool => $get('sendEmail'))
                            ->visible(fn (Get $get): bool => (bool) $get('sendEmail'))
                            ->helperText('Não esqueça de verificar a caixa de spam (lixo eletrônico) caso não receba o e-mail na sua caixa de entrada.'),
                    ])->columns(2),
                Section::make('Questionário')
                    ->description('Responda o questionário e em seguida mostraremos o resultado')
                    ->schema($questions),
            ])->statePath('data');
    }

    public function getActions(): array{
        return [
            Action::make('viewTermo')
                ->label('Ver Termo de Consentimento Livre e Esclarecido')
                ->button()
                ->modalHeading('Termo de Consentimento Livre e Esclarecido')
                ->modalContent(fn (): View => view('components.termo-content-participant'))
                ->modalSubmitAction(false)
                ->modalCancelActionLabel('Fechar'),
        ];
    }
}
