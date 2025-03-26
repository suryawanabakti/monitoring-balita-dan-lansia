<?php

namespace App\Filament\Widgets;

use App\Filament\Exports\BalitaExporter;
use App\Filament\Exports\RekamKesehatanExporter;
use App\Models\RekamKesehatan;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class TableRekamMedisBalita extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                RekamKesehatan::whereNotNull('balita_id')
            )
            ->headerActions([
                // ExportAction::make()->exporter(RekamKesehatanExporter::class)->fileDisk('public')

            ])
            ->columns([
                TextColumn::make('created_at')->label('Tanggal')->searchable(),
                TextColumn::make('balita.nama')->label('Balita')->formatStateUsing(fn($record) => "{$record->balita->nama}</br>{$record->balita->nib}")->html()->searchable(),
                TextColumn::make('berat_badan')->label('BB')->searchable(),
                TextColumn::make('tinggi_badan')->label('TB')->searchable(),
                TextColumn::make('tekanan_darah')->label('TD')->searchable(),
                TextColumn::make('lingkar_kepala')->label('LK')->searchable(),
            ]);
    }
}
