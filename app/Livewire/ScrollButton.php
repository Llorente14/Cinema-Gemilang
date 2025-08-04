<?php

namespace App\Livewire;

use Livewire\Component;

class ScrollButton extends Component
{
    public string $direction = 'right';
    public string $target = 'scrollContainer';

    public function render()
    {
        return view('livewire.scroll-button');
    }
}
