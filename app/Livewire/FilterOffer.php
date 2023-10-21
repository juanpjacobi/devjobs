<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Payment;
use Livewire\Component;

class FilterOffer extends Component
{
    public $term;
    public $category;
    public $payment;

    public function readFormData()
    {
        $this->dispatch('searchTerms', $this->term, $this->category, $this->payment);
    }
    public function render()
    {
        $payments = Payment::all();
        $categories = Category::all();
        return view('livewire.filter-offer',[
            "payments" => $payments,
            "categories" => $categories
        ]);
    }
}
