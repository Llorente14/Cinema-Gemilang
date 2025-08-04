<?php

namespace App\Livewire;

use Livewire\Component;

class Jumbotron extends Component
{

    public string $headingInfo = "Tonton Koleksi 26 Sekarang";
    public string $subtitleInfo = " Detektif remaja, Conan, yang berubah menjadi bocah laki-laki karena ramuan jahat, membantu
                    memecahkan
                    kejahatan membingungkan sembari melacak para agen yang meracuninya.";
    public function render()
    {
        return view('livewire.jumbotron');
    }
}
