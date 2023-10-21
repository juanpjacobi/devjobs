<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
   <h3 class="text-center text-2xl font-bold my-4">Apply to this offer</h3>
   @if (session()->has('message'))
   <p  class="uppercase border-green-600 bg-green-100
    text-green-600 font-bold p-2 my-3 text-sm rounded-lg"
    >
       {{session('message')}}
</p>
@else
<form wire:submit.prevent='apply' action="" class="w-96 mt-5">
     <div class="mb-4">
         <x-input-label for="cv" :value="__('Curriculum vitae')"/>
         <x-text-input id="cv" type="file" wire:model="cv" accept=".pdf" class="block mt-1 w-full"/>
     </div>
     @error('cv')
     <livewire:show-alert :message="$message"/>
     @enderror
     <x-primary-button class="my-5">
         Apply
     </x-primary-button>

</form>

@endif
</div>
