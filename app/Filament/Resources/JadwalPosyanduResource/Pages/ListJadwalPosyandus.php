<?php

namespace App\Filament\Resources\JadwalPosyanduResource\Pages;

use App\Filament\Resources\JadwalPosyanduResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJadwalPosyandus extends ListRecords
{
    protected static string $resource = JadwalPosyanduResource::class;
    protected static ?string $title = 'Jadwal Posyandu';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
