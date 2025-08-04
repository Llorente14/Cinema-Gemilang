<?php

namespace App\Livewire\Components;

use Livewire\Component;

class SecondaryButton extends Component
{
    public string $href = '/movies';
    public bool $openInNewTab = false; // 'true', 'false'
    public string $text = 'Tombol';
    public string $icon = 'play'; // 'play', 'question', 'arrow-r', 'arrow-l', none
    public string $positionIcon = 'left'; //position icon 'right', 'left'


    public string $style = 'light'; // 'light', 'dark', 'info'.
    public string $hover; // 'light', 'dark', 'info', 'none'.
    public string $size = 'md';     // 'sm', 'md', 'lg'

    public string $newTabTarget; // '_self', '_blank'
    public string $styleBtn; // Gabungan bg + text color + border 
    public string $hoverBtn; // hover
    public string $sizeBtn;  // Gabungan padding + text size
    public string $sizeIcon;  // Gabungan padding + text size


    public function mount()
    {
        $this->hover = $this->style;
        // Handle style
        switch ($this->style) {
            case 'dark':
                $this->styleBtn = 'bg-dark text-white/90 border border-white/20 ';

                break;
            case 'cta':
                $this->styleBtn = 'bg-primary/30 text-white/90 border border-primary';
                break;
            case 'none':

                break;
            case 'light':
            default:
                $this->styleBtn = 'bg-white/40 text-dark border-2 border-dark border-solid ';
                break;
        }

        //Handle hover
        switch ($this->hover) {
            case 'dark':
                $this->hoverBtn = 'hover:bg-dark/80';
                break;
            case 'cta':
                $this->hoverBtn = 'hover:bg-primary/90';
                break;
            case 'none':
                $this->hoverBtn = '';
                break;
            case 'light':
            default:
                $this->hoverBtn = 'hover:bg-white/30';
                break;
        }

        // Handle size
        switch ($this->size) {
            case 'sm':
                $this->sizeBtn = 'text-[0.8vw] px-[1vw] py-[0.4vw]';
                $this->sizeIcon = 'size-[0.8vw]';
                break;
            case 'lg':
                $this->sizeBtn = 'text-[1.1vw]  px-[2.5vw] py-[1.75vw]';
                break;
            case 'md':
            default:
                $this->sizeBtn = 'text-[1vw] px-[1.2vw] py-[0.6vw]';
                $this->sizeIcon = 'size-[1vw]';
                break;
        }

        // Handle position icon
        switch ($this->positionIcon) {
            case 'right':
                $this->positionIcon = 'flex-row-reverse';
                break;
            case 'left':
            default:
                $this->positionIcon = '';
                break;
        }

        //Handle Open New Tab
        $this->newTabTarget = $this->openInNewTab ? '_blank' : '_self';
    }

    public function render()
    {
        return view('livewire.components.secondary-button');
    }
}
