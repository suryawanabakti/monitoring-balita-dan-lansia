<?php

namespace App\Filament\Wali\Resources\LansiaResource\Pages;

use App\Filament\Wali\Resources\LansiaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLansia extends EditRecord
{
    protected static string $resource = LansiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
