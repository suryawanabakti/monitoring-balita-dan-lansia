<?php

namespace App\Filament\Widgets;

use App\Filament\Exports\BalitaExporter;
use App\Filament\Exports\RekamKesehatanExporter;
use App\Models\RekamKesehatan;

use Filament\Tables;
use Filament\Tables\Actions\Action;
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
                Action::make('export')->url('/export/balita')
            ])
            ->columns([
                Tables\Columns\TextColumn::make('tgl_pemeriksaan'),

                Tables\Columns\TextColumn::make('berat_badan')->label('BB(kg)'),
                Tables\Columns\TextColumn::make('tppb'),
                Tables\Columns\TextColumn::make('lingkar_kepala')->label('LILA(cm)'),
                Tables\Columns\TextColumn::make('asi_ekslusif')->formatStateUsing(fn($record) => $record->asi_ekslusif ? "Iya" : "Tidak"),
                Tables\Columns\TextColumn::make('vit_a')->formatStateUsing(fn($record) => $record->asi_ekslusif ? "Iya" : "Tidak"),
                Tables\Columns\TextColumn::make('umur'),
                Tables\Columns\TextColumn::make('pmt_ke'),
                Tables\Columns\TextColumn::make('bgt_bgm'),
                Tables\Columns\TextColumn::make('imd')->formatStateUsing(fn($record) => $record->asi_ekslusif ? "Iya" : "Tidak"),
                Tables\Columns\TextColumn::make('catatan')->wrap(),
            ]);
    }
}
