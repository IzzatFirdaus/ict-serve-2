<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum AcquisitionType: string implements HasLabel
{
    case PEMBELIAN = 'pembelian';
    case SUMBANGAN = 'sumbangan';
    case PEMINDAHAN = 'pemindahan';

    public function getLabel(): ?string
    {
        return ucfirst($this->value);
    }
}
