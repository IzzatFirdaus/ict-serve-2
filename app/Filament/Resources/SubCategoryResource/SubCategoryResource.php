<?php

namespace App\Filament\Resources\SubCategoryResource;

use App\Models\SubCategory;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table as TablesTable;
use Filament\Tables;
use Filament\Forms\Components\TextInput;

class SubCategoryResource extends Resource
{
    protected static ?string $model = SubCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema->schema([
            TextInput::make('name')->label(__('filament.subcategory.fields.name'))->required()->maxLength(255),
        ]);
    }

    public static function table(\Filament\Tables\Table $table): \Filament\Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id')->label(__('filament.subcategory.fields.id'))->sortable(),
            Tables\Columns\TextColumn::make('name')->label(__('filament.subcategory.fields.name'))->searchable()->sortable(),
        ])->actions([
            \Filament\Tables\Actions\EditAction::make()->label(__('filament.actions.edit')),
        ])->bulkActions([
            \Filament\Tables\Actions\DeleteBulkAction::make()->label(__('filament.actions.delete_selected')),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubCategories::route('/'),
            'create' => Pages\CreateSubCategory::route('/create'),
            'edit' => Pages\EditSubCategory::route('/{record}/edit'),
        ];
    }
}
