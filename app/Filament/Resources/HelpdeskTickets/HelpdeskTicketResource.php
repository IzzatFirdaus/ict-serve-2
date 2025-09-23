<?php

namespace App\Filament\Resources\HelpdeskTickets;

use App\Filament\Resources\HelpdeskTickets\Pages\CreateHelpdeskTicket;
use App\Filament\Resources\HelpdeskTickets\Pages\EditHelpdeskTicket;
use App\Filament\Resources\HelpdeskTickets\Pages\ListHelpdeskTickets;
use App\Filament\Resources\HelpdeskTickets\Pages\ViewHelpdeskTicket;
use App\Filament\Resources\HelpdeskTickets\Schemas\HelpdeskTicketForm;
use App\Filament\Resources\HelpdeskTickets\Schemas\HelpdeskTicketInfolist;
use App\Filament\Resources\HelpdeskTickets\Tables\HelpdeskTicketsTable;
use App\Models\HelpdeskTicket;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HelpdeskTicketResource extends Resource
{
    protected static ?string $model = HelpdeskTicket::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'subject';

    public static function form(Schema $schema): Schema
    {
        return HelpdeskTicketForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return HelpdeskTicketInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HelpdeskTicketsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHelpdeskTickets::route('/'),
            'create' => CreateHelpdeskTicket::route('/create'),
            'view' => ViewHelpdeskTicket::route('/{record}'),
            'edit' => EditHelpdeskTicket::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
