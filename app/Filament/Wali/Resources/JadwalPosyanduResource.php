<?php

namespace App\Filament\Wali\Resources;

use App\Filament\Wali\Resources\JadwalPosyanduResource\Pages;
use App\Filament\Wali\Resources\JadwalPosyanduResource\RelationManagers;
use App\Models\JadwalPosyandu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;

class JadwalPosyanduResource extends Resource
{
    protected static ?string $model = JadwalPosyandu::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationGroup = 'Main';
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
                DatePicker::make('tgl_kegiatan'),
                Textarea::make('lokasi'),
                Textarea::make('keterangan'),
            ]);
    }
    public  static function canEdit(Model $record): bool
    {
        return false;
    }
    public  static function canDelete(Model $record): bool
    {
        return false;
    }
    public static function canCreate(): bool
    {
        return false;
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tgl_kegiatan'),
                TextColumn::make('lokasi')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([]);
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
