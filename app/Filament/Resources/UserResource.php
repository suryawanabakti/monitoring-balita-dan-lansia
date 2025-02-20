<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?int $navigationSort = -2;
    protected static ?string $navigationGroup = 'MANAGEMENT';
    protected static ?string $navigationLabel = 'Wali';
    protected static ?string $pluralLabel = 'Wali';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('role', '!=', 'admin');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('avatar_url')->directory('avatars')->avatar()->nullable()->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif'])
                    ->maxSize(10240),
                TextInput::make('name')->required(),
                TextInput::make('email')->email()->unique(ignoreRecord: true)->required(),
                Select::make('role')->options([
                    "wali" => "Wali",
                    "kepala" => "Kepala",
                ])->required()->default('wali'),
                TextInput::make('password')
                    ->password()
                    ->confirmed()
                    ->label('Password')
                    ->required(fn(string $context) => $context === 'create')
                    ->nullable(),

                TextInput::make('password_confirmation')
                    ->label("Konfirmasi Password")
                    ->password()
                    ->required(fn(string $context) => $context === 'create'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar_url'),
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('role'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
