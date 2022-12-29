<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Boulis management') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        @livewire('cruds.boulis.bouli')
    </x-slot>
</x-app-layout>
