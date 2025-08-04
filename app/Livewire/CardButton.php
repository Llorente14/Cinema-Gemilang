<?php

namespace App\Livewire;

use Livewire\Component;

class CardButton extends Component
{
    public string $href = 'https://youtu.be/hnfF9tgN8OI?si=IlVYG_5Ipds1N2SA';
    public string $text = 'Tombol';
    public string $icon = 'play'; // atau 'ticket'
    public string $bg = 'bg-white/40 text-dark';
    public string $hover = 'hover:bg-white/30';
    public string $border = 'border-2 border-dark border-solid';

    public function render()
    {
        return view('livewire.card-button');
    }
}
