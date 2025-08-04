<?php

namespace App\Livewire;

use Livewire\Component;

class InfoMovie extends Component
{
    public string $class = '';
    public string $age = '';
    public string $duration = '';
    public function render()
    {
        return view('livewire.info-movie');
    }
}
