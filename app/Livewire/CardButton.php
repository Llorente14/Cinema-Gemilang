<?php

namespace App\Livewire;

use Livewire\Component;

class CardButton extends Component
{
    public string $href = 'https://youtu.be/hnfF9tgN8OI?si=IlVYG_5Ipds1N2SA';
    public string $text = 'Tombol';
    public string $icon = 'play'; // atau 'ticket'
    public string $bg = 'bg-light text-dark';
    public string $hover = 'hover:opacity-90';
    public string $border = 'border-light/80';
    public string $size = 'text-[0.8vw] w-[10vw] px-[55%] py-[7%]';

    public function render()
    {
        return view('livewire.card-button');
    }
}
