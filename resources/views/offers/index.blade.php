<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My offers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('message'))
                <div x-data="{show: true}" class="uppercase border-green-600 bg-green-100
                 text-green-600 font-bold p-2 my-3"
                 x-init="setTimeout(() => show = false, 3000)" x-show="show">
                    {{session('message')}}
                </div>
            @endif
                <livewire:show-offers />
        </div>
    </div>
</x-app-layout>
