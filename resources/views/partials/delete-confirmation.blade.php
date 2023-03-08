<div x-data="{ showDeleteModal: @entangle('showDeleteModal') }">
    <div x-show="showDeleteModal" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div x-show="showDeleteModal" x-transition:enter="ease-out duration-250" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-250"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div x-show="showDeleteModal" @click.outside="showDeleteModal = false" x-transition:enter="ease-out duration-100"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-100"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="modal-dialog modal-dialog-centered modal-dialog-scrollable relative w-auto pointer-events-none">
                    {{-- <div class="modal-content p-5 border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">


                    </div> --}}
                    <div
                        class="modal-content p-5 border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                        <!--body-->
                        <div class="text-center p-5 flex-auto justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 -m-1 flex items-center text-red-500 mx-auto" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-16 h-16 flex items-center text-red-500 mx-auto" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            <h2 class="text-xl font-bold py-4 ">Are you sure?</h3>
                                <p class="text-sm text-gray-500 px-8">Do you really want to delete your item?
                                    This process cannot be undone</p>
                        </div>
                        <!--footer-->
                        <div class="p-3  mt-2 text-center space-x-4 md:block">
                            <x-secondary-button wire:click="resetInputs()">
                                <x-slot name="slot">
                                    {{ __('Cancel') }}
                                </x-slot>
                            </x-secondary-button>
                            <x-confirm-delete wire:click="delete()"
                                class="px-2">
                                <x-slot name="slot">
                                    {{ __('Confirm') }}
                                </x-slot>
                            </x-confirm-delete>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
