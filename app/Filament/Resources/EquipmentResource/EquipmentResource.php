<?php

namespace App\Filament\Resources\EquipmentResource;

use App\Models\Equipment;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table as TablesTable;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class EquipmentResource extends Resource
{
    protected static ?string $model = Equipment::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('name')->label(__('filament.equipment.fields.name'))->required()->maxLength(255),
            Select::make('category_id')->relationship('category','name')->label(__('filament.equipment.fields.category')),
        ]);
    }

    public static function table(TablesTable $table): TablesTable
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id')->label(__('filament.equipment.fields.id'))->sortable(),
            Tables\Columns\TextColumn::make('name')->label(__('filament.equipment.fields.name'))->searchable()->sortable(),
            Tables\Columns\TextColumn::make('category.name')->label(__('filament.equipment.fields.category'))->sortable(),
        ])->actions([
            \Filament\Tables\Actions\EditAction::make()->label(__('filament.actions.edit')),
        ])->bulkActions([
            \Filament\Tables\Actions\DeleteBulkAction::make()->label(__('filament.actions.delete_selected')),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEquipment::route('/'),
            'create' => Pages\CreateEquipment::route('/create'),
            'edit' => Pages\EditEquipment::route('/{record}/edit'),
        ];
    }
}
