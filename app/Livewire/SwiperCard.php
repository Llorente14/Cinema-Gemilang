<?php

namespace App\Livewire;

use App\Enums\MovieStatus;
use App\Models\Movie;
use Livewire\Component;

class SwiperCard extends Component
{
    public string $category;
    public $movies;
    public function mount(string $category)
    {
        $this->category = $this->getDisplay($category);
        $this->movies = $this->getDataByCategory($category);
    }

    public function getDataByCategory($category)
    {
        return match ($category) {
            MovieStatus::ComingSoon->value => Movie::where('status', MovieStatus::ComingSoon->value)->get(),

            MovieStatus::NowPlaying->value => Movie::where('status', MovieStatus::NowPlaying->value)->get(),

            'Top Favorite' => Movie::orderByDesc('rating')->take(10)->get(),

            default => collect(),
        };
    }
    public function getDisplay($category): string
    {
        return match ($category) {
            MovieStatus::ComingSoon->value => "Segera Hadir",

            MovieStatus::NowPlaying->value =>  "Sedang Tayang",

            'Top Favorite' => "Pilihan Favorit",

            default => $category,
        };
    }


    public function render()
    {
        return view('livewire.swiper-card');
    }
}
