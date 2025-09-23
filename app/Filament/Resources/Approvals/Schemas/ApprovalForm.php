<?php

namespace App\Filament\Resources\Approvals\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ApprovalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('approvable_type')
                    ->required(),
                TextInput::make('approvable_id')
                    ->required()
                    ->numeric(),
                Select::make('officer_id')
                    ->relationship('officer', 'name')
                    ->default(null),
                TextInput::make('stage')
                    ->default(null),
                Select::make('status')
                    ->options(['pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected'])
                    ->default('pending')
                    ->required(),
                Textarea::make('comments')
                    ->default(null)
                    ->columnSpanFull(),
                DateTimePicker::make('approval_timestamp'),
                TextInput::make('created_by')
                    ->numeric()
                    ->default(null),
                TextInput::make('updated_by')
                    ->numeric()
                    ->default(null),
                TextInput::make('deleted_by')
                    ->numeric()
                    ->default(null),
            ]);
    }
}
