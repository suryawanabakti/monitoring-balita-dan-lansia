<?php

namespace App\Filament\Pimpinan\Resources\LansiaResource\Pages;

use App\Filament\Pimpinan\Resources\LansiaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLansia extends ViewRecord
{
    protected static string $resource = LansiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
