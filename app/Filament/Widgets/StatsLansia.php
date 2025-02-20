<?php

namespace App\Filament\Widgets;

use App\Models\Lansia;
use App\Models\RekamKesehatan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsLansia extends BaseWidget
{
    protected function getColumns(): int
    {
        return 2;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah lansia', Lansia::count()),
            Stat::make('Jumlah Rekam Kesehatan lansia', RekamKesehatan::whereNotNull('lansia_id')->count())
        ];
    }
}
