<?php

namespace App\Filament\Exports;

use App\Models\Answer;
use App\Models\BartleResults;
use App\Models\TestResultBartle;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class BartleResultsExporter extends Exporter
{
    protected static ?string $model = TestResultBartle::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('name')->label('Nome'),
            ExportColumn::make('age')->label('Idade'),
            ExportColumn::make('Empreendedor'),
            ExportColumn::make('Explorador'),
            ExportColumn::make('Assassino'),
            ExportColumn::make('Socializador')
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Os resultados do seu teste foram processados e ' . number_format($export->successful_rows) . ' ' . str('linha')->plural($export->successful_rows) . ' exportadas.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
