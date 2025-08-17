<?php

namespace App\Livewire;

use Livewire\Component;

class InfoMovie extends Component
{
    public string $class = '';
    public string $age = '';
    public string $duration = '';
    public string $size;
    public string $positionItem;
    public string $position;

    public function mount()
    {
        switch ($this->position) {
            case 'start':
                $this->position = 'justify-start';
                break;
            case 'center':
            default:
                $this->position = 'justify-center';
                break;
        }
        switch ($this->size) {
            case 'sm':
                $this->size = 'px-[0.2vw]';
                break;
            case 'md':
            default:
                $this->size = 'px-[0.2vw] py-[0.25vw]';
                break;
        }
    }
    public function render()
    {
        return view('livewire.info-movie');
    }
}
