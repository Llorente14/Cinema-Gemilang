<?php

namespace App\Livewire;

use Livewire\Component;

class CarousellCard extends Component
{
    public $realiseDate = "7 Agustus 2006";
    public $title = "Conan Cun";
    public $imageUrl = "images/TestCard.jpg";
    public $duration = "1h 34m";
    public $age = "R13";
    public function render()
    {
        return view('livewire.carousell-card');
    }
}
