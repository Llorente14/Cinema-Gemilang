<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Homepage extends Component
{
    public $title;

    #[Title('Cinema Gemilang')]
    public function render()
    {
        return view('livewire.homepage');
    }
}
