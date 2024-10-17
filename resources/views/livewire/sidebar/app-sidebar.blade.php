<div>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div x-data="{open: false}" @keydown.window.escape="open=false" class="h-screen flex overflow-hidden bg-gray-100">

        <!-- Static sidebar for Mobile -->
        @livewire('components.mobile-menu')


        <!-- Static sidebar for desktop START -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <div class="flex flex-col h-0 flex-1 bg-gray-800">
                    <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                        <div class="flex items-center flex-shrink-0 px-4">
                            <a href="{{ URL::route('home') }}">
                                <img class="h-16 w-auto" src="{{ asset('assets/img/refuelos_white.png') }}" alt="xtl">
                            </a>
                        </div>


                        <nav class="mt-5 flex-1 px-2 bg-gray-800 space-y-1">
                            <div x-data="{ showAdminLinks: {{ in_array(request()->route()->getName(), ['admin.dashboard', 'product-types.index','base-products.index','documents.index','base-services.index']) ? 'true' : 'false' }} }">
                                @if($super)
                                <button @click="showAdminLinks = !showAdminLinks" :class="{ 'bg-teal-700': showAdminLinks, 'text-white': showAdminLinks, 'hover:text-white': showAdminLinks }" class="w-full hover:bg-gray-700 flex items-center text-left rounded-md p-2 gap-x-3 text-sm leading-6 font-semibold text-gray-300" aria-controls="sub-menu-1" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 shrink-0 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
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
                                    <svg class="text-gray-300 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>

                                    Profile
                                </a>

                                <hr class="mt-4 mb-4">
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
            </div>
        </div>
        <!-- Static sidebar for desktop END -->

        <!-- Menu button  -->
        <div class="md:hidden">
            <button @click="open = true" x-transition:enter="transition ease-out duration-150 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                <span class="sr-only">Open sidebar</span>
                <!-- Heroicon name: outline/menu -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
        <!-- Menu button  -->


    </div>
</div>