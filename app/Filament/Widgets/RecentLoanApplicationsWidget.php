<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentLoanApplicationsWidget extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                // Replace with your actual query, e.g.,
                \App\Models\LoanApplication::query()->latest()->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('Applicant'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')->since(),
            ]);
    }
}
