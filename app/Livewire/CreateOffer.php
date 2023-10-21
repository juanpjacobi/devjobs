<?php

namespace App\Livewire;

use App\Models\Payment;
use Livewire\Component;
use App\Models\Category;
use App\Models\Offer;
use Livewire\WithFileUploads;

class CreateOffer extends Component
{
    public $title;
    public $payment;
    public $category;
    public $company;
    public $last_day;
    public $description;
    public $image;

    use WithFileUploads;


    protected $rules = [
        'title' => 'required|string',
        'payment' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'image' => 'required|image|max:2048',

    ];
    public function createOffer()
    {
        $data = $this->validate();

        $image = $this->image->store('public/offers');
        $data['image'] = str_replace('public/offers/', '', $image);


        Offer::create([
            'title'=> $data['title'] ,
            'payment_id'=> $data['payment'] ,
            'category_id'=> $data['category'] ,
            'company'=> $data['company'] ,
            'last_day'=> $data['last_day'] ,
            'description'=> $data['description'] ,
            'image'=> $data['image'] ,
            'user_id' => auth()->user()->id,
        ]);

        session()->flash('message', 'The offer was published correctly');

        return redirect()->route('offers.index');

    }
    public function render()
    {
        $payments = Payment::all();
        $categories = Category::all();
        return view('livewire.create-offer', [
            'payments' => $payments,
            'categories' => $categories
        ]);
    }
}
