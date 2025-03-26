<?php

namespace App\Filament\Pimpinan\Resources\LansiaResource\Pages;

use App\Filament\Pimpinan\Resources\LansiaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLansia extends EditRecord
{
    protected static string $resource = LansiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
