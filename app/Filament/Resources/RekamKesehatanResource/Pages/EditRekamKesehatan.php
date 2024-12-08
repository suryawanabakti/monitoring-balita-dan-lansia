<?php

namespace App\Filament\Resources\RekamKesehatanResource\Pages;

use App\Filament\Resources\RekamKesehatanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRekamKesehatan extends EditRecord
{
    protected static string $resource = RekamKesehatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
