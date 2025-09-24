<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class TicketsByStatusChartWidget extends ChartWidget
{
    protected ?string $heading = 'Tickets by Status';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Tickets',
                    'data' => [192, 120, 320, 50],
                ],
            ],
            'labels' => ['Open', 'In Progress', 'Resolved', 'Closed'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
