<?php

namespace App\Filament\Resources\Departments\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DepartmentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('branch_type')->badge(),
                TextEntry::make('code'),
                TextEntry::make('head.name')->label('Ketua Jabatan'),
                IconEntry::make('is_active')->boolean()->label('Status Aktif'),
                TextEntry::make('description')->columnSpanFull(),
                TextEntry::make('createdBy.name')->label('Dicipta Oleh'),
                TextEntry::make('updatedBy.name')->label('Dikemaskini Oleh'),
            ]);
    }
}
