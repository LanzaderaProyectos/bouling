<div>
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
        <div class="flex flex-wrap  -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-name">
                    Name
                </label>
                <input wire:model.defer="brand.name"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-name" type="name" placeholder="Name">
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase -wide text-gray-700 text-xs font-bold mb-2" for="grid-legal-name">
                    Legal name
                </label>
                <input wire:model.defer="brand.legal_name"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-legal-name" type="text" placeholder="Legal name">
            </div>
        </div>
        <div class="flex flex-wrap  -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                    Email
                </label>
                <input wire:model.defer="brand.email"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-email" type="email" placeholder="Email">
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase -wide text-gray-700 text-xs font-bold mb-2" for="grid-phone">
                    Phone number
                </label>
                <input wire:model.defer="brand.phone"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-phone" type="phone" placeholder="Phone number">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-country">
                    Country
                </label>
                <input wire:model.defer="brand.country"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-country" type="text" placeholder="Country">
            </div>
            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                    City
                </label>
                <input wire:model.defer="brand.city"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-city" type="text" placeholder="City">
            </div>
            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                    State
                </label>
                <input wire:model.defer="brand.state"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-state" type="text" placeholder="State">
            </div>
            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-address">
                    Address
                </label>
                <input wire:model.defer="brand.address"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-address" type="text" placeholder="Address">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-2/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    for="grid-postal-code">
                    Postal code
                </label>
                <input wire:model.defer="brand.postal_code"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-postal-code" type="text" placeholder="Postal code">
            </div>
        </div>
        <div
            class="modal-footer flex flex-row-reverse	 flex-shrink-0 flex-wrap items-center justify-between p-4 border-t border-gray-200 rounded-b-md">
            <div>
                <x-primary-button wire:click.prevent="save()" x-data=""
                    x-on:click.prevent="$dispatch('close', 'save')">{{ __('Save') }}
                </x-primary-button>
            </div>
        </div>
    </div>
</div>
@include('partials.delete-confirmation')
