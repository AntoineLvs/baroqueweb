<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @hasSection('title')
    <title>@yield('title') - {{ config('app.name') }}</title>
    @else
    <title>{{ config('app.name') }}</title>
    @endif


    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    <tallstackui:script />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles

    <!-- Scripts -->
    <wireui:scripts />

    <script src='https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v3.0.1/mapbox-gl.css' rel='stylesheet' />


    <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @fluxStyles
</head>

<body>
    @yield('body')
    @stack('scripts')
    @livewireScripts
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@turf/turf@6/turf.min.js"></script>

    @if (session('message'))
        <div
            x-data="{ show: false, message: '' }"
            x-init="
        @if(session('message'))
            message = '{{ session('message') }}';
            show = true;
            setTimeout(() => show = false, 7500);
        @endif
    "
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            style="display: none; position: fixed; top: 1rem; right: 1rem; z-index: 50;"
            @click.away="show = false"
        >
            <div class="bg-blue-500 text-white p-4 rounded-lg shadow-lg">
                <div class="flex justify-between items-center">
                    <div class="pr-4" x-text="message"></div>
                    <button @click="show = false" class="text-lg">&times;</button>
                </div>
            </div>
        </div>
    @endif
    @fluxScripts
</body>

@yield('footer')

</html>
