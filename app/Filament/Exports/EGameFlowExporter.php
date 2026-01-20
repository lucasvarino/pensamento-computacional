<?php
namespace App\Filament\Exports;

use App\Models\Answer;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class EGameFlowExporter extends Exporter 
{
    protected static ?string $model = Answer::class;

    public static function getColumns(): array
    {

        /*
                        'concentracao' => $percentage[0] . '%',
                'desafios' => $percentage[1] . '%',
                'autonomia' => $percentage[2] . '%',
                'objetivos' => $percentage[3] . '%',
                'feedback' => $percentage[4] . '%',
                'imersao' => $percentage[5] . '%',
                'interacao_social' => $percentage[6] . '%',
                'melhoria_de_conhecimento' => $percentage[7] . '%',
        */

        return [
            ExportColumn::make('name')->label('Nome'),
            ExportColumn::make('age')->label('Idade'),

            ExportColumn::make('Concentração')
                ->getStateUsing(fn(Answer $record) =>
                    $record->eGameFlowResults->firstWhere('group_id', 11)?->value . '%'),

            ExportColumn::make('Desafios')
                ->getStateUsing(fn(Answer $record) =>
                    $record->eGameFlowResults->firstWhere('group_id', 12)?->value . '%'),

            ExportColumn::make('Autonomia')
                ->getStateUsing(fn(Answer $record) =>
                    $record->eGameFlowResults->firstWhere('group_id', 13)?->value . '%'),

            ExportColumn::make('Objetivos')
                ->getStateUsing(fn(Answer $record) =>
                    $record->eGameFlowResults->firstWhere('group_id', 14)?->value . '%'),

            ExportColumn::make('Feedback')
                ->getStateUsing(fn(Answer $record) =>
                    $record->eGameFlowResults->firstWhere('group_id', 15)?->value . '%'),

            ExportColumn::make('Imersão')
                ->getStateUsing(fn(Answer $record) =>
                    $record->eGameFlowResults->firstWhere('group_id', 16)?->value . '%'),

            ExportColumn::make('Interação Social')
                ->getStateUsing(fn(Answer $record) =>
                    $record->eGameFlowResults->firstWhere('group_id', 17)?->value . '%'),

            ExportColumn::make('Melhoria de Conhecimento')
                ->getStateUsing(fn(Answer $record) =>
                    $record->eGameFlowResults->firstWhere('group_id', 18)?->value . '%'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Resultados do eGameFlow exportados com sucesso: ' . number_format($export->successful_rows) . ' linha(s).';
        if ($failed = $export->getFailedRowsCount()) {
            $body .= ' Falharam: ' . $failed . ' linha(s).';
        }
        return $body;
    }
}