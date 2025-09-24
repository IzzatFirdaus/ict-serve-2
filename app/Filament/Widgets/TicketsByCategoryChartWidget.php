<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class TicketsByCategoryChartWidget extends ChartWidget
{
    protected ?string $heading = 'Tickets by Category';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Tickets',
                    'data' => [150, 100, 50, 20],
                ],
            ],
            'labels' => ['Hardware', 'Software', 'Network', 'Other'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
