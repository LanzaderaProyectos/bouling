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
                        <div class="flex flex-wrap  -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-name">
                                    Name
                                </label>
                                <input wire:model.defer="bouli.name"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-name" type="name" placeholder="Name">
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase -wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-phone">
                                    Key value
                                </label>
                                <input wire:model.defer="bouli.key_value"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-phone" type="phone" placeholder="Phone number">
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-description">
                                    Description
                                </label>
                                <input wire:model.defer="bouli.description"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-description" type="text" placeholder="Description">
                            </div>

                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-requirement">
                                    Requirement
                                </label>
                                <input wire:model.defer="bouli.requirement"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-requirement" type="text" placeholder="Requirement">
                            </div>

                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-reward">
                                    Reward
                                </label>
                                <input wire:model.defer="bouli.reward"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-reward" type="text" placeholder="Reward">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-brands">
                                    Condition
                                </label>
                                <div class="relative">
                                    <select wire:model="condition"
                                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-brands">
                                        <option value="">Select a condition</option>
                                        <option value="0">Free admision</option>
                                        <option value="1">Has to be accepted</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-date_start">
                                    Date start
                                </label>
                                <input wire:model.defer="bouli.date_start"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-date_start" type="date" placeholder="Date start">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-date_finish">
                                    Date finish
                                </label>
                                <input wire:model.defer="bouli.date_finish"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-date_finish" type="date" placeholder="Date finish">
                            </div>
                        </div>
                        @if (!$new && $search == '')
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-brands">
                                        Social network
                                    </label>
                                    <div
                                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                        {{ $bouli->social_network }}
                                    </div>
                                </div>

                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-brands">
                                        Brand bouli
                                    </label>
                                    <div
                                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                        {{ $bouli->brand->legal_name }}
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="block">

                            <div class="uppercase bold mb-1">
                                <h2>Change options</h2>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">

                                <div class="w-full flex justify-around md:w-1/2 px-3">
                                    <div>
                                        <label class="block uppercase -wide text-gray-700 text-xs font-bold mb-2"
                                            for="grid-social-network-instagram">
                                            Instagram
                                        </label>
                                        <input id="grid-social-network-instagram" name="social_network"
                                            wire:model="social_network" value="instagram" type="radio">
                                    </div>
                                    <div class="">
                                        <label class="block uppercase -wide text-gray-700 text-xs font-bold mb-2"
                                            for="grid-social-network-instagram">
                                            TikTok
                                        </label>
                                        <input id="grid-social-network-tiktok" name="social_network"
                                            wire:model="social_network" value="tiktok" type="radio">
                                    </div>
                                    <div>
                                        <label class="block uppercase -wide text-gray-700 text-xs font-bold mb-2"
                                            for="grid-social-network-tiktok">
                                            Facebook
                                        </label>
                                        <input id="grid-social-network-facebook" name="social_network"
                                            wire:model="social_network" value="facebook" type="radio">
                                    </div>

                                </div>

                                @if (Auth::user()->hasRole('super_admin'))
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="grid-brands">
                                            Brand bouli
                                        </label>
                                        <div class="relative">
                                            <select wire:model="brandId"
                                                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="grid-brands">
                                                <option value="">Select brand</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->legal_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif

                            </div>

                        </div>

                        <div
                            class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-between p-4 border-t border-gray-200 rounded-b-md">
                            <div>
                                <x-secondary-button wire:click="resetInputs()"
                                    x-on:click.prevent="$dispatch('close', 'save')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                            </div>

                            <div>
                                <x-primary-button wire:click.prevent="save()" x-data=""
                                    x-on:click.prevent="$dispatch('close', 'save')">{{ __('Save') }}
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
