<?php

namespace App\Filament\Pimpinan\Resources;

use App\Filament\Pimpinan\Resources\BalitaResource\Pages;
use App\Filament\Pimpinan\Resources\BalitaResource\RelationManagers;
use App\Filament\Resources\BalitaResource\RelationManagers\RekamkesehatanRelationManager;
use App\Models\Balita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BalitaResource extends Resource
{
    protected static ?string $model = Balita::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'MASTER DATA';
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
    public static function canCreate(): bool
    {
        return false;
    }
    public static function canEdit(Model $model): bool
    {
        return false;
    }
    public static function canDelete(Model $model): bool
    {
        return false;
    }

    public static function getRelations(): array
    {
        return [
            RekamkesehatanRelationManager::class
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            TextEntry::make('nama'),
            TextEntry::make('nib'),
            TextEntry::make('jk'),
            TextEntry::make('alamat'),
            TextEntry::make('user.name')->label('Nama Wali'),
        ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama Balita')
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBalitas::route('/'),
            'create' => Pages\CreateBalita::route('/create'),
            'view' => Pages\ViewBalita::route('/{record}'),
            'edit' => Pages\EditBalita::route('/{record}/edit'),
        ];
    }
}
