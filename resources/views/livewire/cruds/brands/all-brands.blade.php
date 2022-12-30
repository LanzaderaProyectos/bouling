<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <!--begin: Datatable -->
                <div>

                    <div class="block text-center" x-data="{ flash: @entangle('openFlash') }">
                        @if (session()->has('save-message'))
                            <div x-show="flash" x-transition class="p-2 rounded flex justify-between bg-emerald-300">
                                <div>
                                    {{ session('save-message') }}

                                </div>
                                <div>
                                    <button @click="flash = false" type="button" class="close" data-dismiss="alert"
                                        aria-label="Close">
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

                    <div class="flex justify-between">
                        <!-- Actual search box -->
                        <div class="flex items-center">
                            <div id="roles_list_table_filter" class="row py-3">
                                <div class="col-md-4 col-12">
                                    <input wire:model="search"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-role" type="text" placeholder="Search">
                                </div>
                            </div>
                            <div class="ml-2">
                                <x-spinner wire:loading wire:target="search" class="text-center mr-2 mt-2">
                                </x-spinner>
                            </div>
                        </div>

                        @if (Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('brand'))
                            <div id="roles_list_table_filter" class="row py-3">
                                <div class="col-md-4 col-12">
                                    <x-primary-button wire:click="addNew()">{{ __('Add new') }}
                                    </x-primary-button>
                                </div>
                            </div>
                        @endif
                    </div>


                    <div class="overflow-x-auto">
                        <table>
                            <thead>
                                <tr class="text-uppercase">
                                    @if (Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('brand'))
                                        <th style="width: 5%">Actions</th>
                                    @endif
                                    <th style="width: 5%">Date creation</th>
                                    <th style="width: 10%">Name</th>
                                    <th style="width: 10%">Legal name</th>
                                    <th style="width: 15%">Email</th>
                                    <th style="width: 10%">Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        @if (Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('brand'))
                                            <td class="border px-4 py-2">
                                                <div class="flex">
                                                    <div class="mr-1">
                                                        <x-primary-button class="px-2"
                                                            wire:click="editOrDelete('{{ $brand->id }}', 'edit')">
                                                            <x-slot name="slot">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                </svg>
                                                            </x-slot>
                                                        </x-primary-button>
                                                    </div>
                                                    <div>
                                                        <x-danger-button class="px-2"
                                                            wire:click="editOrDelete('{{ $brand->id }}', 'delete')">
                                                            <x-slot name="slot">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                </svg>

                                                            </x-slot>
                                                        </x-danger-button>
                                                    </div>
                                                </div>

                                            </td>
                                        @endif
                                        <td class="border px-4 py-2">{{ $brand->created_at }}</td>
                                        <td class="border px-4 py-2">{{ $brand->name ?? '' }}
                                        </td>
                                        <td class="border px-4 py-2">{{ $brand->legal_name ?? '' }}
                                        </td>
                                        <td class="border px-4 py-2">{{ $brand->email ?? '' }}
                                        </td>
                                        <td class="border px-4 py-2">{{ $brand->phone ?? '' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-2 py-1">
                    {{ $brands->links() }}
                </div>
            </div>
            @include('livewire.cruds.brands.partials.form')
        </div>
    </div>
</div>
