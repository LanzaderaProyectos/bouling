<div>
    <div class="overflow-hidden sm:rounded-lg">
        <div class="p-6 text-gray-900">
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
                <div class="sm:mt-0 sm:ml-16 sm:flex-none">
                    <button wire:click="addNew()" type="button"
                        class="block rounded-md bg-indigo-600 py-1 px-3 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
                        role</button>
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="overflow-hidden overflow-x-auto shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Actions</th>
                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                    Date creation</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Name</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Key value</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Type</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($roles as $role)
                                <tr>

                                    <td>
                                        <div class="flex">
                                            <div class="mx-1">
                                                <x-edit-button wire:click="editOrDelete('{{ $role->id }}', 'edit')">
                                                </x-edit-button>
                                            </div>
                                            <div>
                                                <x-danger-button
                                                    wire:click="editOrDelete('{{ $role->id }}', 'delete')">
                                                </x-danger-button>

                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $role->created_at }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $role->name }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $role->key_value }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $role->type }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-2">
                {{ $roles->links() }}
            </div>
        </div>
        @include('livewire.cruds.roles.partials.form')
    </div>
</div>
