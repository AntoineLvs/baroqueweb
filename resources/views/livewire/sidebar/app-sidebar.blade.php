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
                            <a href="{{ URL::route('dashboard') }}">
                                <img class="h-16 w-auto" src="{{ asset('assets/img/xtl-1.png') }}" alt="xtl">
                            </a>
                        </div>


                        <nav class="mt-5 flex-1 px-2 bg-gray-800 space-y-1">

                            <div x-data="{ showAdminLinks: {{ in_array(request()->route()->getName(), ['admin.dashboard', 'product-types.index','base-products.index','map.index','documents.index','base-services.index']) ? 'true' : 'false' }} }">
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

                                    @if($super)
                                    <a @if (request()->routeIs('product-types.index'))
                                        class="bg-teal-700 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                        @endif

                                        href="{{ route('product-types.index') }}"
                                        class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                        <!-- Heroicon name: outline/folder -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                        Products Types
                                    </a>
                                    @endif

                                    @if($super)
                                    <a @if (request()->routeIs('base-products.index'))
                                        class="bg-teal-700 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                        @endif

                                        href="{{ route('base-products.index') }}"
                                        class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                        <!-- Heroicon name: outline/folder -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                        Base Products
                                    </a>
                                    @endif


                                    @if($super)
                                    <a @if (request()->routeIs('map.index'))
                                        class="bg-teal-700 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                        @endif

                                        href="{{ route('map.index') }}"
                                        class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                        <!-- Heroicon name: outline/folder -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        Maps
                                    </a>
                                    @endif

                                    @if($super)
                                    <a @if (request()->routeIs('documents.index'))
                                        class="bg-teal-700 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                        @endif

                                        href="{{ route('documents.index') }}"
                                        class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Docs
                                    </a>
                                    @endif

                                    @if($super)
                                    <a @if (request()->routeIs('base-services.index'))
                                        class="bg-teal-700 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                        @endif

                                        href="{{ route('base-services.index') }}"
                                        class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                        Base Services
                                    </a>
                                    @endif

                                    @if($super)
                                    <a @if (request()->routeIs('mapbox.index'))
                                        class="bg-teal-700 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                        @endif

                                        href="{{ route('mapbox.index') }}"
                                        class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                        </svg>
                                        Mapbox Records
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
                                    Dashboard Desktop
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

                                <hr class="mt-4 mb-4">

                                <a @if (request()->routeIs('manufacturers.index'))
                                    class="bg-teal-700 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                    @endif

                                    href="{{ route('manufacturers.index') }}"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                    <!-- Heroicon name: outline/users -->



                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                    </svg>

                                    Hersteller
                                </a>

                                <a @if (request()->routeIs('engines.index'))
                                    class="bg-teal-700 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                    @endif

                                    href="{{ route('engines.index') }}"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                    <!-- Heroicon name: outline/users -->

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z" />
                                    </svg>

                                    Motoren
                                </a>

                                <a @if (request()->routeIs('vehicles.index'))
                                    class="bg-teal-700 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                    @endif

                                    href="{{ route('vehicles.index') }}"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                    <!-- Heroicon name: outline/users -->

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                    </svg>

                                    Fahrzeuge
                                </a>


                                <a @if (request()->routeIs('standards.index'))
                                    class="bg-teal-700 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                    @endif

                                    href="{{ route('standards.index') }}"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                    <!-- Heroicon name: outline/users -->

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                    </svg>

                                    Standards
                                </a>

                                <a @if (request()->routeIs('releases.index'))
                                    class="bg-teal-700 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                    @endif

                                    href="{{ route('releases.index') }}"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                    <!-- Heroicon name: outline/users -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>


                                    Freigaben
                                </a>

                                <a @if (request()->routeIs('products.index'))
                                    class="bg-teal-700 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                    @endif

                                    href="{{ route('products.index') }}"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                    <!-- Heroicon name: outline/folder -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                    Products
                                </a>

                                <a @if (request()->routeIs('services.index'))
                                    class="bg-teal-700 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                    @endif

                                    href="{{ route('services.index') }}"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                    Services
                                </a>

                                <a @if (request()->routeIs('locations.index'))
                                    class="bg-teal-700 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                    @endif

                                    href="{{ route('locations.index') }}"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                    <!-- Heroicon name: outline/users -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>


                                    Locations
                                </a>




                            </div>

                            <hr class="mt-4 mb-4">
                            @auth
                            <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="mt-1 group flex items-center px-2 py-2 text-sm leading-5 font-medium text-gray-300 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-150">
                                <svg class="mr-3 h-6 w-6 text-gray-400 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-150" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @endauth

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