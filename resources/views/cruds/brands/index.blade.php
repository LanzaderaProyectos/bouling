<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (Auth::user()->hasRole('brand'))
                {{ __('My brand') }}
            @else
                {{ __('Brands management') }}
            @endif
        </h2>
    </x-slot>
    <x-slot name="slot">
        @livewire('cruds.brands.brand')
    </x-slot>
</x-app-layout>
