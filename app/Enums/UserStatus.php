<?php

namespace App\Enums;

enum UserStatus: string
{
    case Aktif = 'aktif';
    case TidakAktif = 'tidak_aktif';
    case Diharamkan = 'diharamkan';
}
