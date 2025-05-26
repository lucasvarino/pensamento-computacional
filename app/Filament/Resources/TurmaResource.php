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
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;
use Webbingbrasil\FilamentCopyActions\Tables\Actions\CopyAction;



class TurmaResource extends Resource
{
    protected static ?string $model = TestClass::class;
    protected static ?string $label = "Turmas";

    public static function getNavigationIcon(): ?string
    {
        return request()->routeIs('filament.admin.resources.turmas.*')
            ? 'icon-turma'
            : 'icon-turma-b&w';
    }

    public static function form(Form $form): Form
    {
            return $form
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->label('Nome')
                        ->placeholder('Digite o nome da turma'),
                    Forms\Components\TextInput::make('institution')
                        ->required()
                        ->label('Instituição')
                        ->placeholder('Digite o nome da Instituição'),
                    Forms\Components\DatePicker::make('expire_date')
                        ->label('Data de Expiração'),
                    Forms\Components\Select::make('method_id')
                        ->relationship('method', 'name')
                        ->required()
                        ->label('Método')
                        ->disabled(fn (?TestClass $record) => filled($record)),
                    Forms\Components\Checkbox::make('term')
                        ->label('Aceita o Termo de Consentimento de Dados')
                        ->required(),
                        Forms\Components\Hidden::make('user_id')
                        ->default(fn() => Auth::id())
                        ->required(),
                    Forms\Components\Hidden::make('url')
                        ->default(Str::uuid()->toString())
                ]);
    }

    public static function table(Table $table): Table
    {
        $isAdmin = auth()->user()?->isAdmin() ?? false;
        $query = $isAdmin ? TestClass::query() : TestClass::where('user_id', auth()->user()?->id);
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nome da turma')->searchable(),
                Tables\Columns\TextColumn::make('institution')->label('Instituição'),
                Tables\Columns\TextColumn::make('method.name')->label('Método utilizado'),
                Tables\Columns\TextColumn::make('user.name')->label('Organizador')->visible($isAdmin),
                Tables\Columns\TextColumn::make('expire_date')->date("d-m-Y")->label('Data de expiração')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    CopyAction::make('copyTestLink')
                        ->label('Copiar link do teste')
                        ->icon('heroicon-o-clipboard')
                        ->copyable(fn (\App\Models\TestClass $record) => url('/admin/turmas/' . $record->url . '/test'))
                        ->successNotificationMessage('Link copiado com sucesso!'),
                    Tables\Actions\Action::make('link')->label('Abrir teste')
                        ->url(fn (TestClass $class): string => '/admin/turmas/' . $class->url . '/test')
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
            ])
            ->recordUrl(fn (TestClass $testClass) => ('/admin/turmas/' . $testClass->url . '/results'))
            ->query($query->orderByDesc('created_at'));
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
            'result' => Pages\TestResult::route('/test/{id}/result'),
            'results' => Pages\ListResults::route('{url}/results'),
            'create' => Pages\CreateTurma::route('/create'),
            'edit' => Pages\EditTurma::route('/{record}/edit'),
        ];
    }
}
