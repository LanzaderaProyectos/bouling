<div x-data="{ showSaveModal: @entangle('showSaveModal') }">
    <div x-show="showSaveModal" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div x-show="showSaveModal" x-transition:enter="ease-out duration-250" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-250"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div x-show="showSaveModal" @click.outside="showSaveModal = false"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                    <div
                        class="modal-content p-5 border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                        <div x-data="{ flash: @entangle('openFlash') }">
                            @if (session()->has('password-error'))
                                <div x-show="flash" x-transition class="p-2 rounded flex justify-between bg-red-400">
                                    <div>
                                        {{ session('password-error') }}
                                    </div>
                                    <div>
                                        <button @click="flash = false" type="button" class="close"
                                            data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-name">
                                    Name
                                </label>
                                <input wire:model.defer="user.name"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-name" type="text" placeholder="Name">
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-phone">
                                    Phone
                                </label>
                                <input wire:model.defer="user.phone"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-phone" type="text" placeholder="Phone">
                            </div>

                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-email">
                                    Email
                                </label>
                                <input wire:model.defer="user.email"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-email" type="email" placeholder="Email">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-roles">
                                    Roles
                                </label>
                                <div class="relative">
                                    <select wire:model="roleId" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-roles">
                                        <option value="">Select a role</option>
                                        @foreach ($this->roles as $role)
                                        <option value="{{$role->id}}">{{$role->key_value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap  -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-email">
                                    Password
                                </label>
                                <input wire:model.defer="password"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-email" type="password" placeholder="*******">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-confirm-password">
                                    Confirm password
                                </label>
                                <input wire:model.defer="confirmPassword"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-confirm-password" type="password" placeholder="*******">
                            </div>
                        </div>
                        <div
                            class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-between p-4 border-t border-gray-200 rounded-b-md">
                            <div>
                                <x-secondary-button wire:click="resetInputs()">
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                            </div>

                            <div>
                                <x-primary-button wire:click.prevent="save()">{{ __('Save') }}
                                </x-primary-button>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.delete-confirmation')
