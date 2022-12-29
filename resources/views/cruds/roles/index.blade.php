<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles management') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        @livewire('cruds.roles.role')
    </x-slot>
</x-app-layout>
