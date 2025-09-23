<?php

namespace App\Filament\Resources\Equipment\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EquipmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('asset_type')
                    ->default(null),
                TextInput::make('brand')
                    ->default(null),
                TextInput::make('model')
                    ->default(null),
                TextInput::make('serial_number')
                    ->default(null),
                TextInput::make('tag_id')
                    ->default(null),
                DatePicker::make('purchase_date'),
                DatePicker::make('warranty_expiry_date'),
                Select::make('status')
                    ->options([
            'available' => 'Available',
            'on_loan' => 'On loan',
            'under_maintenance' => 'Under maintenance',
            'retired' => 'Retired',
        ])
                    ->default('available')
                    ->required(),
                TextInput::make('current_location')
                    ->default(null),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
                Select::make('condition_status')
                    ->options([
            'baru' => 'Baru',
            'baik' => 'Baik',
            'sederhana' => 'Sederhana',
            'rosak' => 'Rosak',
            'hilang' => 'Hilang',
        ])
                    ->default('baik')
                    ->required(),
                Select::make('department_id')
                    ->relationship('department', 'name')
                    ->default(null),
                Select::make('equipment_category_id')
                    ->relationship('equipmentCategory', 'name')
                    ->default(null),
                Select::make('sub_category_id')
                    ->relationship('subCategory', 'name')
                    ->default(null),
                Select::make('location_id')
                    ->relationship('location', 'name')
                    ->default(null),
                TextInput::make('item_code')
                    ->default(null),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('purchase_price')
                    ->numeric()
                    ->default(null),
                Select::make('acquisition_type')
                    ->options(['pembelian' => 'Pembelian', 'sumbangan' => 'Sumbangan', 'pemindahan' => 'Pemindahan'])
                    ->default(null),
                TextInput::make('classification')
                    ->default(null),
                TextInput::make('funded_by')
                    ->default(null),
                TextInput::make('supplier_name')
                    ->default(null),
                TextInput::make('created_by')
                    ->numeric()
                    ->default(null),
                TextInput::make('updated_by')
                    ->numeric()
                    ->default(null),
                TextInput::make('deleted_by')
                    ->numeric()
                    ->default(null),
            ]);
    }
}
