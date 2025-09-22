<?php

namespace App\Filament\Resources\LocationResource;

use App\Models\Location;
use Filament\Resources\Resource;
use Filament\Resources\Forms\Form;
use Filament\Resources\Tables\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;

class LocationResource extends Resource
{
    protected static ?string $model = Location::class;

    protected static ?string $navigationIcon = 'heroicon-o-location-marker';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->label(__('filament.location.fields.name'))->required()->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id')->label(__('filament.location.fields.id'))->sortable(),
            Tables\Columns\TextColumn::make('name')->label(__('filament.location.fields.name'))->searchable()->sortable(),
        ])->actions([
            Tables\Actions\EditAction::make()->label(__('filament.actions.edit')),
        ])->bulkActions([
            Tables\Actions\DeleteBulkAction::make()->label(__('filament.actions.delete_selected')),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLocations::route('/'),
            'create' => Pages\CreateLocation::route('/create'),
            'edit' => Pages\EditLocation::route('/{record}/edit'),
        ];
    }
}
