<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class HelpdeskStatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Open Tickets', '192'),
            Stat::make('Resolved Tickets', '320'),
            Stat::make('Average Resolution Time', '3:12'),
        ];
    }
}
