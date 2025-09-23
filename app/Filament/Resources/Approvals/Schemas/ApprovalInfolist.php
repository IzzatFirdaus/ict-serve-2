<?php

namespace App\Filament\Resources\Approvals\Schemas;

use App\Models\Approval;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ApprovalInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('approvable_type'),
                TextEntry::make('approvable_id')
                    ->numeric(),
                TextEntry::make('officer.name')
                    ->label('Officer')
                    ->placeholder('-'),
                TextEntry::make('stage')
                    ->placeholder('-'),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('comments')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('approval_timestamp')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('created_by')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('updated_by')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('deleted_by')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Approval $record): bool => $record->trashed()),
            ]);
    }
}
