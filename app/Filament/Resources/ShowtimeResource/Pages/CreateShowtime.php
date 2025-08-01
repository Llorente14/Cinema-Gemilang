<?php

namespace App\Filament\Resources\ShowtimeResource\Pages;

use App\Filament\Resources\ShowtimeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateShowtime extends CreateRecord
{
    protected static string $resource = ShowtimeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
