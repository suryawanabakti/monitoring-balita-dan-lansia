<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TenagaKesehatanResource\Pages;
use App\Filament\Resources\TenagaKesehatanResource\RelationManagers;
use App\Models\TenagaKesehatan;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TenagaKesehatanResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'MANAGEMENT';
    protected static ?string $navigationLabel = 'Users';

    public static function canAccess(): bool
    {
        return request()->user()->role === 'admin';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('email'),
                TextInput::make('password')->password(),
                Select::make('role')->options([
                    'kepala' => 'kepala',
                    'tenaga kesehatan' => 'tenaga kesehatan',
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(User::whereNot('role', 'admin'))
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('role'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListTenagaKesehatans::route('/'),
            'create' => Pages\CreateTenagaKesehatan::route('/create'),
            'edit' => Pages\EditTenagaKesehatan::route('/{record}/edit'),
        ];
    }
}
