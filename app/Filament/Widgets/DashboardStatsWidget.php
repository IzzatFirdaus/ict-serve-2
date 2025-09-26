<?php

namespace App\Filament\Widgets;

use App\Enums\HelpdeskStatus;
use App\Enums\LoanApplicationStatus;
use App\Models\HelpdeskTicket;
use App\Models\LoanApplication;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStatsWidget extends BaseWidget
{
    /**
     * Get the statistics to display in the widget.
     *
     * @return array<Stat>
     */
    protected function getStats(): array
    {
        // Fetch dynamic counts from the database
        $pendingApprovalsCount = LoanApplication::query()
            ->where('status', LoanApplicationStatus::PENDING_SUPPORT)
            ->count();

        $openTicketsCount = HelpdeskTicket::query()
            ->where('status', HelpdeskStatus::OPEN)
            ->count();

        // You can add more complex queries as needed, for example:
        $overdueLoansCount = LoanApplication::query()
            ->where('status', LoanApplicationStatus::ISSUED)
            ->where('loan_end_date', '<', now())
            ->count();

        return [
            Stat::make('Pending Approvals', $pendingApprovalsCount)
                ->description('Loan applications awaiting support')
                ->color('warning')
                ->icon('heroicon-o-clock'),

            Stat::make('Open Tickets', $openTicketsCount)
                ->description('Helpdesk tickets requiring action')
                ->color('info')
                ->icon('heroicon-o-lifebuoy'),

            Stat::make('Overdue Loans', $overdueLoansCount)
                ->description('Equipment not returned on time')
                ->color('danger')
                ->icon('heroicon-o-exclamation-triangle'),
        ];
    }
}
