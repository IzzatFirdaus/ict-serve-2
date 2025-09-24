<?php

namespace App\Filament\Resources\Departments\Schemas;

use App\Enums\BranchType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class DepartmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Jabatan')
                    ->required(),
                Select::make('branch_type')
                    ->label('Jenis Cawangan')
                    ->options(BranchType::class)
                    ->required(),
                TextInput::make('code')
                    ->label('Kod')
                    ->required()
                    ->unique(ignoreRecord: true),
                Select::make('head_user_id')
                    ->label('Ketua Jabatan')
                    ->relationship('head', 'name')
                    ->searchable()
                    ->preload(),
                Toggle::make('is_active')
                    ->label('Status Aktif')
                    ->required()
                    ->default(true),
                Textarea::make('description')
                    ->label('Keterangan')
                    ->columnSpanFull(),
            ]);
    }
}
