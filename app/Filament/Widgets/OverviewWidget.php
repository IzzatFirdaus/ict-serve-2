<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class OverviewWidget extends Widget
{
    protected static string $view = 'filament.widgets.overview-widget';

    protected static ?int $sort = 1;

    public function getData(): array
    {
        return [
            'total_users' => \App\Models\User::count(),
            'pending_approvals' => \App\Models\Approval::where('status', 'pending')->count(),
        ];
    }
}
