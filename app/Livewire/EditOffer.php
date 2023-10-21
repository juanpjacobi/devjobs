<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Payment;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class EditOffer extends Component
{
    public $offer_id;
    public $title;
    public $payment;
    public $category;
    public $company;
    public $last_day;
    public $description;
    public $image;
    public $new_image;
    public $user_id;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'payment' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'new_image' => 'nullable|image|max:2048',

    ];

    public function mount(Offer $offer)
    {
        $this->offer_id = $offer->id;
        $this->title = $offer->title;
        $this->payment = $offer->payment_id;
        $this->category = $offer->category_id;
        $this->company = $offer->company;
        $this->last_day = Carbon::parse($offer->last_day)->format('Y-m-d');
        $this->description = $offer->description;
        $this->image = $offer->image;
        $this->user_id = $offer->user_id;
    }

    public function editOffer()
    {
        $data = $this->validate();

        if ($this->new_image) {
            $image = $this->new_image->store('public/offers');
            $data['image'] = str_replace('public/offers/', '', $image);
        }

        $offer = Offer::find($this->offer_id);

        $offer->title = $data['title'];
        $offer->payment_id = $data['payment'];
        $offer->category_id = $data['category'];
        $offer->company = $data['company'];
        $offer->last_day = $data['last_day'];
        $offer->description = $data['description'];
        $offer->image = $data['image'] ?? $offer->image;

        $offer->save();
        session()->flash('message', 'Offer updated');
        return redirect()->route('offers.index');

    }
    public function render()
    {
        $payments = Payment::all();
        $categories = Category::all();
        return view('livewire.edit-offer', [
            'payments' => $payments,
            'categories' => $categories
        ]);
    }
}
