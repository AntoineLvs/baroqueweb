@extends('layouts.app', ['page' => 'Map', 'pageSlug' => 'map', 'section' => 'main'])
@section('content')
<main class="flex-1 relative z-10 overflow-y-auto focus:outline-none">


    <div class="py-10">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">

            <h1 class="text-2xl font-bold text-gray-900">Personnal Map</h1>


            <x-message-component></x-message-component>



        </div>

        <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="py-4">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                        <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                            <div class="ml-4 mt-2">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Here you can manage your own map
                                </h3>
                            </div>
                            <div class="ml-4 mt-2 flex-shrink-0">
                                <a href="{{ route('api.manager') }}" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Map Manager</a>
                                <a href="{{ route('locations.profile-tenants', ['tenant_id' => $tenant_id ?? 1]) }}" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Show Public Map</a>
                                <div class="image-container">
                                    <button id="copyLink" data-clipboard-text="{{ $link }}" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Copy my Public Map Link</button>
                                    <span class="tooltip text-gray-500" style="z-index: 10; transform: translate(-50%, 230%);">{{ $link }}</span>
                                </div>

                                <a href="{{ route('locations.index') }}" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Zurück</a>

                                @section('scripts')
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
                                <script>
                                    var clipboard = new ClipboardJS('#copyLink');

                                    clipboard.on('success', function(e) {
                                        console.log(e);
                                        alert("Link copied to clipboard");
                                    });
                                </script>
                                @endsection
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <!-- Content goes here -->
                        Please feel free to edit the map to your liking.
                    </div>
                </div>
            </div>
        </div>


        @livewire('map.edit-map', ['tenant_id' => $tenant_id])

    </div>





</main>


@endsection