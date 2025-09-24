<?php

namespace App\Filament\Resources\Approvals\Schemas;

use App\Enums\ApprovalStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ApprovalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
                TextInput::make('approvable_type')
                    ->required(),
                TextInput::make('approvable_id')
                    ->required()
                    ->numeric(),
                Select::make('officer_id')
                    ->relationship('officer', 'name')
                    ->searchable()
                    ->preload(),
                TextInput::make('stage'),
                Select::make('status')
                    ->options(ApprovalStatus::class)
                    ->required()
                    ->default(ApprovalStatus::PENDING),
                Textarea::make('comments')
                    ->columnSpanFull(),
                DateTimePicker::make('approval_timestamp'),
            ]);
    }
}
