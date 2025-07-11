<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'admin';
    case Customer = 'customer';


    public function getLabel(): string
    {
        return match ($this) {
            self::Admin => 'admin',
            self::Customer => 'customer',
        };
    }
}
