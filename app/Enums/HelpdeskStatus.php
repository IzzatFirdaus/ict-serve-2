<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum HelpdeskStatus: string implements HasColor, HasLabel
{
    case OPEN = 'open';
    case IN_PROGRESS = 'in_progress';
    case PENDING_USER_FEEDBACK = 'pending_user_feedback';
    case RESOLVED = 'resolved';
    case CLOSED = 'closed';
    case REOPENED = 'reopened';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::OPEN => 'Open',
            self::IN_PROGRESS => 'In Progress',
            self::PENDING_USER_FEEDBACK => 'Pending User Feedback',
            self::RESOLVED => 'Resolved',
            self::CLOSED => 'Closed',
            self::REOPENED => 'Reopened',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::OPEN, self::REOPENED => 'danger',
            self::IN_PROGRESS => 'warning',
            self::PENDING_USER_FEEDBACK => 'info',
            self::RESOLVED, self::CLOSED => 'success',
        };
    }
}
