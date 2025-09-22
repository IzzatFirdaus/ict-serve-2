<?php

namespace App\Filament\Resources\DepartmentResource;

use App\Models\Department;
use Filament\Resources\Resource;
use Filament\Resources\Forms\Form;
use Filament\Resources\Tables\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;

class DepartmentResource extends Resource
{
    protected static ?string $model = Department::class;

    protected static ?string $navigationIcon = 'heroicon-o-office-building';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('filament.department.fields.name'))
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label(__('filament.department.fields.id'))->sortable(),
                Tables\Columns\TextColumn::make('name')->label(__('filament.department.fields.name'))->searchable()->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label(__('filament.actions.edit')),
                Tables\Actions\DeleteAction::make()->label(__('filament.actions.delete')),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->label(__('filament.actions.delete_selected')),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDepartments::route('/'),
            'create' => Pages\CreateDepartment::route('/create'),
            'edit' => Pages\EditDepartment::route('/{record}/edit'),
        ];
    }
}
