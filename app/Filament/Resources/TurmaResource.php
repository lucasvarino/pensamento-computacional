<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TurmasResource\Pages;
use App\Models\TestClass;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\Layout\Split;
use Filament\Support\Enums\Alignment;
use Filament\Tables\Actions\HeaderActionsPosition;
use Filament\Forms\Components\Toggle;
use Webbingbrasil\FilamentCopyActions\Tables\Actions\CopyAction;
use Illuminate\Support\Arr;




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

    protected $listeners = ['turmasUpdated' => 'onTurmasUpdated'];

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
                    Forms\Components\Toggle::make('term')
                        ->label('Aceita o Termo de Consentimento Livre e Esclarecido')
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

        $query = TestClass::with('user');
        if (! $isAdmin) {
            $query = $query->where('user_id', auth()->id());
        }

        $view = request()->get('view', 'cards');

        $toggleAction = \Filament\Tables\Actions\Action::make('toggleView')
            ->label(fn () => $view === 'cards' ? 'Ver Lista' : 'Ver Cartões')
            ->icon(fn () => $view === 'cards' ? 'heroicon-o-queue-list' : 'heroicon-o-squares-2x2')
            ->url(fn () => url()->current() . '?view=' . ($view === 'cards' ? 'list' : 'cards'))
            ->modalAlignment('center');

        $cardsColumns = [
            Stack::make([
                Split::make([
                    Tables\Columns\TextColumn::make('method.name')
                        ->label('Método')
                        ->formatStateUsing(
                            fn($state) => "
                                <div class=\" flex-col text-center\"> 
                                    <div class=\"text-sm text-gray-500\"> Método: </div> 
                                    <div class=\"font-bold\">{$state}</div> 
                                </div>
                            ")
                        ->html()
                        // ->sortable()
                        ->searchable(),
                    Tables\Columns\TextColumn::make('archived')
                        ->label('Arquivo')
                        ->formatStateUsing(fn ($state) => $state ? '<div class="text-xs text-gray-500">Arquivada</div>' : '<div class="text-xs text-gray-500">Desarquivada</div>')
                        ->html()
                        // ->sortable()
                        ->alignment(Alignment::End)
                        ->size('sm'),
                ]),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome da Turma')
                    ->formatStateUsing(fn($state) => "<div class=\"text-base font-bold\">{$state}</div>")
                    ->html()
                    ->searchable()
                    // ->sortable()
                    ->alignment(Alignment::Center),
                Tables\Columns\TextColumn::make('institution')
                    ->label('Instituição')
                    ->formatStateUsing(fn($state) => "<div class=\"text-sm text-gray-600\">{$state}</div>")
                    ->html()
                    ->searchable()
                    // ->sortable()
                    ->alignment(Alignment::Center),
                Tables\Columns\TextColumn::make('expire_date')
                        ->label('Expiração')
                        ->formatStateUsing(function($state) {
                            if (date('Y-m-d') > $state && !is_null($state)) {
                                return "<div class=\"text-xs\">Não aceita mais respostas</div>";
                            }
                            return '';
                        })
                        ->html()
                        // ->sortable()
                        ->color('danger')
                        ->alignment(Alignment::Center),
                Split::make([
                    Tables\Columns\TextColumn::make('user.name')
                        ->label('Organizador')
                        ->formatStateUsing(fn($state) => "<div class=\"text-xs text-gray-500\">Organizador: <br> {$state} </div>")
                        ->html()
                        ->visible($isAdmin)
                        // ->sortable()
                        ->searchable(),
                    Tables\Columns\TextColumn::make('created_at')
                        ->label('Data de Criação')
                        ->formatStateUsing(fn($state) => "<div class=\"text-xs text-gray-500\">Criado em: <br></div> <div class=\"text-xs text-white\">" . \Carbon\Carbon::parse($state)->format('d/m/Y') . "</div>")
                        ->html()
                        // ->sortable()
                        ->alignment(Alignment::End),
                ]),
            ]),
        ];

        // colunas em modo "lista"
        $listColumns = [
            Tables\Columns\TextColumn::make('name')->label('Nome da turma')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('institution')->label('Instituição')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('method.name')->label('Método utilizado')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('user.name')->label('Organizador')->visible($isAdmin)->searchable()->sortable(),
            Tables\Columns\TextColumn::make('archived')->label('Arquivo')->formatStateUsing(fn ($state) => $state ? 'Arquivada' : 'Desarquivada')->sortable(),
            Tables\Columns\TextColumn::make('expire_date')->date("d-m-Y")->label('Data de Expiração')->sortable(),
            Tables\Columns\TextColumn::make('created_at')->label('Data de Criação')->date("d-m-Y")->sortable(),
        ];

        if ($view === 'cards') {
            return $table
                ->headerActions([$toggleAction])
                ->headerActionsPosition(HeaderActionsPosition::Bottom)
                ->columns($cardsColumns)
                ->contentGrid([
                    'md' => 2,
                    'xl' => 3,
                    'gap' => 2,
                ])
                ->filters([
                    Tables\Filters\Filter::make('not_archived')
                        ->label('Turmas Não Arquivadas')
                        ->query(fn (Builder $query) => $query->where('archived', false))
                        ->default(),
                    Tables\Filters\Filter::make('archived')
                        ->label('Turmas Arquivadas')
                        ->query(fn (Builder $query) => $query->where('archived', true)),
                    Tables\Filters\Filter::make('e_game_flow')
                        ->label('Turmas EGameFlow')
                        ->query(fn (Builder $query) => $query->where('method_id', 3)),
                    Tables\Filters\Filter::make('bartle')
                        ->label('Turmas Bartle')
                        ->query(fn (Builder $query) => $query->where('method_id', 1)),
                    Tables\Filters\Filter::make('hexad')
                        ->label('Turmas Hexad')
                        ->query(fn (Builder $query) => $query->where('method_id', 2)),
                ])
                ->actions([
                    Tables\Actions\ActionGroup::make([
                        CopyAction::make('copyTestLink')
                        ->label('Link do Teste')
                        ->icon('heroicon-o-clipboard')
                        ->copyable(fn (TestClass $record) => url('/admin/turmas/' . $record->url . '/test'))
                        ->successNotificationMessage('Link copiado com sucesso!')->color('primary'),
                        Tables\Actions\Action::make('arquivar')->label('Arquivar/Desarquivar')->action(function (TestClass $record, $action) {
                            $record->update(['archived' => !$record->archived]);
                        })->color('warning')->icon('heroicon-o-archive-box'),
                    ]),
                    Tables\Actions\EditAction::make()->label(' ')->color('warning'),
                    Tables\Actions\DeleteAction::make()->label(' '),
                    Tables\Actions\Action::make('view')->label('Visualizar')->url(fn (TestClass $class): string => '/admin/turmas/' . $class->url . '/results')->icon('heroicon-o-eye')->color('gray'),
                        ])
                ->bulkActions([
                    Tables\Actions\BulkAction::make('bulkArchive')
                        ->label('Arquivar Selecionados')
                        ->action(function (Tables\Actions\BulkAction $action, \Illuminate\Support\Collection $records) {
                            foreach ($records as $record) {
                                $record->archived = true;
                                $record->save();
                            }
                            $action->success();
                        })
                        ->icon('heroicon-o-archive-box-arrow-down')
                        ->color('success')
                        ->deselectRecordsAfterCompletion(),
                    Tables\Actions\BulkAction::make('bulkUnarchive')
                        ->label('Desarquivar Selecionados')
                        ->action(function (Tables\Actions\BulkAction $action, \Illuminate\Support\Collection $records) {
                            foreach ($records as $record) {
                                $record->archived = false;
                                $record->save();
                            }
                            $action->success();
                        })
                        ->icon('heroicon-o-archive-box')
                        ->color('warning')->deselectRecordsAfterCompletion(),
                    Tables\Actions\DeleteBulkAction::make()->label('Apagar Selecionados'),
                ])
                ->recordUrl(fn (TestClass $testClass) => ('/admin/turmas/' . $testClass->url . '/results'))
                ->query($query);
        }

        // modo lista
        return $table
            ->headerActions([$toggleAction])
            ->headerActionsPosition(HeaderActionsPosition::Bottom)
            ->columns($listColumns)
            ->filters([
                Tables\Filters\Filter::make('not_archived')
                    ->label('Turmas Não Arquivadas')
                    ->query(fn (Builder $query) => $query->where('archived', false))
                    ->default()
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('arquivar')->label('Arquivar/Desarquivar')->action(function (TestClass $record, $action) {
                        $record->update(['archived' => !$record->archived]);
                    })->color('warning')->icon('heroicon-o-archive-box'),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    CopyAction::make('copyTestLink')
                        ->label('Link do Teste')
                        ->icon('heroicon-o-clipboard')
                        ->copyable(fn (TestClass $record) => url('/admin/turmas/' . $record->url . '/test'))
                        ->successNotificationMessage('Link copiado com sucesso!')->color('success'),
                    ])
                ])
            ->bulkActions([
                Tables\Actions\BulkAction::make('bulkArchive')
                    ->label('Arquivar Selecionados')
                    ->action(function (Tables\Actions\BulkAction $action, \Illuminate\Support\Collection $records) {
                        foreach ($records as $record) {
                            $record->archived = true;
                            $record->save();
                        }
                        $action->success();
                    })
                    ->icon('heroicon-o-archive-box-arrow-down')
                    ->color('success')
                    ->deselectRecordsAfterCompletion(),
                Tables\Actions\BulkAction::make('bulkUnarchive')
                    ->label('Desarquivar Selecionados')
                    ->action(function (Tables\Actions\BulkAction $action, \Illuminate\Support\Collection $records) {
                        foreach ($records as $record) {
                            $record->archived = false;
                            $record->save();
                        }
                        $action->success();
                    })
                    ->icon('heroicon-o-archive-box')
                    ->color('warning')->deselectRecordsAfterCompletion(),
                Tables\Actions\DeleteBulkAction::make()->label('Apagar Selecionados'),
            ])
            ->recordUrl(fn (TestClass $testClass) => ('/admin/turmas/' . $testClass->url . '/results'))
            ->query($query);
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
