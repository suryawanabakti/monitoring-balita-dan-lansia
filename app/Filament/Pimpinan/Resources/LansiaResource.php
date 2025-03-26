<?php

namespace App\Filament\Pimpinan\Resources;

use App\Filament\Pimpinan\Resources\LansiaResource\Pages;
use App\Filament\Pimpinan\Resources\LansiaResource\RelationManagers;
use App\Filament\Resources\LansiaResource\RelationManagers\RekamkesehatanRelationManager;
use App\Models\Lansia;
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

class LansiaResource extends Resource
{
    protected static ?string $model = Lansia::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'MASTER DATA';
    protected static ?string $navigationLabel = 'Lansia';
    public static function canCreate(): bool
    {
        return false;
    }
    public static function canEdit(Model $record): bool
    {
        return false;
    }
    public static function canDelete(Model $record): bool
    {
        return false;
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            TextEntry::make('nik'),
            TextEntry::make('nama'),
            TextEntry::make('tgl_lahir'),
            TextEntry::make('jk'),
            TextEntry::make('alamat'),
            TextEntry::make('user.name')->label('Nama Wali'),
        ]);
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
            'view' => Pages\ViewLansia::route('/{record}'),
            'edit' => Pages\EditLansia::route('/{record}/edit'),
        ];
    }
}
