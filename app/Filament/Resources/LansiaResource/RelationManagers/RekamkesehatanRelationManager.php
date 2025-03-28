<?php

namespace App\Filament\Resources\LansiaResource\RelationManagers;

use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RekamkesehatanRelationManager extends RelationManager
{
    protected static string $relationship = 'rekamkesehatan';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('tgl_pemeriksaan')
                    ->required(),
                Textarea::make('catatan')->label('Diagnosa/Keluhan'),
                Forms\Components\TextInput::make('berat_badan')->numeric()->required(),
                Forms\Components\TextInput::make('tinggi_badan')->numeric()->required(),
                Forms\Components\Radio::make('rujuk')->options([
                    true => 'Iya',
                    false => 'Tidak',
                ]),
                Forms\Components\Radio::make('hb_kurang')->options([
                    true => 'Iya',
                    false => 'Tidak',
                ]),
                Forms\Components\Radio::make('kolestrol')->options([
                    true => 'Iya',
                    false => 'Tidak',
                ]),
                Forms\Components\Radio::make('asam_urat')->options([
                    true => 'Iya',
                    false => 'Tidak',
                ]),
                Forms\Components\Radio::make('gangguan_ginjal')->options([
                    true => 'Iya',
                    false => 'Tidak',
                ]),
                Forms\Components\Radio::make('gangguan_pendengaran')->options([
                    true => 'Iya',
                    false => 'Tidak',
                ]),
                Forms\Components\Radio::make('gangguan_mata')->options([
                    true => 'Iya',
                    false => 'Tidak',
                ]),
                Forms\Components\Radio::make('gangguan_mental')->options([
                    true => 'Iya',
                    false => 'Tidak',
                ]),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('tgl_pemeriksaan')
            ->columns([
                Tables\Columns\TextColumn::make('catatan')->label('Diagnosa'),
                Tables\Columns\TextColumn::make('tinggi_badan')->label('TB(cm)'),
                Tables\Columns\TextColumn::make('berat_badan')->label('BB(kg)'),
                Tables\Columns\TextColumn::make('rujuk')->formatStateUsing(fn($record) => $record->asi_ekslusif ? "Iya" : "Tidak"),
                Tables\Columns\TextColumn::make('hb_kurang')->formatStateUsing(fn($record) => $record->asi_ekslusif ? "Iya" : "Tidak"),
                Tables\Columns\TextColumn::make('kolestrol')->formatStateUsing(fn($record) => $record->asi_ekslusif ? "Iya" : "Tidak"),
                Tables\Columns\TextColumn::make('asam_urat')->formatStateUsing(fn($record) => $record->asi_ekslusif ? "Iya" : "Tidak"),
                Tables\Columns\TextColumn::make('gangguan_ginjal')->formatStateUsing(fn($record) => $record->asi_ekslusif ? "Iya" : "Tidak"),
                Tables\Columns\TextColumn::make('gangguan_pendengaran')->formatStateUsing(fn($record) => $record->asi_ekslusif ? "Iya" : "Tidak"),
                Tables\Columns\TextColumn::make('gangguan_mata')->formatStateUsing(fn($record) => $record->asi_ekslusif ? "Iya" : "Tidak"),
                Tables\Columns\TextColumn::make('gangguan_mental')->formatStateUsing(fn($record) => $record->asi_ekslusif ? "Iya" : "Tidak"),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
