<?php

namespace App\Livewire;

use Livewire\Component;

class PrimaryButton extends Component
{
    public string $text = 'Tombol';
    public string $icon = 'play'; // play | info
    public string $style = 'light'; // light | dark
    public function render()
    {
        return view('livewire.primary-button');
    }
}
