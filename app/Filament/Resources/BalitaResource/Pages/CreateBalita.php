<?php

namespace App\Filament\Resources\BalitaResource\Pages;

use App\Filament\Resources\BalitaResource;
use App\Models\Pasien;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBalita extends CreateRecord
{
    protected static string $resource = BalitaResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $data;
    }
}
