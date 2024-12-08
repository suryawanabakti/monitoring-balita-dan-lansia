<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RekamKesehatanResource\Pages;
use App\Filament\Resources\RekamKesehatanResource\RelationManagers;
use App\Models\Pasien;
use App\Models\RekamKesehatan;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RekamKesehatanResource extends Resource
{
    protected static ?string $model = RekamKesehatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';
    protected static ?string $navigationGroup = 'Main';
    protected static ?string $navigationLabel = 'Rekam Kesehatan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('pasien_id')
                    ->label('Pasien')
                    ->options(function () {
                        return Pasien::pluck('nama', 'id')->toArray();
                    })
                    ->searchable()
                    ->preload()
                    ->required()
                    ->placeholder('Select a pasien'),
                DatePicker::make('tgl_pemeriksaan')->label('Tanggal Pemeriksaan'),
                TextInput::make('berat_badan')->numeric()->required(),
                TextInput::make('tinggi_badan')->numeric()->required(),
                TextInput::make('tekanan_darah')->numeric()->required(),
                Textarea::make('catatan')->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tgl_pemeriksaan'),
                TextColumn::make('pasien_id')
                    ->label('Pasien')
                    ->getStateUsing(function ($record) {
                        return $record->pasien->nama ?? 'N/A'; // Replace with default if no related Pasien
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRekamKesehatans::route('/'),
            'create' => Pages\CreateRekamKesehatan::route('/create'),
            'edit' => Pages\EditRekamKesehatan::route('/{record}/edit'),
        ];
    }
}
