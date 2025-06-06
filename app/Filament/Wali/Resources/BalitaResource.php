<?php

namespace App\Filament\Wali\Resources;

use App\Filament\Resources\BalitaResource\RelationManagers\RekamkesehatanRelationManager;
use App\Filament\Wali\Resources\BalitaResource\Pages;
use App\Filament\Wali\Resources\BalitaResource\RelationManagers;
use App\Models\Balita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Illuminate\Database\Eloquent\Model;

class BalitaResource extends Resource
{
    protected static ?string $model = Balita::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?string $navigationLabel = 'Balita';

    public static function getModelLabel(): string
    {
        return 'Balita';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Balita'; // Customize the plural label
    }

    public static function canAccess(): bool
    {
        return auth()->user()?->wali_apa === "wali balita";
    }



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Balita')
                    ->description('Lengkapi data balita di bawah ini')
                    ->schema([
                        TextInput::make('nib')->required()->label('No. kk/bpjs')->maxLength(16),
                        TextInput::make('nama')->required(),
                        Radio::make('jk')->label('Jenis Kelamin')->options([
                            'L' => 'Laki-laki',
                            'P' => 'Perempuan',
                        ])->inline()->inlineLabel(false)->required(),
                        TextInput::make('nama_orangtua')->required(),
                        Textarea::make('alamat')->required(),
                        TextInput::make('nohp')->nullable(),

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        $balitas = Balita::query();
        if (auth()->user()->role === 'wali') {
            $balitas = $balitas->where('user_id', auth()->id());
        }
        return $table
            ->query($balitas)
            ->columns([
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

                Tables\Actions\ViewAction::make(),
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
            RekamkesehatanRelationManager::class
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            TextEntry::make('nama'),
            TextEntry::make('nib')->label('No. kk/bpjs'),
            TextEntry::make('jk'),
            TextEntry::make('alamat'),
            TextEntry::make('user.name')->label('Nama Wali'),
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
