<?php

namespace App\Filament\Pimpinan\Resources\BalitaResource\Pages;

use App\Filament\Pimpinan\Resources\BalitaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBalita extends EditRecord
{
    protected static string $resource = BalitaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
