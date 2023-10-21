<div>
    <livewire:filter-offer />
   <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-700 mb-12">Avaible offers</h3>
            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                @forelse ($offers as $offer)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a class="text-3xl font-extrabold text-gray-600" href="{{route('offers.show', $offer->id)}}">
                                {{ucfirst(trans($offer->title))}}
                            </a>
                            <p class="text-base text-gray-600 mb-1">{{$offer->company}}</p>
                            <p class="text-xs font-bold text-gray-600 mb-1">{{$offer->category->category}}</p>
                            <p class="text-base text-gray-600 mb-1">{{$offer->payment->payment}}</p>
                            <p class="font-bold text-xs text-gray-600">
                                Last day to apply:
                                <span class="font-normal">{{$offer->last_day->format('Y-m-d')}}</span>
                            </p>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a class="bg-indigo-500 p-3 text-sm uppercase font-bold text-white rounded-lg block text-center" href="{{route('offers.show', $offer->id)}}">
                                See offer
                            </a>
                        </div>

                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">
                        there are no offers yet
                    </p>
                @endforelse
            </div>
        </div>
   </div>
</div>
