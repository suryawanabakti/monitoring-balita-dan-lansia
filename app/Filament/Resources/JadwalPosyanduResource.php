<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalPosyanduResource\Pages;
use App\Filament\Resources\JadwalPosyanduResource\RelationManagers;
use App\Models\JadwalPosyandu;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JadwalPosyanduResource extends Resource
{
    protected static ?string $model = JadwalPosyandu::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationGroup = 'Fitur Lainnya';
    protected static ?string $navigationLabel = 'Jadwal Posyandu';
    public static function getModelLabel(): string
    {
        return 'Jadwal Posyandu';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Jadwal Posyandu'; // Customize the plural label
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('tgl_kegiatan')->required(),
                Textarea::make('lokasi')->required(),
                Textarea::make('keterangan')->required(),
                Radio::make('untuk')->options([
                    'semua' => 'Semua',
                    'wali balita' => 'Wali balita',
                    'wali lansia' => 'Wali lansia',
                ])->inline()->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tgl_kegiatan'),
                TextColumn::make('lokasi'),
                TextColumn::make('keterangan'),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJadwalPosyandus::route('/'),
            'create' => Pages\CreateJadwalPosyandu::route('/create'),
            'edit' => Pages\EditJadwalPosyandu::route('/{record}/edit'),
        ];
    }
}
