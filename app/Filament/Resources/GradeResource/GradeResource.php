<?php

namespace App\Filament\Resources\GradeResource;

use App\Models\Grade;
use Filament\Resources\Resource;
use Filament\Resources\Forms\Form;
use Filament\Resources\Tables\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;

class GradeResource extends Resource
{
    protected static ?string $model = Grade::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->label(__('filament.grade.fields.name'))->required()->maxLength(255),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id')->label(__('filament.grade.fields.id'))->sortable(),
            Tables\Columns\TextColumn::make('name')->label(__('filament.grade.fields.name'))->searchable()->sortable(),
        ])->actions([
            Tables\Actions\EditAction::make()->label(__('filament.actions.edit')),
        ])->bulkActions([
            Tables\Actions\DeleteBulkAction::make()->label(__('filament.actions.delete_selected')),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGrades::route('/'),
            'create' => Pages\CreateGrade::route('/create'),
            'edit' => Pages\EditGrade::route('/{record}/edit'),
        ];
    }
}
