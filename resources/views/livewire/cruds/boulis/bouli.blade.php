<div>
    <div class="p-6 text-gray-900">
        <div class="block text-center" x-data="{ flash: @entangle('openFlash') }">
            @if (session()->has('save-message'))
                <div x-show="flash" x-transition class="p-2 rounded flex justify-between bg-emerald-300">
                    <div>
                        {{ session('save-message') }}

                    </div>
                    <div>
                        <button @click="flash = false" type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                </div>
            @endif
            @if (session()->has('delete-message'))
                <div x-show="flash" x-transition class="p-2 rounded flex justify-between bg-red-400">
                    <div>
                        {{ session('delete-message') }}
                    </div>
                    <div>
                        <button @click="flash = false" type="button" class="close" data-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
        </div>
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <div id="roles_list_table_filter" class="flex py-3">
                    <div class="col-md-4 col-12">
                        <input type="text" wire:model="search"
                            class="block w-full rounded-md border-1 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            placeholder="Search">

                    </div>
                    <div class="ml-2">
                        <x-spinner wire:loading wire:target="search" class="text-center mr-2 mt-2">
                        </x-spinner>
                    </div>
                </div>

            </div>
            @if (Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('brand'))
                <div class="sm:mt-0 sm:ml-16 sm:flex-none">
                    <button type="button"
                        class="block rounded-md bg-indigo-600 py-1 px-3 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <a href="{{ route('bouli.edit-or-create', ['new', $brand]) }}">Add bouli</a>
                    </button>
                </div>
            @endif
        </div>
        <div class="mt-8 flow-root">
            <div class="overflow-hidden overflow-x-auto shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr>
                            @if (Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('brand'))
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Actions</th>
                            @endif
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Name
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                Requirement</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Reward
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Social
                                network</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Brand
                            </th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Date
                                start</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Date
                                finish</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach ($boulis as $bouli)
                            <tr>
                                @if (Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('brand'))
                                    <td>
                                        <div class="flex">
                                            <div class="mx-1">
                                                <a href="{{ route('bouli.edit-or-create', [$bouli, $brand]) }}">
                                                    <x-edit-button
                                                        wire:click="editOrDelete('{{ $bouli->id }}', 'edit')">
                                                    </x-edit-button>
                                                </a>
                                            </div>
                                            <div>
                                                <x-danger-button
                                                    wire:click="editOrDelete('{{ $bouli->id }}', 'delete')">
                                                </x-danger-button>
                                            </div>
                                        </div>
                                    </td>
                                @endif
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $bouli->name ?? '' }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $bouli->requirement ?? '' }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $bouli->reward ?? '' }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $bouli->social_network ?? '' }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $bouli->brand->legal_name ?? '' }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $bouli->date_start ?? '' }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $bouli->date_finish ?? '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-2 py-1">
            {{ $boulis->links() }}
        </div>
    </div>
    @include('partials.delete-confirmation')
</div>
{{-- @include('livewire.cruds.boulis.partials.form') --}}
