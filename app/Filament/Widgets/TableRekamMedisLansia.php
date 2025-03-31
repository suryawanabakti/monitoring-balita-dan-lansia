<?php

namespace App\Filament\Widgets;

use App\Models\RekamKesehatan;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class TableRekamMedisLansia extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                RekamKesehatan::with('lansia')->whereNotNull('lansia_id')
            )->headerActions([
                Action::make('export')->url('/export/lansia')
            ])
            ->columns([
                TextColumn::make('tgl_pemeriksaan')->label('Tanggal')->searchable(),
                TextColumn::make('lansia.nama')->label('Nama'),
                Tables\Columns\TextColumn::make('catatan')->label('Diagnosa'),
                Tables\Columns\TextColumn::make('tinggi_badan')->label('TB(cm)'),
                Tables\Columns\TextColumn::make('berat_badan')->label('BB(kg)'),
                Tables\Columns\TextColumn::make('rujuk')->formatStateUsing(fn($record) => $record->rujuk ? "Iya" : "Tidak"),
                Tables\Columns\TextColumn::make('hb_kurang')->formatStateUsing(fn($record) => $record->hb_kurang ? "Iya" : "Tidak"),
                Tables\Columns\TextColumn::make('kolestrol')->formatStateUsing(fn($record) => $record->kolestrol ? "Iya" : "Tidak"),
                Tables\Columns\TextColumn::make('asam_urat')->formatStateUsing(fn($record) => $record->asam_urat ? "Iya" : "Tidak"),
                Tables\Columns\TextColumn::make('gangguan_ginjal')->formatStateUsing(fn($record) => $record->gangguan_ginjal ? "Iya" : "Tidak"),
                Tables\Columns\TextColumn::make('gangguan_pendengaran')->formatStateUsing(fn($record) => $record->gangguan_pendengaran ? "Iya" : "Tidak"),
                Tables\Columns\TextColumn::make('gangguan_mata')->formatStateUsing(fn($record) => $record->gangguan_mata ? "Iya" : "Tidak"),
                Tables\Columns\TextColumn::make('gangguan_mental')->formatStateUsing(fn($record) => $record->asi_eksgangguan_mentallusif ? "Iya" : "Tidak"),
            ]);
    }
}
