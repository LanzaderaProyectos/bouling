<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (Auth::user()->hasRole('brand'))
                {{ __('Brand boulis') }}
            @elseif(Auth::user()->hasRole('bouliner'))
                {{ __('Available boulis') }}
            @else
                {{ __('Boulis management') }}
            @endif
        </h2>
    </x-slot>
    <x-slot name="slot">
        @livewire('cruds.boulis.bouli')
    </x-slot>
</x-app-layout>
