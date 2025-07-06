<?php

namespace App\Enums;

enum MovieStatus: string
{
    case ComingSoon = 'Coming Soon';
    case NowPlaying = 'Now Playing';
    case Archived = 'Archived';
}
