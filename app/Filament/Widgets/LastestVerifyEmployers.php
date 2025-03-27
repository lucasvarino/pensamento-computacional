<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Tables;
use Filament\Tables\Table;
use EightyNine\FilamentAdvancedWidget\AdvancedTableWidget as BaseWidget;
$user = 10;
class LastestVerifyEmployers extends BaseWidget
{
    public static function canView(): bool
    {
        $user = auth()->user();
        return $user && $user->isVerified() && $user->isAdmin(); // adapte as condições conforme necessário
    }

    protected static ?string $heading  = "Ultimos usuários verificados";

    public function getHeading(): string
    {
        return '';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                User::where('verified', true)
                    ->orderBy('created_at', 'desc')
            )
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->label('E-mail'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome'),
            ]);
    }
}