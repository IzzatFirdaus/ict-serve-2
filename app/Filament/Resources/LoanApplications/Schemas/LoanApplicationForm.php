<?php

namespace App\Filament\Resources\LoanApplications\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LoanApplicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->default(null),
                Select::make('responsible_officer_id')
                    ->relationship('responsibleOfficer', 'name')
                    ->default(null),
                Select::make('supporting_officer_id')
                    ->relationship('supportingOfficer', 'name')
                    ->default(null),
                Textarea::make('purpose')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('location')
                    ->default(null),
                TextInput::make('return_location')
                    ->default(null),
                DatePicker::make('loan_start_date'),
                DatePicker::make('loan_end_date'),
                Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'pending_support' => 'Pending support',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                        'issued' => 'Issued',
                        'returned' => 'Returned',
                        'completed' => 'Completed',
                    ])
                    ->default('draft')
                    ->required(),
                Textarea::make('rejection_reason')
                    ->default(null)
                    ->columnSpanFull(),
                DateTimePicker::make('applicant_confirmation_timestamp'),
                DateTimePicker::make('submitted_at'),
                TextInput::make('approved_by')
                    ->numeric()
                    ->default(null),
                DateTimePicker::make('approved_at'),
                TextInput::make('rejected_by')
                    ->numeric()
                    ->default(null),
                DateTimePicker::make('rejected_at'),
                TextInput::make('cancelled_by')
                    ->numeric()
                    ->default(null),
                DateTimePicker::make('cancelled_at'),
                Textarea::make('admin_notes')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('current_approval_officer_id')
                    ->numeric()
                    ->default(null),
                TextInput::make('current_approval_stage')
                    ->default(null),
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
