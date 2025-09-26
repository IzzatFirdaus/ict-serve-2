<?php

namespace App\Filament\Resources\Approvals\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class ApprovalsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('approvable_type')->searchable()->sortable(),
                TextColumn::make('officer.name')->searchable()->sortable(),
                TextColumn::make('stage')->searchable()->sortable(),
                TextColumn::make('status')->badge()->searchable()->sortable(),
                TextColumn::make('approval_timestamp')->dateTime()->sortable(),
                TextColumn::make('createdBy.name')->label('Created By')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updatedBy.name')->label('Updated By')->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                ActionGroup::make([
                    DeleteAction::make('bulkDelete')->requiresConfirmation()->action(fn ($records) => $records->each->delete()),
                    ForceDeleteAction::make('bulkForceDelete')->requiresConfirmation()->action(fn ($records) => $records->each->forceDelete()),
                    RestoreAction::make('bulkRestore')->requiresConfirmation()->action(fn ($records) => $records->each->restore()),
                ]),
            ]);
    }
}
