<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\LoansByTypeChartWidget;
use App\Filament\Widgets\LoanStatsOverviewWidget;
use App\Filament\Widgets\RecentLoanApplicationsWidget;
use Filament\Pages\Dashboard;

class LoanAnalyticsPage extends Dashboard
{
    /**
     * The title of the page displayed in the navigation and header.
     */
    protected static ?string $title = 'Analitis Pinjaman';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-chart-bar-square';

    protected static string|\UnitEnum|null $navigationGroup = 'Laporan & Analitis';

    /**
     * Get the widgets that are displayed on the dashboard.
     *
     * This method defines the layout and content of the analytics page.
     * Each widget is a self-contained component for displaying data.
     *
     * @return array<class-string<\Filament\Widgets\Widget> | \Filament\Widgets\WidgetConfiguration>
     */
    public function getWidgets(): array
    {
        return [
            LoanStatsOverviewWidget::class,
            LoansByTypeChartWidget::class,
            RecentLoanApplicationsWidget::class,
        ];
    }
}
