<?php

namespace App\Livewire\Component;

use Livewire\Component;

class NavLink extends Component
{
    public string $href;
    public string $label;
    public bool $active = false;

    public function mount(string $href, string $label)
    {
        $this->href = $href;
        $this->label = $label;
        $this->active = request()->is(trim($this->href, '/')) || request()->is(trim($this->href, '/') . '/*');
    }



    public function render()
    {
        return view('livewire.component.nav-link');
    }
}
