<form class="md:w-1/2 space-y-5" wire:submit.prevent='createOffer'>
    <div>
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" wire:model="title" :value="old('title')"
            placeholder="Offer Title" />
        @error('title')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>
    <div>
        <x-input-label for="payment" :value="__('Monthly payment')" />
        <select wire:model="payment" id="payment"
            class="w-full text-gray-600 font-bold border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option value="">Select a monthly payment --</option>
            @foreach ($payments as $payment)
                <option value="{{ $payment->id }}">{{ $payment->payment }}</option>
            @endforeach
        </select>
        @error('payment')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>
    <div>
        <x-input-label for="category" :value="__('Category')" />
        <select wire:model="category" id="category"
            class="w-full text-gray-600 font-bold border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option value="">Select a category --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>
        @error('category')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>
    <div>
        <x-input-label for="company" :value="__('Company')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" wire:model="company" :value="old('company')"
            placeholder="Company ej. Netflix, Uber, Shopify" />
        @error('company')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>
    <div>
        <x-input-label for="last_day" :value="__('Last day to aply')" />
        <x-text-input id="last_day" class="block mt-1 w-full text-gray-700" type="date" wire:model="last_day"
            :value="old('last_day')" />
        @error('last_day')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>
    <div>
        <x-input-label for="description" :value="__('Job description')" />
        <textarea
            class="w-full h-72 text-gray-600 font-bold border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            wire:model="description" id="description" placeholder="Job description">
            </textarea>
        @error('description')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>
    <div>
        <x-input-label for="image" :value="__('Image')" />
        <x-text-input id="image" accept="image/*" class="block mt-1 w-full text-gray-600" type="file" wire:model="image" />
        <div class="my-5 w-80">
            @if ($image)
                Image:
                <img src="{{$image->temporaryUrl()}}" alt="">
            @endif
        </div>
        @error('image')
            <livewire:show-alert :message="$message"/>
        @enderror
    </div>
    <x-primary-button>
        Create offer
    </x-primary-button>
</form>
