<?php

namespace App\Filament\Widgets;

use App\Models\RekamKesehatan;
use Filament\Tables;
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
            )
            ->columns([
                TextColumn::make('created_at')->label('Tanggal')->searchable(),
                TextColumn::make('lansia.nama')->label('Lansia'),
                TextColumn::make('berat_badan')->label('BB')->searchable(),
                TextColumn::make('tinggi_badan')->label('TB')->searchable(),
                TextColumn::make('tekanan_darah')->label('TD')->searchable(),
                TextColumn::make('lingkar_kepala')->label('LK')->searchable(),
            ]);
    }
}
