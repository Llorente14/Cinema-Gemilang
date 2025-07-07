<?php

namespace App\Enums;

enum MovieStatus: string
{
    case ComingSoon = 'Coming Soon';
    case NowPlaying = 'Now Playing';
    case Archived = 'Archived';

    public function getLabel(): string
    {
        return match ($this) {
            self::ComingSoon => 'Coming Soon',
            self::NowPlaying => 'Now Playing',
            self::Archived => 'Archived',
        };
    }
}
