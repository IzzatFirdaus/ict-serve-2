<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Spatie\Permission\Models\Role;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class RoleResource extends Resource
{

    protected static ?string $model = Role::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-finger-print';
    protected static string|\UnitEnum|null $navigationGroup = 'Pentadbiran Sistem';

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\TextInput::make('name')
                ->label('Nama Peranan')
                ->minLength(2)
                ->maxLength(255)
                ->required()
                ->unique(ignoreRecord: true),
            Forms\Components\Select::make('permissions')
                ->label('Kebenaran')
                ->multiple()
                ->relationship('permissions', 'name')
                ->preload()
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Peranan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dicipta Pada')
                    ->dateTime('d-m-Y')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }
}
