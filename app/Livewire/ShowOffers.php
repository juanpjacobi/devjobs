<?php

namespace App\Livewire;

use App\Models\Offer;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ShowOffers extends Component
{
    protected $listeners = ['deleteOffer'];


    public function deleteOffer( Offer $offer )
    {

        if( $offer->imagen ) {
            Storage::delete('public/offers/' . $offer->imagen);
        }
        // if( $offer->candidatos->count() ) {
        //     foreach( $offer->candidatos as $candidato ) {
        //         if( $candidato->cv ) {
        //             Storage::delete('public/cv/' . $candidato->cv);
        //         }
        //     }
        // }
        $offer->delete();

    }
    public function render()
    {
        $offers = Offer::where('user_id', auth()->user()->id)->paginate(10);
        return view('livewire.show-offers', [
            'offers' => $offers
        ]);
    }
}
