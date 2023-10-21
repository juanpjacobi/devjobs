<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($offers as $offer)
            <div class="p-6 text-gray-900 md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <a href="{{route('offers.show', $offer->id)}}" class="text-xl font-bold">
                        {{ $offer->title }}
                    </a>
                    <p class="text-sm text-gray-600 font-bold">{{ $offer->company }}</p>
                    <p class="text-sm text-gray-500 font-bold">Last day to aply: {{ $offer->last_day->format('d/m/y') }}
                    </p>
                </div>
                <div class="flex flex-col items-stretch md:flex-row  gap-3 mt-5 md:mt-0">
                    <a href="{{route('candidates.index', $offer)}}"
                        class="bg-slate-800 text-center py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                        {{$offer->candidates->count()}} applicants
                    </a>
                    <a href="{{ route('offers.edit', $offer->id) }}"
                        class="bg-blue-800 text-center py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                        edit
                    </a>
                    <button
                        wire:click="$dispatch('showAlert', {id: {{ $offer->id}}})"
                        class="bg-red-600 text-center py-2 px-4 rounded-lg text-white text-xs font-bold uppercase">
                        delete
                    </button>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600">No offers to show</p>
        @endforelse
        <div class="mt-10">
            {{ $offers->links() }}
        </div>
    </div>
</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('showAlert', offerId => {

            Swal.fire({
                title: 'Delete offer?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('deleteOffer', {offer: offerId})
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        })
    </script>
@endpush
