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
                Forms\Components\TextInput::make('berat_badan')->numeric()->required(),
                Forms\Components\TextInput::make('tinggi_badan')->numeric()->required(),
                Forms\Components\TextInput::make('tekanan_darah')->numeric()->required(),
                Forms\Components\TextInput::make('lingkar_kepala')->numeric()->required(),
                Textarea::make('catatan'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('tgl_pemeriksaan')
            ->columns([
                Tables\Columns\TextColumn::make('tgl_pemeriksaan'),
                Tables\Columns\TextColumn::make('tinggi_badan'),
                Tables\Columns\TextColumn::make('berat_badan'),
                Tables\Columns\TextColumn::make('tekanan_darah'),
                Tables\Columns\TextColumn::make('lingkar_kepala'),
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
