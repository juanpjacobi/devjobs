<?php

namespace App\Livewire;

use Livewire\Component;

class ShowOffer extends Component
{
    public $offer;
    public function render()
    {
        return view('livewire.show-offer');
    }
}
