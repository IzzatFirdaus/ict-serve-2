<?php

namespace App\Filament\Resources\HelpdeskTickets\Pages;

use App\Filament\Resources\HelpdeskTickets\HelpdeskTicketResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewHelpdeskTicket extends ViewRecord
{
    protected static string $resource = HelpdeskTicketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
