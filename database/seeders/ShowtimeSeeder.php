<?php

namespace Database\Seeders;

use App\Models\Showtime;
use Illuminate\Database\Seeder;

class ShowtimeSeeder extends Seeder
{
    public function run(): void
    {
        Showtime::create([
            'movie_id' => 1,
            'studio_id' => 1,
            'start_time' => now()->addDays(1)->setTime(19, 0),
            'price' => 50000,
        ]);
        Showtime::create([
            'movie_id' => 1,
            'studio_id' => 2,
            'start_time' => now()->addDays(1)->setTime(21, 30, 0),
            'price' => 55000,
        ]);
    }
}
