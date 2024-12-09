<?php

namespace App\Filament\Pimpinan\Resources;

use App\Filament\Pimpinan\Resources\LaporanResource\Pages;
use App\Filament\Pimpinan\Resources\LaporanResource\RelationManagers;
use App\Models\Laporan;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LaporanResource extends Resource
{
    protected static ?string $model = Laporan::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';
    protected static ?string $navigationGroup = 'Main';
    protected static ?string $navigationLabel = 'Laporan';
    public static function getModelLabel(): string
    {
        return 'Laporan';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Laporan'; // Customize the plural label
    }

    public static function canCreate(): bool
    {
        return false;
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('file_laporan')->columnSpan(2)->directory('file_laporan')->required(),
                TextInput::make('periode')->required(),
                Select::make('jenis_laporan')->options([
                    "test1" => "test1",
                    "test2" => "test2",
                ])->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('periode')->searchable(),
                TextColumn::make('jenis_laporan')->searchable(),
                TextColumn::make('file_laporan')
                    ->label('File')
                    ->formatStateUsing(function ($state) {
                        return $state ? 'Download' : 'No File';
                    })
                    ->url(function ($record) {
                        return $record->file_laporan ? url('storage/' . $record->file_laporan) : null;
                    })
                    ->openUrlInNewTab() // Optional: Opens the download link in a new tab
                    ->tooltip('Click to download the file')
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
            'index' => Pages\ListLaporans::route('/'),
            'create' => Pages\CreateLaporan::route('/create'),
            'edit' => Pages\EditLaporan::route('/{record}/edit'),
        ];
    }
}
