<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class DashboardStatsWidget extends Widget
{
    protected string $view = 'filament.widgets.dashboard-stats-widget';

    protected function getChartData(): array
    {
        return [
            'labels' => ['Pending Approvals', 'Open Tickets', 'Overdue Loans'],
            'datasets' => [
                [
                    'label' => 'Count',
                    'data' => [10, 25, 5],
                    'backgroundColor' => ['#4CAF50', '#FFC107', '#F44336'],
                ],
            ],
        ];
    }
}
