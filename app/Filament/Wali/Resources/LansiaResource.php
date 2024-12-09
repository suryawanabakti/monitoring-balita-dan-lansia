<?php

namespace App\Filament\Wali\Resources;

use App\Filament\Wali\Resources\LansiaResource\Pages;
use App\Filament\Wali\Resources\LansiaResource\RelationManagers;
use App\Models\Lansia;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LansiaResource extends Resource
{
    protected static ?string $model = Lansia::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?string $navigationLabel = 'Lansia';

    public static function getPluralModelLabel(): string
    {
        return 'Lansia'; // Customize the plural label
    }
    public static function canCreate(): bool
    {
        return false;
    }
    public static function canEdit(Model $record): bool
    {
        return false;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Lansia')
                    ->description('Lengkapi data lansia di bawah ini')
                    ->schema([
                        TextInput::make('nik')->required(),
                        TextInput::make('nama')->required(),
                        DatePicker::make('tgl_lahir')->required(),
                        Radio::make('jk')->label('Jenis Kelamin')->options([
                            'L' => 'Laki-laki',
                            'P' => 'Perempuan',
                        ])->inline()->inlineLabel(false)->required(),
                        Textarea::make('alamat')->required(),
                        Radio::make('status_keluarga')->label('Status Keluarga')->options([
                            'test1' => 'Test 1',
                            'test2' => 'Test 2',
                        ])->inline()->inlineLabel(false)->required(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nik')->searchable(),
                TextColumn::make('nama')->searchable(),
                TextColumn::make('jk'),
                TextColumn::make('tgl_lahir'),
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
            'index' => Pages\ListLansias::route('/'),
            'create' => Pages\CreateLansia::route('/create'),
            'edit' => Pages\EditLansia::route('/{record}/edit'),
        ];
    }
}
