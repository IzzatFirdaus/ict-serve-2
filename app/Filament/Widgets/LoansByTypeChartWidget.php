<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class LoansByTypeChartWidget extends ChartWidget
{
    protected ?string $heading = 'Loans by Equipment Type';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Loans',
                    'data' => [50, 30, 25],
                ],
            ],
            'labels' => ['Laptop', 'Projector', 'Tablet'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
