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
        $showtimes = Showtime::where('start_time', '>', now())->get();
        $customers = User::where('role', 'customer')->get();

        // Pastikan ada data showtime dan customer sebelum melanjutkan
        if ($showtimes->isEmpty() || $customers->isEmpty()) {
            $this->command->warn('Tidak ada data Showtime atau Customer, lewati BookingSeeder.');
            return;
        }

        // Booking 1
        $booking1 = Booking::create([
            'user_id' => $customers[3]->id,
            'showtime_id' => $showtimes->first()->id,
            'quantity' => 2,
            'total_price' => $showtimes->first()->price * 2,
            'status' => 'confirmed',
            'booking_code' => 'CG-' . strtoupper(Str::random(6)),
        ]);
        BookingSeat::create(['booking_id' => $booking1->id, 'seat_number' => 'C5']);
        BookingSeat::create(['booking_id' => $booking1->id, 'seat_number' => 'C6']);

        // Booking 2
        $booking2 = Booking::create([
            'user_id' => $customers->random()->id,
            'showtime_id' => $showtimes->get(1)->id,
            'quantity' => 1,
            'total_price' => $showtimes->get(1)->price,
            'status' => 'pending',
            'booking_code' => 'CG-' . strtoupper(Str::random(6)),
        ]);
        BookingSeat::create(['booking_id' => $booking2->id, 'seat_number' => 'A1']);
    }
}
