<?php

namespace App\Enums;

enum BookingStatus: string
{
    case Pending = 'pending';
    case Confirmed = 'confirmed';
    case Cancelled = 'cancelled';

    public function getLabel(): string
    {
        return match ($this) {
            self::Pending => 'pending',
            self::Confirmed => 'confirmed',
            self::Cancelled => 'cancelled',
        };
    }
}
