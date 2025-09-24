<?php

namespace App\Filament\Resources\Approvals\Schemas;

use App\Models\Approval;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ApprovalInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
                TextEntry::make('approvable_type')->label('Record Type'),
                TextEntry::make('approvable_id')->label('Record ID'),
                TextEntry::make('officer.name')->label('Officer'),
                TextEntry::make('stage'),
                TextEntry::make('status')->badge(),
                TextEntry::make('comments')->columnSpanFull(),
                TextEntry::make('approval_timestamp')->dateTime(),
                TextEntry::make('createdBy.name')->label('Created By'),
                TextEntry::make('updatedBy.name')->label('Updated By'),
                TextEntry::make('deletedBy.name')->label('Deleted By'),
                TextEntry::make('created_at')->dateTime(),
                TextEntry::make('updated_at')->dateTime(),
                TextEntry::make('deleted_at')->dateTime()
                    ->visible(fn (?Approval $record): bool => $record?->trashed()),
            ]);
    }
}
