<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum HelpdeskPriority: string implements HasColor, HasLabel
{
    case LOW = 'low';
    case MEDIUM = 'medium';
    case HIGH = 'high';
    case CRITICAL = 'critical';

    public function getLabel(): ?string
    {
        return ucfirst($this->value);
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::LOW => 'info',
            self::MEDIUM => 'success',
            self::HIGH => 'warning',
            self::CRITICAL => 'danger',
        };
    }
}
