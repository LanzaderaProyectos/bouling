<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bouliners management') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        @livewire('cruds.users.user')
    </x-slot>
</x-app-layout>
