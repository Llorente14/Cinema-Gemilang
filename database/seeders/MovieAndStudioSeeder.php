<?php

namespace Database\Seeders;

use App\Enums\AgeRating;
use App\Enums\MovieStatus;
use App\Models\Movie;
use App\Models\Studio;
use Illuminate\Database\Seeder;

class MovieAndStudioSeeder extends Seeder
{
    public function run(): void
    {
        Movie::create([
            'title' => 'John Wick: Chapter 4',
            'slug' => 'john-wick-chapter-4',
            'synopsis' => 'John Wick uncovers a path to defeating The High Table...',
            'duration_in_minutes' => 169,
            'status' => MovieStatus::NowPlaying,
            'release_date' => now()->subDays(3),
            'poster_url' => 'https://image.tmdb.org/t/p/w500/vZloFAK7NmvMGKE7VkF5UHaz0I.jpg',
            'age_rating' => AgeRating::D17,
        ]);

        Studio::create([
            'name' => 'Studio A',
            'seat_rows' => 10,
            'seat_columns' => 12,
        ]);
        Studio::create([
            'name' => 'Studio B',
            'seat_rows' => 5,
            'seat_columns' => 8,
        ]);
    }
}
