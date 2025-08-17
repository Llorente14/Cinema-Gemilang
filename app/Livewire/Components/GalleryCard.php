<?php

namespace App\Livewire\Components;

use Livewire\Component;

class GalleryCard extends Component
{
    public $title = "Conan Cun";
    public $imageUrl = "images/TestCard.jpg";
    public $duration = "1h 34m";
    public $age = "R13";
    public function render()
    {
        return view('livewire.components.gallery-card');
    }
}
