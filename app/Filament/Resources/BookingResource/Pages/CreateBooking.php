<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use Illuminate\Support\Str;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBooking extends CreateRecord
{
    protected static string $resource = BookingResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // 💡 Buat kode booking unik secara otomatis
        $data['booking_code'] = 'BOOK-' . strtoupper(Str::random(8));

        // 💡 Atur status default menjadi 'paid' karena ini dibuat manual oleh kasir
        $data['status'] = 'paid';

        return $data;
    }
}
