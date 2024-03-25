<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestClassResource\Pages;
use App\Filament\Resources\TestClassResource\RelationManagers;
use App\Models\TestClass;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestClassResource extends Resource
{
    protected static ?string $model = TestClass::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\DatePicker::make('expire_date'),
                Forms\Components\Select::make('method_id')
                ->relationship('method', 'name')
                ->required(),
                Forms\Components\Hidden::make('user_id')->default(auth()->user()->id)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('method.name'),
                Tables\Columns\TextColumn::make('expire_date')->dateTime()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListTestClasses::route('/'),
            'create' => Pages\CreateTestClass::route('/create'),
            'edit' => Pages\EditTestClass::route('/{record}/edit'),
        ];
    }
}
