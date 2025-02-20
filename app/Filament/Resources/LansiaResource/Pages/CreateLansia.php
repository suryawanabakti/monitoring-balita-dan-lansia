<?php

namespace App\Filament\Resources\LansiaResource\Pages;

use App\Filament\Resources\LansiaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLansia extends CreateRecord
{
    protected static string $resource = LansiaResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {

        return $data;
    }
}
