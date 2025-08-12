<?php

namespace App\Livewire\Components;

use Livewire\Component;

class BreadCrumbs extends Component
{
    public array $breadcrumbs = [];

    // Mapping untuk custom label
    protected array $segmentMap = [
        'movies' => 'Film',
        'myorder' => 'Order Saya',
    ];

    public function mount()
    {
        //Bagi Url menjadi beberapa bagian
        $segments = request()->segments();
        $url = '';

        foreach ($segments as $segment) {
            $url .= '/' . $segment;

            // Pakai custom label kalau ada di mapping
            $label = $this->segmentMap[$segment] ?? ucfirst(str_replace('-', ' ', $segment));

            $this->breadcrumbs[] = [
                'title' => $label,
                'url'   => url($url),
            ];
        }
    }


    public function render()
    {
        return view('livewire.components.bread-crumbs');
    }
}
