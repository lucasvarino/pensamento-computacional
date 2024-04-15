<?php

namespace App\Filament\Resources;

use App\Filament\Pages\Test;
use App\Filament\Resources\TurmasResource\Pages;
use App\Filament\Resources\TurmasResource\RelationManagers;
use App\Models\AnswerOption;
use App\Models\TestClass;
use App\Models\Turmas;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TurmaResource extends Resource
{
    protected static ?string $model = TestClass::class;
    protected static ?string $label = "Turmas";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()->label('Nome'),
                Forms\Components\TextInput::make('institution')->required()->label('Instituição'),
                Forms\Components\DatePicker::make('expire_date')->label('Data de Expiração'),
                Forms\Components\Select::make('method_id')
                    ->relationship('method', 'name')
                    ->required()
                    ->label('Método'),
                Forms\Components\Hidden::make('user_id')->default(auth()->user()->id)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nome da turma')->searchable(),
                Tables\Columns\TextColumn::make('institution')->label('Instituição'),
                Tables\Columns\TextColumn::make('method.name')->label('Método utilizado'),
                Tables\Columns\TextColumn::make('expire_date')->dateTime()->label('Data de expiração')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('link')->label('Copiar link')
                        ->url(fn (TestClass $class): string => $class->url)
                        ->openUrlInNewTab()
                        ->color('success')
                        ->icon('heroicon-m-clipboard-document'),
                    Tables\Actions\EditAction::make()->label('Editar'),
                    Tables\Actions\DeleteAction::make()->label('Apagar')
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTurma::route('/'),
            'test' => Pages\TestPage::route('{url}/test'),
            'result' => Pages\TestResult::route('{url}/test/{id}/result'),
            'create' => Pages\CreateTurma::route('/create'),
            'edit' => Pages\EditTurma::route('/{record}/edit'),
        ];
    }
}
