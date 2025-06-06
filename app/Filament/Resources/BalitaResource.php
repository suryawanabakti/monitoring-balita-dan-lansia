<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BalitaResource\Pages;
use App\Filament\Resources\BalitaResource\RelationManagers\RekamkesehatanRelationManager;
use App\Models\Balita;
use App\Models\User;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BalitaResource extends Resource
{
    protected static ?string $model = Balita::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'MANAGEMENT';
    protected static ?string $navigationLabel = 'Balita';

    public static function getGloballySearchableAttributes(): array
    {
        return ['nama', 'nib', 'nama_orangtua'];
    }

    public static function getModelLabel(): string
    {
        return 'Balita';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Balita'; // Customize the plural label
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Balita')
                    ->description('Lengkapi data balita di bawah ini')
                    ->schema([
                        Select::make('user_id')->label('Wali')->options(User::where('role', 'wali')->pluck('name', 'id'))->required()->searchable(),
                        TextInput::make('nib')->required()->label('No. kk/bpjs')->maxLength(16),
                        TextInput::make('nama')->required(),
                        Radio::make('jk')->label('Jenis Kelamin')->options([
                            'L' => 'Laki-laki',
                            'P' => 'Perempuan',
                        ])->inline()->inlineLabel(false)->required(),
                        TextInput::make('nama_orangtua')->required(),
                        Textarea::make('alamat')->required(),
                        TextInput::make('nohp')->nullable(),
                        TextInput::make('bbl')->nullable()->numeric()->label('BBL (kg)')->helperText('Masukkan berat badan lahir dalam kilogram (kg)')->visible(auth()->user()->role === 'admin'),
                        TextInput::make('pbl')->nullable()->numeric()->label('PBL (cm)')->helperText('Masukkan Panjang Badan Lahir dalam centimeter (cm)')->visible(auth()->user()->role === 'admin'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nib')
                    ->label('No.kk/bpjs')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('nama')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('jk')
                    ->label('Jenis Kelamin')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
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
            'index' => Pages\ListBalitas::route('/'),
            'create' => Pages\CreateBalita::route('/create'),
            'edit' => Pages\EditBalita::route('/{record}/edit'),
        ];
    }
}
