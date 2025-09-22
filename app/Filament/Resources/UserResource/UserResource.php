<?php

namespace App\Filament\Resources\UserResource;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Resources\Forms\Form;
use Filament\Resources\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('filament.user.fields.name'))
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label(__('filament.user.fields.email'))
                    ->email()
                    ->required()
                    ->maxLength(255),

                Select::make('department_id')
                    ->label(__('filament.user.fields.department'))
                    ->relationship('department', 'name')
                    ->preload(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label(__('filament.user.fields.id'))->sortable(),
                TextColumn::make('name')->label(__('filament.user.fields.name'))->searchable()->sortable(),
                TextColumn::make('email')->label(__('filament.user.fields.email'))->searchable(),
                TextColumn::make('department.name')->label(__('filament.user.fields.department')),
            ])
            ->filters([
                // Add filters
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
