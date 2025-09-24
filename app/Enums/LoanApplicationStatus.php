<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum LoanApplicationStatus: string implements HasColor, HasLabel
{
    case DRAFT = 'draft';
    case PENDING_SUPPORT = 'pending_support';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
    case ISSUED = 'issued';
    case RETURNED = 'returned';
    case COMPLETED = 'completed';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::DRAFT => 'Draft',
            self::PENDING_SUPPORT => 'Pending Support',
            self::APPROVED => 'Approved',
            self::REJECTED => 'Rejected',
            self::ISSUED => 'Issued',
            self::RETURNED => 'Returned',
            self::COMPLETED => 'Completed',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::DRAFT, self::PENDING_SUPPORT => 'warning',
            self::APPROVED, self::COMPLETED, self::RETURNED => 'success',
            self::REJECTED => 'danger',
            self::ISSUED => 'info',
        };
    }
}
