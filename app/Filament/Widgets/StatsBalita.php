<?php

namespace App\Filament\Widgets;

use App\Models\Balita;
use App\Models\RekamKesehatan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsBalita extends BaseWidget
{
    protected function getColumns(): int
    {
        return 2;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Balita', Balita::count()),
            Stat::make('Jumlah Rekam Kesehatan Balita', RekamKesehatan::whereNotNull('balita_id')->count())
        ];
    }
}
