<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Offer::class);
        return view('offers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Offer::class);
        return view('offers.create');
    }


    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        return view('offers.show', [
            'offer' => $offer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        $this->authorize('update', $offer);
        return view('offers.edit', [
            'offer' => $offer
        ]);
    }

}
