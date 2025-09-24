<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\HelpdeskStatsOverviewWidget;
use App\Filament\Widgets\TicketsByCategoryChartWidget;
use App\Filament\Widgets\TicketsByStatusChartWidget;
use Filament\Pages\Dashboard;

class HelpdeskAnalyticsPage extends Dashboard
{
    /**
     * The title of the page.
     *
     * @var string
     */
    protected static ?string $title = 'Analitis Meja Bantuan';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-chart-pie';
    protected static string|\UnitEnum|null $navigationGroup = 'Laporan & Analitis';

    /**
     * Get the widgets that are displayed on the dashboard.
     *
     * @return array<class-string<\Filament\Widgets\Widget> | \Filament\Widgets\WidgetConfiguration>
     */
    public function getWidgets(): array
    {
        return [
            HelpdeskStatsOverviewWidget::class,
            TicketsByStatusChartWidget::class,
            TicketsByCategoryChartWidget::class,
        ];
    }
}
