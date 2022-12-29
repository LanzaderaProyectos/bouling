<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Brands management') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        @livewire('cruds.brands.brand')
    </x-slot>
</x-app-layout>
