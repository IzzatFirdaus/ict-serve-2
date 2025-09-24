<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\UserStatus;
// Removed duplicate imports for Grid and Section
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Maklumat Peribadi')
                ->components([
                    Grid::make(2)->components([
                        TextInput::make('name')->required(),
                        TextInput::make('email')->email()->required()->unique(ignoreRecord: true),
                        TextInput::make('title')->label('Jawatan Penuh'),
                        TextInput::make('mobile_number')->label('No. Telefon Bimbit'),
                        TextInput::make('identification_number')->label('No. Kad Pengenalan')->unique(ignoreRecord: true),
                        TextInput::make('passport_number')->label('No. Passport')->unique(ignoreRecord: true),
                    ]),
                ]),
            Section::make('Organisasi')
                ->components([
                    Grid::make(3)->components([
                        Select::make('department_id')->relationship('department', 'name')->searchable()->preload(),
                        Select::make('position_id')->relationship('position', 'name')->searchable()->preload(),
                        Select::make('grade_id')->relationship('grade', 'name')->searchable()->preload(),
                    ]),
                ]),
            Section::make('Tetapan Akaun')
                ->components([
                    Grid::make(3)->components([
                        Select::make('status')->options(UserStatus::class)->required()->default(UserStatus::AKTIF->value),
                        Select::make('lang')->label('Bahasa')->options(['ms' => 'Bahasa Melayu', 'en' => 'English'])->required()->default('ms'),
                        Select::make('theme')->label('Tema')->options(['system' => 'Sistem', 'light' => 'Cerah', 'dark' => 'Gelap'])->required()->default('system'),
                    ]),
                ]),
            Section::make('Kata Laluan')
                ->components([
                    Grid::make(2)->components([
                        TextInput::make('password')
                            ->password()
                            // Note: Schema-based API may not support all Form-based features; adjust as needed
                            ->required(),
                        TextInput::make('password_confirmation')->password(),
                    ]),
                ]),
        ]);
    }
}
