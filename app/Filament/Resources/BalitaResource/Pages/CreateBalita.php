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
        $pasien = \App\Models\Pasien::create([
            'nomor' => $data['nib'],
            'nama' => $data['nama']
        ]);
        $data['pasien_id'] = $pasien->id;
        return $data;
    }
}
