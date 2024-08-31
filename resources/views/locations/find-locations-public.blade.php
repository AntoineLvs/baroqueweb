@extends('layouts.app')

@section('body')

<div class="bg-white">
    <style>
        body {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }
    </style>

    <div x-data="{ open: false }">
        <header class="inset-x-0 top-0 z-50 bg-gray-800"  style="z-index: 5; position: absolute;">
            <nav class="flex items-center justify-between p-2 md:p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="{{ URL::route('home') }}" class="-m-1.5 p-1.5">
                        <span class="sr-only">refuelOS</span>
                        <img class="h-10 md:h-16 w-auto" src="{{ asset('assets/img/refuelos_white.png') }}" alt="Logo" />
                    </a>

                </div>
                <div class="flex lg:hidden">
                    <button @click="open = true" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-400">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>

                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="{{route('product-finder.index-public')}}" class="text-m font-semibold leading-6 text-white hover:underline">Product Finder</a>
                    <a href="#" class="text-m font-semibold leading-6 text-white hover:underline">FAQ</a>
                    <a href="#" class="text-m font-semibold leading-6 text-white">Was ist XTL?</a>
                    <a href="#" class="text-m font-semibold leading-6 text-white">Partner werden</a>
                    <a href="{{route('locations.find-locations-public')}}" class="text-m font-semibold leading-6 text-white">HVO Map</a>


                </div>


                <div class="hidden lg:flex lg:flex-1 lg:justify-end">

                    @if (Route::has('login'))
                    @auth
                    <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="mr-4 font-bold text-red-500 hover:text-indigo-500 transition duration-150 ease-in-out">
                        Log out
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <a href="{{ route('dashboard') }}" class="text-sm font-semibold leading-6 text-white">Dashboard</a>

                    @else
                    {{-- @if (Route::has('register'))
                              <a href="{{ route('register') }}" class="pl-4 text-sm font-semibold leading-6 text-white">Register</a>
                    @endif--}}

                    <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-white">Log in <span aria-hidden="true">&rarr;</span></a>
                    @endauth
                    @endif


                </div>
            </nav>


            <!-- Mobile menu, show/hide based on menu open state. -->
            <div x-show="open" x-cloak @click.away="open = false" x-transition:enter="duration-0 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-0 ease-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                <div class="lg:hidden" role="dialog" aria-modal="true">
                    <!-- Background backdrop, show/hide based on slide-over state. -->
                    <div class="fixed inset-0 z-50"></div>
                    <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                        <div class="flex items-center justify-between">
                            <a href="#" class="-m-1.5 p-1.5">
                                <span class="sr-only">Your Company</span>
                                <img class="h-14 w-auto" src="{{ asset('assets/img/refuelos_dark.png') }}" alt="Logo" />
                                <button @click="open = false" aria-label="Main menu" aria-haspopup="true" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                                    <span class="sr-only">Close menu</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                        </div>
                        <div class="mt-6 flow-root">
                            <div class="-my-6 divide-y divide-gray-500/10">
                                <div class="space-y-2 py-6">
                                    <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-100">Product</a>
                                    <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-100">Features</a>
                                    <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-100">Marketplace</a>
                                    <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-100">Company</a>
                                </div>
                                <div class="py-6">
                                    <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log
                                        in</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <main>
        @livewire('locations.find-locations-test-mapbox')
    </main>
</div>

@endsection