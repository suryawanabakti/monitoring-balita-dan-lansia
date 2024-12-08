<?php

namespace App\Filament\Resources\RekamKesehatanResource\Pages;

use App\Filament\Resources\RekamKesehatanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRekamKesehatans extends ListRecords
{
    protected static string $resource = RekamKesehatanResource::class;
    protected static ?string $title = 'Rekam Kesehatan';
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
