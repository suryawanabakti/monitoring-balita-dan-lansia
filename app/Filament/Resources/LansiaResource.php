<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LansiaResource\Pages;
use App\Filament\Resources\LansiaResource\RelationManagers;
use App\Filament\Resources\LansiaResource\RelationManagers\RekamkesehatanRelationManager;
use App\Models\Lansia;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LansiaResource extends Resource
{
    protected static ?string $model = Lansia::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'MANAGEMENT';
    protected static ?string $navigationLabel = 'Lansia';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['nama', 'nik'];
    }


    public static function getModelLabel(): string
    {
        return 'Lansia';
    }
    public static function getPluralModelLabel(): string
    {
        return 'Lansia'; // Customize the plural label
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Lansia')
                    ->description('Lengkapi data lansia di bawah ini')
                    ->schema([
                        Select::make('user_id')->label('Wali')->options(User::where('role', 'wali')->pluck('name', 'id'))->required()->searchable(),
                        TextInput::make('nik')->required()->maxLength(16),
                        TextInput::make('nama')->required(),
                        DatePicker::make('tgl_lahir')->required(),
                        Radio::make('jk')->label('Jenis Kelamin')->options([
                            'L' => 'Laki-laki',
                            'P' => 'Perempuan',
                        ])->inline()->inlineLabel(false)->required(),
                        Textarea::make('alamat')->required(),

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
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
            RekamkesehatanRelationManager::class
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
