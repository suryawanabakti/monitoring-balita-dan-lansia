<?php

namespace App\Filament\Wali\Resources\JadwalPosyanduResource\Pages;

use App\Filament\Wali\Resources\JadwalPosyanduResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJadwalPosyandus extends ListRecords
{
    protected static string $resource = JadwalPosyanduResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
