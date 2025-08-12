<?php

namespace App\Livewire;


use Livewire\Component;
use Livewire\Attributes\On;

class ListMovies extends Component
{
    public string $msg = "Lagi Tayang";

    public function sortByStatus()
    {
        $this->msg = $this->msg === 'Lagi Tayang' ? 'Akan Tayang' : 'Lagi Tayang';
    }

    public function render()
    {
        return view('livewire.list-movies', [$this->msg]);
    }
}
