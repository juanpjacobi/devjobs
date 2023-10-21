<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{$offer->title}}
        </h3>
        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Empresa:
                <span class="normal-case font-normal">{{$offer->company}}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Last day to aply:
                <span class="normal-case font-normal">{{$offer->last_day->toFormattedDateString()}}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Category:
                <span class="normal-case font-normal">{{$offer->category->category}}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Payment:
                <span class="normal-case font-normal">{{$offer->payment->payment}}</span>
            </p>
        </div>
    </div>
    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{asset('storage/offers/' . $offer->image)}}" alt="{{'Offer image ' . $offer->title}}">
        </div>
        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">Offer description</h2>
            <p>{{$offer->description}}</p>
        </div>
    </div>
    @guest

    <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
        <p>
            Do you want to apply for this offer?
            <a class="font-bold text-indigo-600" href="{{route('register')}}">
                Get an account and apply to this and other offers
            </a>
        </p>
    </div>
    @endguest
    @cannot('create', App\Models\Offer::class)
        <livewire:apply-offer :offer="$offer"/>
    @endcannot

</div>
