<?php

namespace App\Filament\Widgets;

use App\Models\Answer;
use App\Models\AnswerClass;
use App\Models\HexadAnswer;
use Filament\Tables;
use Filament\Tables\Table;
use EightyNine\FilamentAdvancedWidget\AdvancedTableWidget as BaseWidget;

class LastestTestSubmit extends BaseWidget
{
    protected static ?string $heading = "Últimos alunos que responderam os testes";

    public function getHeading(): string
    {
        return '';
    }

    public static function canView(): bool
    {
        $user = auth()->user();
        return $user && $user->isVerified() && !$user->isAdmin();
    }

    public function table(Table $table): Table
    {
        $user = auth()->user();
        $classIds = $user->classes()->pluck('id');

        // Verifica se o usuário tem turmas
        if ($classIds->isEmpty()) {
            return $table->query(Answer::whereRaw('1 = 0')); // Retorna uma consulta vazia
        }

        // Subconsulta para obter o answer_id mais recente por turma
        $latestAnswers = AnswerClass::select('answer_id', 'created_at')
            ->whereIn('class_id', $classIds)
            ->union(
                HexadAnswer::select('answer_id', 'created_at')
                    ->whereIn('class_id', $classIds)
            )
            ->orderByDesc('created_at') // Ordena pela data mais recente
            ->get();

        // Obtém as respostas mais recentes baseadas na subconsulta
        $latestSubmissions = Answer::whereIn('id', $latestAnswers->pluck('answer_id'))
        ->with([
            'answersClasses.classe',
            'hexadAnswers.classe'
        ]);

        return $table
            ->query($latestSubmissions)
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Aluno')
                    ->sortable(),
                    Tables\Columns\TextColumn::make('test_class_name')
                    ->label('Turma')
                    ->sortable(),
            ])
            ->defaultPaginationPageOption(5)
            ->paginated([5, 10, 25, 50, 100, 'all']);
    }
}
