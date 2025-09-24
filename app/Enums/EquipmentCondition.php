<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum EquipmentCondition: string implements HasLabel
{
    case BARU = 'baru';
    case BAIK = 'baik';
    case SEDERHANA = 'sederhana';
    case ROSAK = 'rosak';
    case HILANG = 'hilang';

    public function getLabel(): ?string
    {
        return ucfirst($this->value);
    }
}
