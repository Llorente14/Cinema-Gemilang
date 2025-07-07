<?php

namespace App\Enums;

enum AgeRating: string
{
    case SU = 'SU';
    case R13 = 'R13+';
    case D17 = 'D17+';
    case D21 = 'D21+';

    public function getLabel(): string
    {
        return match ($this) {
            self::SU => 'SU',
            self::R13 => 'R13',
            self::D17 => 'D17',
            self::D21 => 'D21',
        };
    }
}
