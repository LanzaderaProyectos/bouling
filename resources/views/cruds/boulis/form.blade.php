<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if ($bouli)
                {{ __('Edit bouli') }}
            @else
                {{ __('Create bouli') }}
            @endif
        </h2>
    </x-slot>
    <x-slot name="slot">
        @livewire('cruds.boulis.bouli-form', [
            'bouli' => $bouli,
            'brand' => $brand
        ])
    </x-slot>
</x-app-layout>
