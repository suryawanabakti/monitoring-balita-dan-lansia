<?php

namespace App\Filament\Resources\LansiaResource\Pages;

use App\Filament\Resources\LansiaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLansias extends ListRecords
{
    protected static string $resource = LansiaResource::class;
    protected static ?string $title = 'Lansia';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
