<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/spinner.css', 'resources/js/app.js'])
    @livewireStyles

</head>

<body class="h-full">
    <div x-data="{ menuMobile: false }">
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        @include('layouts.sidebars.mobiles.mobile')

        <!-- Static sidebar for desktop -->
        @include('layouts.sidebars.desktops.desktop')
        <div class="flex flex-col md:pl-64">
            <div class="sticky top-0 z-10 flex h-16 flex-shrink-0 bg-white shadow">
                <button @click="menuMobile = !menuMobile " type="button"
                    class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                    </svg>
                </button>
                <div class="flex flex-1 justify-between px-4">
                    <div class="flex flex-1 mt-5">
                        <h1 class="text-2xl font-semibold text-gray-900">{{ $header }}</h1>
                    </div>
                </div>
                <div class="ml-4 flex items-center md:ml-6 mr-8">
                    <!-- Profile dropdown -->
                    <div x-data="{ profileDropdown: false }" class="relative ml-3">
                        <div>
                            <button @click="profileDropdown = ! profileDropdown" type="button"
                                class="flex max-w-xs items-center rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="">
                            </button>
                        </div>
                        <div x-show="profileDropdown" @click.outside="profileDropdown = false" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-out duration-100"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1">
                            <a href="{{ route('profile') }}"  class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                tabindex="-1" id="user-menu-item-0">Your Profile</a>

                            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700"
                                role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>
            <main class="flex-1">
                <div class="py-6">
                    <div class="mx-auto max-w-full px-4 sm:px-6 md:px-8">
                        <h1 class="text-2xl font-semibold text-gray-900">{{ $header }}</h1>
                    </div>
                    <div class="mx-auto max-w-full px-4 sm:px-6 md:px-8">
                        <!-- Replace with your content -->
                        <div>
                            <div class="bg-white rounded-lg border-4 border-gray-200">
                                {{ $slot }}
                            </div>
                        </div>
                        <!-- /End replace -->
                    </div>
                </div>
            </main>
        </div>
    </div>
    @livewireScripts
</body>

</html>
