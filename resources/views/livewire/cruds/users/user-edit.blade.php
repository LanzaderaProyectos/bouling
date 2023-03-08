<div style="background-color: #F3F4F6 !important ">
    <div
        class="modal-content p-5 border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
        <div class="flex flex-wrap justify-center -mx-3 mb-6 text-center" x-data="{ flash: @entangle('openFlash') }">
            @if (session()->has('error-message'))
                <div x-show="flash" x-transition
                    class="w-full md:w-2/2 px-3 mb-6 md:mb-0 rounded flex justify-between  bg-red-400">
                    <div>
                        {{ session('error-message') }}
                    </div>
                    <div>
                        <button @click="flash = false" type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                </div>
            @endif
            @if (session()->has('save-message'))
                <div x-show="flash" x-transition
                    class="w-full md:w-2/2 px-3 mb-6 md:mb-0 rounded flex justify-between bg-emerald-300">
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
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-name">
                    Name
                </label>
                <input wire:model.defer="user.name"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-name" type="text" placeholder="Name">
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-phone">
                    Phone
                </label>
                <input wire:model.lazy="user.phone"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-phone" type="text" placeholder="Phone">
            </div>

        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                    Email
                </label>
                <input wire:model.defer="user.email"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-email" type="email" placeholder="Email">
            </div>
        </div>

        <div
            class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-between p-4 border-t border-gray-200 rounded-b-md">
            <div>
                <x-confirm-delete wire:click="openDeleteModal()">
                    {{ __('Delete') }}
                </x-confirm-delete>
            </div>

            <div>
                <x-primary-button wire:click="save()">{{ __('Save') }}
                </x-primary-button>
            </div>



        </div>
        @include('partials.delete-confirmation')

    </div>

    <div
        class="modal-content mt-3 p-5 border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
        <div class="flex flex-col flex-column justify-center -mx-3 mb-6 text-center">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-2/2 p-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                        Current password
                    </label>
                    <input wire:model.defer="currentPassword"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-email" type="password" placeholder="*******">
                </div>
                <div class="w-full md:w-2/2 p-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                        New password
                    </label>
                    <input wire:model.defer="changePassword"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-email" type="password" placeholder="*******">
                </div>
                <div class="w-full md:w-2/2 p-3 mb-6 md:mb-0">
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
                class="modal-footer text-center flex flex-wrap flex-shrink-0 flex-wrap items-center justify-center p-4 border-t border-gray-200 rounded-b-md">
                <div>
                    <x-warning-button wire:click="changePassword()">{{ __('Change password') }}
                    </x-warning-button>
                </div>



            </div>
            {{-- @include('partials.delete-confirmation') --}}

        </div>
    </div>
