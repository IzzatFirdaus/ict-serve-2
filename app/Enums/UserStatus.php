<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum UserStatus: string implements HasColor, HasLabel
{
    case AKTIF = 'aktif';
    case TIDAK_AKTIF = 'tidak_aktif';
    case DIGANTUNG = 'digantung';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::AKTIF => 'Aktif',
            self::TIDAK_AKTIF => 'Tidak Aktif',
            self::DIGANTUNG => 'Digantung',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::AKTIF => 'success',
            self::TIDAK_AKTIF => 'gray',
            self::DIGANTUNG => 'danger',
        };
    }
}
