<?php

namespace App\Filament\Widgets;

use App\Models\Balita;
use App\Models\Lansia;
use App\Models\RekamKesehatan;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAdminOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Balita', Balita::count())
                ->description(Balita::whereMonth('created_at', Carbon::now()->month)
                    ->whereYear('created_at', Carbon::now()->year)
                    ->count() . ' bertambah di bulan ini')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('primary'),
            Stat::make('Jumlah Lansia', Lansia::count())
                ->description(Lansia::whereMonth('created_at', Carbon::now()->month)
                    ->whereYear('created_at', Carbon::now()->year)
                    ->count() . ' bertambah di bulan ini')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('primary'),
            Stat::make('Jumlah Rekam Kesehatan', RekamKesehatan::count())
                ->description(RekamKesehatan::whereMonth('created_at', Carbon::now()->month)
                    ->whereYear('created_at', Carbon::now()->year)
                    ->count() . ' bertambah di bulan ini')->descriptionIcon('heroicon-m-arrow-trending-up')->color('primary'),
        ];
    }
}
