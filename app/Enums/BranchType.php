<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum BranchType: string implements HasColor, HasLabel
{
    case IBU_PEJABAT = 'ibu_pejabat';
    case PEJABAT_NEGERI = 'pejabat_negeri';
    case UNIT = 'unit';

    public function getLabel(): string
    {
        return match ($this) {
            self::IBU_PEJABAT => 'Ibu Pejabat',
            self::PEJABAT_NEGERI => 'Pejabat Negeri',
            self::UNIT => 'Unit',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::IBU_PEJABAT => 'primary',
            self::PEJABAT_NEGERI => 'success',
            self::UNIT => 'warning',
        };
    }
}
