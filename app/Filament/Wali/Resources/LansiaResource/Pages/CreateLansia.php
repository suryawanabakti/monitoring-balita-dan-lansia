<?php

namespace App\Filament\Wali\Resources\LansiaResource\Pages;

use App\Filament\Wali\Resources\LansiaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLansia extends CreateRecord
{
    protected static string $resource = LansiaResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}
