<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $label = 'Usuários';

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc') 
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nome'),
                Tables\Columns\TextColumn::make('email')->label('E-mail'),
                Tables\Columns\IconColumn::make('verified')
                    ->boolean()
                    ->label('Professor'),
                Tables\Columns\IconColumn::make('is_admin')
                    ->boolean()
                    ->label('Administrador')
            ])
            ->filters([
                Tables\Filters\Filter::make('not_approved')
                    ->label('Usuários não aprovados')
                    ->query(fn (Builder $query) => $query->where('verified', false))
                    ->default()
            ])
            ->actions([
//                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('approve')
                    ->requiresConfirmation()
                    ->action(fn (User $user) => $user->update(['verified' => true]))
                    ->button()
                    ->color('success')
                    ->label('Aprovar usuário')
                    ->visible(fn (User $user) => !$user->verified),
                Tables\Actions\Action::make('admin')
                    ->requiresConfirmation()
                    ->action(fn (User $user) => $user->update(['is_admin' => !$user->is_admin]))
                    ->button()
                    ->label('Alternar admin')
                    ->visible(fn (User $user) => $user->verified)
            ])
            ->bulkActions([
                Tables\Actions\BulkAction::make('Aprovar selecionados')
                    ->action(fn (Collection $collection) => $collection->filter(fn ($arr) => !$arr->verified)->each->update(['verified' => true])),
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
//          'create' => Pages\CreateUser::route('/create'),
//          'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
