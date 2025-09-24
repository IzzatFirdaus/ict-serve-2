<?php

namespace App\Filament\Resources\HelpdeskTickets\Schemas;

use App\Enums\HelpdeskPriority;
use App\Enums\HelpdeskStatus;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
// Removed Group import; not available in Filament 4
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class HelpdeskTicketForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('subject')->required(),
                Select::make('category_id')->relationship('category', 'name')->searchable()->preload()->required(),
                Textarea::make('description')->required(),
                Textarea::make('resolution_notes'),
                Select::make('status')->options(HelpdeskStatus::class)->required()->default(HelpdeskStatus::OPEN),
                Select::make('priority')->options(HelpdeskPriority::class)->required()->default(HelpdeskPriority::MEDIUM),
                DatePicker::make('due_date'),
                Select::make('user_id')->label('Reporter')->relationship('user', 'name')->searchable()->preload()->required(),
                Select::make('assigned_to_user_id')->label('Assigned To')->relationship('assignedTo', 'name')->searchable()->preload(),
            ]);
    }
}
