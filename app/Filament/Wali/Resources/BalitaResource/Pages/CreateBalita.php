<?php

namespace App\Filament\Wali\Resources\BalitaResource\Pages;

use App\Filament\Wali\Resources\BalitaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBalita extends CreateRecord
{
    protected static string $resource = BalitaResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}
