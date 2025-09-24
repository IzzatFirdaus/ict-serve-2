<?php


namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\Pages;
use App\Filament\Resources\Users\Schemas;
use App\Filament\Resources\Users\Tables;
use App\Models\User;
use BackedEnum;
use UnitEnum;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-users';
    protected static string|UnitEnum|null $navigationGroup = 'Pengguna';
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return Schemas\UserForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return Schemas\UserInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return Tables\UsersTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes([SoftDeletingScope::class]);
    }
}
