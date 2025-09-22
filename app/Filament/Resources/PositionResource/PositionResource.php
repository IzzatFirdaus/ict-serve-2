<?php

namespace App\Filament\Resources\PositionResource;

use App\Models\Position;
use Filament\Resources\Resource;
use Filament\Resources\Forms\Form;
use Filament\Resources\Tables\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;

class PositionResource extends Resource
{
    protected static ?string $model = Position::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')->label(__('filament.position.fields.title'))->required()->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id')->label(__('filament.position.fields.id'))->sortable(),
            Tables\Columns\TextColumn::make('title')->label(__('filament.position.fields.title'))->searchable()->sortable(),
        ])->actions([
            Tables\Actions\EditAction::make()->label(__('filament.actions.edit')),
        ])->bulkActions([
            Tables\Actions\DeleteBulkAction::make()->label(__('filament.actions.delete_selected')),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPositions::route('/'),
            'create' => Pages\CreatePosition::route('/create'),
            'edit' => Pages\EditPosition::route('/{record}/edit'),
        ];
    }
}
