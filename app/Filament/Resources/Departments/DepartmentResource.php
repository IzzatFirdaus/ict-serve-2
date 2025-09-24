<?php


namespace App\Filament\Resources\Departments;

use App\Filament\Resources\Departments\Pages;
use App\Filament\Resources\Departments\RelationManagers;
use App\Filament\Resources\Departments\Schemas;
use App\Filament\Resources\Departments\Tables;
use App\Models\Department;
use BackedEnum;
use UnitEnum;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DepartmentResource extends Resource
{
    protected static ?string $model = Department::class;
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-office-2';
    protected static string|UnitEnum|null $navigationGroup = 'Pengguna';
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return Schemas\DepartmentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return Schemas\DepartmentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return Tables\DepartmentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\UsersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDepartments::route('/'),
            'create' => Pages\CreateDepartment::route('/create'),
            'view' => Pages\ViewDepartment::route('/{record}'),
            'edit' => Pages\EditDepartment::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes([SoftDeletingScope::class]);
    }
}
