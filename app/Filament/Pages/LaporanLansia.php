<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\StatsBalita;
use App\Filament\Widgets\StatsLansia;
use App\Filament\Widgets\TableRekamMedisLansia;
use Filament\Pages\Page;

class LaporanLansia extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Laporan';

    public function getWidgets(): array
    {
        return [
            StatsLansia::class,
            TableRekamMedisLansia::class,
        ];
    }

    protected static string $view = 'filament.pages.laporan-lansia';
}
