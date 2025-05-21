<?php

namespace App\Filament\Resources\BalitaResource\RelationManagers;

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
                Forms\Components\TextInput::make('berat_badan')->numeric()->required()->label('BB (cm)')->helperText('Masukkan berat badan lahir dalam kilogram (kg)'),
                Forms\Components\TextInput::make('tppb')->required()->label('TP/PB')->helperText('Masukkan tinggi badan/panjang badan'),
                Forms\Components\TextInput::make('lingkar_kepala')->numeric()->required()->label('LILA (cm)')->helperText('Masukkan tinggi lingkar lengan atas'),
                Forms\Components\Radio::make('asi_ekslusif')->options([
                    true => 'Iya',
                    false => 'Tidak',
                ]),
                Forms\Components\Radio::make('vit_a')->options([
                    true => 'Iya',
                    false => 'Tidak',
                ]),
                Forms\Components\TextInput::make('umur')->numeric()->required()->label('Umur'),
                Forms\Components\TextInput::make('pmt_ke')->required()->label('PMT Ke-')->helperText('Masukkan Pemberian Makanan Tambahan'),
                Forms\Components\TextInput::make('bgt_bgm')->required()->label('BGT/BGM')->helperText('Masukkan bawa garis kuning / bawa garis merah'),
                Forms\Components\Radio::make('imd')->options([
                    true => 'Iya',
                    false => 'Tidak',
                ])->helperText('Masukkan Inisiasi menyusui dini'),
                Textarea::make('catatan'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('tgl_pemeriksaan')
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
