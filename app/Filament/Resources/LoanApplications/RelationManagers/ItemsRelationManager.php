<?php

namespace App\Filament\Resources\LoanApplications\RelationManagers;

use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    public function form(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\TextInput::make('equipment_type')->required(),
            Forms\Components\TextInput::make('quantity_requested')->numeric()->required()->default(1),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('equipment_type')
            ->columns([
                Tables\Columns\TextColumn::make('equipment_type'),
                Tables\Columns\TextColumn::make('quantity_requested'),
                Tables\Columns\TextColumn::make('quantity_approved'),
                Tables\Columns\TextColumn::make('quantity_issued'),
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}
