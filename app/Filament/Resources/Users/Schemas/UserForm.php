<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->default(null),
                TextInput::make('name')
                    ->required(),
                TextInput::make('identification_number')
                    ->required(),
                TextInput::make('passport_number')
                    ->default(null),
                TextInput::make('profile_photo_path')
                    ->default(null),
                Select::make('position_id')
                    ->relationship('position', 'name')
                    ->default(null),
                Select::make('grade_id')
                    ->relationship('grade', 'name')
                    ->default(null),
                Select::make('department_id')
                    ->relationship('department', 'name')
                    ->default(null),
                TextInput::make('level')
                    ->default(null),
                TextInput::make('mobile_number')
                    ->default(null),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->required(),
                Select::make('status')
                    ->options(['aktif' => 'Aktif', 'tidak_aktif' => 'Tidak aktif', 'digantung' => 'Digantung'])
                    ->default('aktif')
                    ->required(),
                DateTimePicker::make('email_verified_at'),
                Textarea::make('two_factor_secret')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('two_factor_recovery_codes')
                    ->default(null)
                    ->columnSpanFull(),
                DateTimePicker::make('two_factor_confirmed_at'),
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
