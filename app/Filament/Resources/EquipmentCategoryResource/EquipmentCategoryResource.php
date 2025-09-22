<?php

namespace App\Filament\Resources\EquipmentCategoryResource;

use App\Models\EquipmentCategory;
use Filament\Resources\Resource;
use Filament\Resources\Forms\Form;
use Filament\Resources\Tables\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;

class EquipmentCategoryResource extends Resource
{
    protected static ?string $model = EquipmentCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->label(__('filament.equipment_category.fields.name'))->required()->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id')->label(__('filament.equipment_category.fields.id'))->sortable(),
            Tables\Columns\TextColumn::make('name')->label(__('filament.equipment_category.fields.name'))->searchable()->sortable(),
        ])->actions([
            Tables\Actions\EditAction::make()->label(__('filament.actions.edit')),
        ])->bulkActions([
            Tables\Actions\DeleteBulkAction::make()->label(__('filament.actions.delete_selected')),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEquipmentCategories::route('/'),
            'create' => Pages\CreateEquipmentCategory::route('/create'),
            'edit' => Pages\EditEquipmentCategory::route('/{record}/edit'),
        ];
    }
}
