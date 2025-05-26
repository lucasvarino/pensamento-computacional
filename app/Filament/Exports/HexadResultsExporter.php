<?php
namespace App\Filament\Exports;

use App\Models\Answer;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class HexadResultsExporter extends Exporter
{
    protected static ?string $model = Answer::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('name')->label('Nome'),
            ExportColumn::make('age')->label('Idade'),

            ExportColumn::make('Filantropo')
                ->getStateUsing(fn(Answer $record) => $record->hexadResults->firstWhere('group_id', 5)?->value . '%'),

            ExportColumn::make('Socializadores')
                ->getStateUsing(fn(Answer $record) => $record->hexadResults->firstWhere('group_id', 6)?->value . '%'),

            ExportColumn::make('Livre Espírito')
                ->getStateUsing(fn(Answer $record) => $record->hexadResults->firstWhere('group_id', 7)?->value . '%'),

            ExportColumn::make('Conquistador')
                ->getStateUsing(fn(Answer $record) => $record->hexadResults->firstWhere('group_id', 8)?->value . '%'),

            ExportColumn::make('Disruptor')
                ->getStateUsing(fn(Answer $record) => $record->hexadResults->firstWhere('group_id', 9)?->value . '%'),

            ExportColumn::make('Jogador')
                ->getStateUsing(fn(Answer $record) => $record->hexadResults->firstWhere('group_id', 10)?->value . '%'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Resultados HEXAD exportados com sucesso: ' . number_format($export->successful_rows) . ' linha(s).';
        if ($failed = $export->getFailedRowsCount()) {
            $body .= ' Falharam: ' . $failed . ' linha(s).';
        }
        return $body;
    }
}