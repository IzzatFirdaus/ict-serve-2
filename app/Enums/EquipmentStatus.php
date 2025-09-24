<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum EquipmentStatus: string implements HasColor, HasLabel
{
    case AVAILABLE = 'available';
    case ON_LOAN = 'on_loan';
    case UNDER_MAINTENANCE = 'under_maintenance';
    case RETIRED = 'retired';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::AVAILABLE => 'Available',
            self::ON_LOAN => 'On Loan',
            self::UNDER_MAINTENANCE => 'Under Maintenance',
            self::RETIRED => 'Retired',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::AVAILABLE => 'success',
            self::ON_LOAN => 'warning',
            self::UNDER_MAINTENANCE => 'info',
            self::RETIRED => 'danger',
        };
    }
}
