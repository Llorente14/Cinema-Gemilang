<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\BookingSeat;
use App\Models\Showtime;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'ani@example.com')->first();
        $showtime = Showtime::find(1);
        $seatsToBook = ['C5', 'C6'];

        // 1. Create the main booking record
        $booking = Booking::create([
            'user_id' => $user->id,
            'showtime_id' => $showtime->id,
            'booking_code' => 'CG-' . Str::random(8),
            'total_price' => $showtime->price * count($seatsToBook),
            'status' => 'confirmed',
        ]);

        // 2. Create the seat records
        foreach ($seatsToBook as $seatNumber) {
            BookingSeat::create([
                'booking_id' => $booking->id,
                'seat_number' => $seatNumber,
            ]);
        }
    }
}