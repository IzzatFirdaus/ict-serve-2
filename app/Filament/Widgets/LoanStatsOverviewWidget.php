<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LoanStatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Active Loans', '72'),
            Stat::make('Pending Applications', '15'),
            Stat::make('Equipment on Loan', '120'),
        ];
    }
}
