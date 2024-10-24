<div x-data="{ open: false }" >
    <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
        <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start">
            <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                <div class="flex items-center justify-between w-full md:w-auto">
                    <a href="{{ route('home') }}" aria-label="Home">
                        <img class="h-12 w-auto sm:h-12" src="{{ asset('assets/img/xtl-1.png') }}" alt="Logo"/>
                    </a>

                    <div class="mr-2 flex items-center md:hidden">
                        <button
                            @click="open = true"
                            type="button"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                                id="main-menu" aria-label="Main menu" aria-haspopup="true">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="hidden md:block md:ml-10 md:pr-4">
                <a href="{{ route('check') }}" class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">Freigabe-Check
                </a>
                <a href="#"
                   class="ml-4 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">Was ist XtL?
                </a>
                <a href="#"
                   class="ml-4 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">FAQ
                </a>



                @if (Route::has('login'))

                    @auth
                        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="ml-4 font-medium text-red-800 hover:text-indigo-500 transition duration-150 ease-in-out">
                            Log out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <a href="{{ route('dashboard') }}" class="ml-4 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">Dashboard</a>

                    @else
                        <a href="{{ route('login') }}" class="ml-4 font-medium text-base font-medium hover:text-gray-300">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-8 font-medium text-base font-medium hover:text-gray-300">Register</a>
                        @endif
                    @endauth
                @endif


            </div>
        </nav>
    </div>

    <!--
      Mobile menu, show/hide based on menu open state.

      Entering: "duration-150 ease-out"
        From: "opacity-0 scale-95"
        To: "opacity-100 scale-100"
      Leaving: "duration-100 ease-in"
        From: "opacity-100 scale-100"
        To: "opacity-0 scale-95"
    -->
    <div
        x-show="open"
        x-cloak
        @click.away="open = false"
        x-transition:enter="duration-150 ease-out"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="duration-100 ease-in"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
        <div class="rounded-lg shadow-md">
            <div class="rounded-lg bg-white shadow-xs overflow-hidden" role="menu" aria-orientation="vertical"
                 aria-labelledby="main-menu">
                <div class="px-5 pt-4 flex items-center justify-between">
                    <div>
                        <img class="h-8 w-auto"  src="{{ asset('assets/img/xtl-1.png') }}" alt=""/>
                    </div>
                    <div class="-mr-2">
                        <button
                            @click="open = false"
                            type="button"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                                aria-label="Close menu">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="px-2 pt-2 pb-3">
                    <a href="#"
                       class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out"
                       role="menuitem">Product
                    </a>
                    <a href="#"
                       class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out"
                       role="menuitem">Features
                    </a>
                    <a href="#"
                       class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out"
                       role="menuitem">Marketplace
                    </a>
                    <a href="#"
                       class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out"
                       role="menuitem">Company
                    </a>
                </div>
                <div>
                    <a href="/login"
                       class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100 hover:text-indigo-700 focus:outline-none focus:bg-gray-100 focus:text-indigo-700 transition duration-150 ease-in-out"
                       role="menuitem">
                        Log in
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
