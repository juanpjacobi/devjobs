<?php

namespace App\Livewire;

use App\Models\Offer;
use App\Notifications\NewCandidate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyOffer extends Component
{
    use WithFileUploads;
    public $cv;
    public $offer;
    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Offer $offer)
    {
        $this->offer = $offer;
    }
    public function apply()
    {
        $data = $this->validate();
        if(auth()->user()->id === $this->offer->recruiter->id) {
            session()->flash('message', 'You cannot apply for an offer that you yourself published');
        }else if($this->offer->candidates()->where('user_id', auth()->user()->id)->count() > 0) {
            session()->flash('message', 'You have already applied for this offer before');
        } else {
            // Postularse y almacenar el CV
            $cv = $this->cv->store('public/cv');
            $data['cv'] = str_replace('public/cv/', '', $cv);

            // Crear el candidato a la vacante
            $this->offer->candidates()->create([
                'user_id' => auth()->user()->id,
                'cv' => $data['cv']
            ]);

            // Crear notificación y enviar el email
            $this->offer->recruiter->notify(new NewCandidate($this->offer->id, $this->offer->title, auth()->user()->id ));

            // Mostrar el usuario un mensaje de ok
            session()->flash('message', 'Your information was sent correctly, good luck');

            return redirect()->back();
        }

    }

    public function render()
    {
        return view('livewire.apply-offer');
    }
}
