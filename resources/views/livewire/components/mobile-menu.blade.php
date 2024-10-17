<!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
<div x-show="open" class="fixed inset-0 flex z-40 md:hidden" role="dialog" aria-modal="true"
    x-transition:enter="transition ease-out duration-150 ease-out" x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100 ease-in"
    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

    <div x-show="open" class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"
        x-transition:enter="transition ease-out duration-150 ease-out" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100 ease-in"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"></div>


    <div x-show="open" class="relative flex-1 flex flex-col max-w-xs w-full bg-gray-800"
        x-transition:enter="transition ease-out duration-150 ease-out" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100 ease-in"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

        <div x-show="open" class="absolute top-0 right-0 -mr-12 pt-2">
            <button @click="open = false" x-show="open" x-transition:enter="transition ease-out duration-150 ease-out"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-100 ease-in"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" x-cloak
                @click.away="open = false"
                class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                <span class="sr-only">Close</span>
                <!-- Heroicon name: outline/x -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
            <div class="flex items-center flex-shrink-0 px-4">
                <a href="{{ URL::route('home') }}">
                    <img class="h-16 w-auto" src="{{ asset('assets/img/refuelos_white.png') }}" alt="xtl">
                </a>
            </div>
            <nav class="mt-5 px-2 space-y-1">
                <!-- Add the admin links in the verification, to keep to toggle open if user open an admin page  -->
                <div x-data="{ showAdminLinks: {{ in_array(request()->route()->getName(), ['admin.dashboard', 'product-types.index','base-products.index','documents.index','base-services.index']) ? 'true' : 'false' }} }">
                    @if($super)
                    <button @click="showAdminLinks = !showAdminLinks" :class="{ 'bg-teal-700': showAdminLinks, 'text-white': showAdminLinks, 'hover:text-white': showAdminLinks }" class="w-full hover:bg-gray-700 flex items-center text-left rounded-md p-2 gap-x-3 text-sm leading-6 font-semibold text-gray-300" aria-controls="sub-menu-1" aria-expanded="false">
                        <svg class="h-6 w-6 shrink-0 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                        Toggle Admin Links

                        <!-- Expanded: "rotate-90 text-gray-500", Collapsed: "text-gray-400" -->
                        <svg :class="{ 'rotate-90 text-gray-500': showAdminLinks, 'text-gray-400': !showAdminLinks }" class="ml-auto h-5 w-5 shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    @endif

                    <!-- Reserved link for admin users -->
                    <div x-show="showAdminLinks" class=" px-3 py-2" x-transition:enter="transition ease-out duration-700 transform opacity-0" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100 transform">

                        @if($super)
                        <a @if (request()->routeIs('admin.dashboard'))
                            class="bg-teal-700 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                            @endif

                            href="{{ route('admin.dashboard') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <svg class="text-gray-300 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Admin Dashboard
                        </a>

                        @endif

                    
                    </div>


                    <!-- Visible link for connected users  -->
                    <a @if (request()->routeIs('dashboard'))
                        class="bg-teal-700 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                        @endif

                        href="{{ route('dashboard') }}"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        <svg class="text-gray-300 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Start
                    </a>


                    <a @if (request()->routeIs('tenant.index'))
                        class="bg-teal-700 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                        @endif

                        href="{{ route('tenant.index') }}"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        <svg class="text-gray-300 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                        </svg>
                        Mein Mandant
                    </a>

                 
                    <a @if (request()->routeIs('team.index'))
                        class="bg-teal-700 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                        @endif

                        href="{{ route('team.index') }}"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        <!-- Heroicon name: outline/users -->
                        <svg class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Benutzer
                    </a>

                    @if($super)
                    <a @if (request()->routeIs('clients'))
                        class="bg-teal-700 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                        @endif

                        href="{{ route('clients.index') }}"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        <!-- Heroicon name: outline/users -->
                        <svg class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Clients
                    </a>
                    @endif

                    <hr class="mt-4 mb-4">

                
                </div>

            </nav>
        </div>
        <div class="flex-shrink-0 flex bg-gray-700 p-4">
            <a href="#" class="flex-shrink-0 w-full group block">
                <div class="flex items-center">
                    <div>
                        <img class="inline-block h-9 w-9 rounded-full" src="{{ asset('assets/img/logo.svg') }}" alt="">
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-white">
                            {{ auth()->user()->name }}
                        </p>

                        <p class="text-xs font-medium text-gray-300 group-hover:text-gray-200" onclick="location.href='{{ url('/profile/') }}'">

                            Benutzer bearbeiten


                        </p>

                        <p class="text-xs font-medium text-gray-300 group-hover:text-gray-200" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="flex-shrink-0 w-14">
        <!-- Force sidebar to shrink to fit close icon -->
    </div>
</div>