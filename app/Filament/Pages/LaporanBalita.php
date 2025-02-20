<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\StatsBalita;
use App\Filament\Widgets\TableRekamMedisBalita;
use Filament\Pages\Page;

class LaporanBalita extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Laporan';
    public function getWidgets(): array
    {
        return [
            StatsBalita::class,
            TableRekamMedisBalita::class,
        ];
    }
    protected static string $view = 'filament.pages.laporan-balita';
}
