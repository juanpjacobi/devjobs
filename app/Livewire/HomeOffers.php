<?php

namespace App\Livewire;

use App\Models\Offer;
use Livewire\Component;

class HomeOffers extends Component
{
    public $term;
    public $category;
    public $payment;
    protected $listeners = ['searchTerms' => 'search'];
    public function search($term, $category, $payment)
    {
        $this->term = $term;
        $this->category = $category;
        $this->payment = $payment;
    }
    public function render()
    {
        // $offers = Offer::all();
        $offers = Offer::when($this->term, function($query){
            $query->where('title', 'LIKE', "%" . $this->term . "%");
        })
        ->when($this->category, function($query){
            $query->where('category_id', $this->category);
        })
        ->when($this->payment, function($query){
            $query->where('payment_id', $this->payment);
        })
        ->paginate(20);
        return view('livewire.home-offers',[
            'offers' => $offers
        ]);
    }
}
