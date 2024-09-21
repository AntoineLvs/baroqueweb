<div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
    <div class="py-4">
        <div class="bg-white overflow-hidden shadow border border-gray-200 rounded-lg divide-y divide-gray-200">
            @if (request()->is('find*'))
            <div class="px-4 py-5 sm:px-6">
                <h3 class="card-title"> You can find here all the active locations of {{ $tenant }}</h3>
            </div>
            @endif

            <div x-data="{ isHidden: false, isMobile: window.innerWidth <= 640 }"
                @resize.window="isMobile = window.innerWidth <= 640" class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
                <div class="py-4">
                    <div class="bg-white overflow-hidden shadow rounded-lg divide-y divide-gray-200">
                        <!-- Container for the map and search bar -->
                        <div class="relative" style="width: 100%; height: auto;">

                            <!-- Search bar floating in the top-left corner -->
                            <div x-data="{ 
                        showResultClass: false, 
                        openHeight: '0px',
                        isHvo100: true,
                        isHvoBlend: true, 
                        radius: 100,
                        test() {
                            setTimeout(() => {
                                $dispatch('filterChanged');
                            }, 100);
                        }
                    }"
                                :class="{ 'hidden': isHidden }"
                                style="z-index: 5; min-width: 400px; position: absolute; top: 30px; left: 30px; margin-top: 20px; margin-left: 20px;"
                                class="relative bg-white shadow rounded-md border border-gray-300">

                                <!-- Closure button -->
                                <div class="absolute top-1 right-1 cursor-pointer text-sm text-gray-500 hover:text-red-600-500 mr-2" @click="isHidden = true">
                                    ausblenden
                                </div>

                                <!-- Search bar content -->
                                <div x-transition x-cloak class="mx-auto mt-8 mt-4 mr-4 ml-4">
                                    <div class="w-full flex flex-col items-center space-y-4">
                                        <div class="w-full">
                                            <div class="animated">
                                                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                                <div class="relative">
                                                    <div @click="showResultClass = true;" id="searchAreaButton" class="cursor-pointer absolute inset-y-0 start-0 flex items-center ps-3">
                                                        <svg class="searchAreaButton w-4 h-4 text-indigo-500 dark:text-indigo-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                        </svg>
                                                    </div>
                                                    <input @keyup="showResultClass = true" x-on:change.debounce="showResultClass = true" id="searchBar" name="searchbox" placeholder="Search..." type="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                                    <button @click="isHvoBlend = true; isHvo100 = true; radius = 100" id="resetButton" type="button" class="text-white absolute end-2.5 bottom-2.5 bg-indigo-600 hover:bg-indigo-700 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="mx-auto mb-2 mr-2 ml-6">
                                    <div class="flex items-center justify-between">
                                        <div class="mt-2">
                                            <div class="flex items-center">
                                                <!-- Button HVO 100 -->
                                                <div>
                                                    <button type="button"
                                                        :class="isHvo100 ? 'bg-indigo-600 text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600' : 'bg-white text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50'"
                                                        @click="isHvo100 = !isHvo100; test()"
                                                        class="rounded-full px-2.5 py-1 text-xs font-semibold shadow-sm">
                                                        HVO 100
                                                    </button>
                                                </div>

                                                <!-- Button HVO Blend -->
                                                <div class="ml-2">
                                                    <button type="button"
                                                        :class="isHvoBlend ? 'bg-indigo-600 text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600' : 'bg-white text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50'"
                                                        @click="isHvoBlend = !isHvoBlend; test()"
                                                        class="rounded-full px-2.5 py-1 text-xs font-semibold shadow-sm">
                                                        HVO Blend
                                                    </button>
                                                </div>

                                                <div id="isHvo100" x-text="isHvo100" hidden></div>
                                                <div id="isHvoBlend" x-text="isHvoBlend" hidden></div>

                                                <div class="ml-4 flex items-center justify-between">
                                                    <div>
                                                        <label for="radiusRange" class="block text-xs font-medium text-gray-700">
                                                            Search Radius (<span x-text="radius"></span> km)
                                                        </label>
                                                        <input type="range" id="radiusRange" min="5" max="250" x-model="radius" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                                                        <div id="radius" x-text="radius" hidden></div>
                                                    </div>
                                                </div>
                                                <div id="tenant" hidden>{{ $tenant }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div x-init="$watch('showResultClass', value => {
                    if (value) {
                        // Delayed to ensure element is rendered before changing height
                        setTimeout(() => {
                            openHeight = '500px';
                        }, 10);
                    } else {
                        openHeight = '0px';
                    }
                })">
                                    <div x-show="showResultClass"
                                        x-transition:enter="transition-all ease-out duration-500"
                                        x-transition:enter-start="opacity-0"
                                        x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition-all ease-in duration-500"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"
                                        class="overflow-hidden"
                                        :style="{ height: openHeight }">
                                        <!-- 
                <div class="mx-auto mt-4 mb-4">
                    <div class="w-full flex flex-col items-center space-y-4 justify-center">
                        <button id="searchAreaButton" class="mx-auto bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded" type="button">Search in that area</button>
                    </div>
                </div> -->
                                        <div class="bg-gray-100">
                                            <div class="text-gray-600 text-sm px-4 py-3 border-b-2 border-gray-300 text-left leading-4 tracking-wider cursor-pointer">
                                                <span class="ml-4">Current Search Results: <span id="resultsCount">0</span></span>
                                            </div>
                                        </div>
                                        <div class="table-container" id="tableContainer" style="overflow-y: scroll; height: 460px; background-color:rgba(255, 255, 255, 0.8);">
                                            <table id="locationsTable" class="w-full">
                                                <tbody>
                                                    <!-- The code will be injected here dynamically -->
                                                </tbody>
                                            </table>

                                            <template id="locationRowTemplate">
                                                <tr class="tile-hover cursor-pointer" @click="if (isMobile) { isHidden = true }">
                                                    <td class="pr-2 py-4 whitespace-no-wrap border-b border-gray-300">
                                                        <div class="flex items-center justify-between">
                                                            <div class="ml-2">
                                                                <div class="flex items-center">
                                                                    <div class="flex-shrink-0 items-center h-8 h-8 md:h-10 md:w-10">
                                                                        <div class="image-container">
                                                                            <a href="#" class="location-link">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ml-2">
                                                                        <div class="text-sm text-gray-900 location-name">
                                                                            <!-- The name of the location will be injected here-->
                                                                        </div>
                                                                        <div class="text-xs text-gray-500 location-tenant">
                                                                            <!-- The name of the tenant will be injected here-->
                                                                        </div>
                                                                        <div class="text-xs text-gray-500 location-id" hidden></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="whitespace-no-wrap border-b border-gray-300">
                                                        <div class="flex items-start justify-between">
                                                            <div class="flex flex-col items-center space-y-2 location-products">
                                                                <!-- The badges of the products will be injected here-->
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="whitespace-no-wrap text-center border-b border-gray-300 visible-buttons">
                                                        <!-- Adjust the parent div for the first badge -->
                                                        <div class="flex items-center justify-center h-full">
                                                            <div class="flex items-center justify-center h-full">
                                                                <div class="image-container">
                                                                    <div class="flex items-center justify-center">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 ml-2 location-status" fill="red">
                                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 000-1.5h-3.25V5z" clip-rule="evenodd" />
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="py-4 pr-4 whitespace-no-wrap text-center border-b border-gray-300 leading-5 font-medium">
                                                        <!-- Adjust the parent div for the second badge -->
                                                        <div class="flex items-center justify-center h-full" style="padding-top: 3px;">
                                                            <button type="button" class="details-button">
                                                                <div class="image-container">
                                                                    <div class="flex items-center justify-center">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                                                        </svg>
                                                                        <span class="tooltip text-gray-500" style="z-index: 10; transform: translateX(-90%);">Show Details</span>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <!-- <td class="visible-buttons py-4 pr-2 whitespace-no-wrap text-center border-b border-gray-300 leading-5 font-medium">
                                <button type="button" class="open-google-map">
                                    <div class="image-container">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                                        </svg>
                                        <span class="tooltip text-gray-500" style="z-index: 10; transform: translateX(-90%);">Show on Map</span>
                                    </div>
                                </button>
                            </td> -->
                                                </tr>
                                                <tr class="details-row hidden">
                                                    <td colspan="5" class="pr-2 py-4 whitespace-no-wrap border-b border-gray-300">
                                                        <div class="details-content p-4">
                                                            <span class="details-location-info"></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </template>
                                        </div>
                                    </div>



                                    <div>
                                        <div class="w-full flex flex-col items-center justify-center">
                                            <button @click="showResultClass = !showResultClass" class="w-full mx-auto bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded flex items-center justify-between" type="button">
                                                <span>Show Results</span>
                                                <div class="transform transition-transform duration-600" :class="{ 'rotate-180': !showResultClass }">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="text-white w-5 h-5" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div x-show="isHidden"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform scale-90"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-90"
                                class="fixed bottom-4 right-4 cursor-pointer bg-indigo-600 text-white p-3 rounded-full shadow-lg"
                                @click="isHidden = false" style="z-index: 10;">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                            </div>

                            <!-- Map taking the remaining space -->
                            <div id="map" class="w-full" style="height: 750px;"></div>
                        </div>
                    </div>
                </div>
                <style>
                    .mapboxgl-ctrl-bottom-right {
                        display: none;
                    }

                    .tile-hover:hover {
                        background-color: #e5e7eb;
                    }

                    #searchAreaButton:hover .searchAreaButton {
                        color: #4f46e5;
                        transform: rotate(90deg);
                        transition: transform 0.2s ease-out;
                    }

                    #searchAreaButton .searchAreaButton {
                        transform: rotate(0deg);
                        transition: transform 0.2s ease-in;
                    }

                    @media screen and (max-width: 768px) {
                        .select-menu {
                            margin-right: 20px;
                        }

                        .main-container {
                            min-width: auto !important;
                        }

                        .visible-buttons {
                            display: none !important;
                        }

                        .invisible-buttons {
                            visibility: visible !important;
                        }

                    }

                    @media screen and (min-width: 768px) {
                        .visible-buttons {
                            visibility: visible !important;
                        }

                        .invisible-buttons {
                            display: none !important;
                        }

                    }

                    .highlight {
                        background-color: #e5e7eb;
                        /* Couleur de surbrillance */
                        transition: background-color 0.5s ease;
                    }
                </style>


                @script
                <script>
                    document.addEventListener('alpine:init', () => {
                        Alpine.data('filterData', () => ({
                            isHvo100: false,
                            isHvoBlend: false,
                            radius: 100, // Default value of the slider (100km)

                            async updateMarkersAndTable(query) {
                                if (query.length > 0) {
                                    const coordinates = await getCoordinatesFromCity(query);

                                    if (coordinates) {
                                        // If city coordinates are found, filter features by proximity
                                        filteredFeatures = filteredFeatures.filter(feature => {
                                            const [longitude, latitude] = feature.geometry.coordinates;
                                            const distance = distanceRadius({
                                                latitude,
                                                longitude
                                            }, coordinates);

                                            // Use the selected radius
                                            return distance <= this.radius;
                                        });

                                        // Update the map view with filtered features
                                        adjustMapView(filteredFeatures);
                                    }
                                }
                            },
                        }));
                    });
                    mapboxgl.accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHBiYXozZm0wZ21vMnFwZHE4ZWc5Z2lzIn0.dJGBO1JOfota9KceLDgGJg';
                    const map = new mapboxgl.Map({
                        container: 'map',
                        style: 'mapbox://styles/elsenmedia/ckvso4s5p189k14pltjqo1rqo',
                        center: [10.451526, 51.165691],
                        zoom: 5
                    });


                    let activePopup = null; // to manage the active popup
                    let lastCenter = map.getCenter(); // stock the initial center
                    let currentCenter = map.getCenter(); // Sotck the current center
                    let mouseOverPopup = false;
                    let mouseOverMarker = false;
                    let searchMarker = null; // Global variable to store the search marker
                    const tenant = document.getElementById('tenant').textContent ?? null;

                    map.on('load', function() {
                        map.addSource('your-tileset-source', {
                            'type': 'vector',
                            'url': 'mapbox://elsenmedia.ckvsnxal129qg27qrclgdhekc-330dh'
                        });


                        map.addLayer({
                            'id': 'initial-locations-layer',
                            'type': 'symbol',
                            'source': 'your-tileset-source',
                            'source-layer': 'efuelmap_v1',
                            'layout': {
                                'icon-image': [
                                    'case',
                                    ['==', ['get', 'active'], 1], 'blue-location', 'black-location' // If 'active' is 1, use 'blue-location', Otherwise, use 'red-location'
                                ],
                                'text-field': ['get', 'name'],
                                'text-size': 0,
                                'icon-size': 0,
                            },
                            'filter': ['==', ['get', 'tenant'], tenant] // Filter to display only the locations that belong to the current tenant
                        });
                        setTimeout(germanyCenter, 500);

                        function debounce(func, delay) {
                            let timeout;
                            return function(...args) {
                                clearTimeout(timeout);
                                timeout = setTimeout(() => func.apply(this, args), delay);
                            };
                        }

                        const radiusUpdated = document.getElementById('radiusRange');

                        radiusUpdated.addEventListener('change', (event) => {
                            updateMarkersAndTable();
                        });


                        // Function to calculate the distance in kilometers between two geographical points
                        function distanceRadius(coord1, coord2) {
                            const R = 6371; // Earth's radius
                            const dLat = (coord2.latitude - coord1.latitude) * Math.PI / 180;
                            const dLon = (coord2.longitude - coord1.longitude) * Math.PI / 180;

                            const a =
                                Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                                Math.cos(coord1.latitude * Math.PI / 180) *
                                Math.cos(coord2.latitude * Math.PI / 180) *
                                Math.sin(dLon / 2) * Math.sin(dLon / 2);

                            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

                            return R * c; // Distance in kilometers
                        }

                        async function getCoordinatesFromCity(cityName) {
                            const accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHBiYXozZm0wZ21vMnFwZHE4ZWc5Z2lzIn0.dJGBO1JOfota9KceLDgGJg';
                            const response = await fetch(`https://api.mapbox.com/geocoding/v5/mapbox.places/${encodeURIComponent(cityName)}.json?access_token=${accessToken}`);
                            const data = await response.json();

                            if (data.features && data.features.length > 0) {
                                const [longitude, latitude] = data.features[0].center; // City coordinates
                                return {
                                    longitude,
                                    latitude
                                };
                            }

                        }

                        async function flyToAndPlaceMarker(coordinates, radius) {
                            return new Promise((resolve) => {
                                // Delete the old search marker if it exists
                                if (searchMarker) {
                                    searchMarker.remove();
                                }

                                // Add a new search marker
                                searchMarker = new mapboxgl.Marker({
                                        color: 'blue',
                                        draggable: false,
                                        scale: 0.8
                                    })
                                    .setLngLat([coordinates.longitude, coordinates.latitude])
                                    .addTo(map);

                                // Calculate the zoom level based on the radius
                                const minZoom = 5; // Minimum zoom
                                const maxZoom = 10; // Maximum zoom

                                const zoomLevel = maxZoom - radius / (250 / (maxZoom - minZoom));

                                // Move the camera to the new location with the right zoom
                                map.flyTo({
                                    center: [coordinates.longitude, coordinates.latitude],
                                    zoom: zoomLevel, // Use the calculated zoom level
                                    essential: true, // Ensures that the animation is respected
                                });

                                // Draw a circle around the search marker
                                drawRadiusCircle(coordinates, radius);

                                // Once the camera movement is finished, resolve the promise
                                map.once('moveend', () => {
                                    resolve();
                                });
                            });
                        }

                        // Draw a circle based on the radius
                        function drawRadiusCircle(coordinates, radius) {
                            const circleRadiusMeters = radius * 1000; // Convert the radius to meters

                            // Check if the radius circle source exists, otherwise add it
                            if (map.getSource('radius-circle')) {
                                map.getSource('radius-circle').setData(createGeoJSONCircle([coordinates.longitude, coordinates.latitude], circleRadiusMeters));
                            } else {
                                // Add a source for the radius circle
                                map.addSource('radius-circle', {
                                    type: 'geojson',
                                    data: createGeoJSONCircle([coordinates.longitude, coordinates.latitude], circleRadiusMeters)
                                });

                                // Add a layer for displaying the radius circle
                                map.addLayer({
                                    id: 'radius-circle-layer',
                                    type: 'fill',
                                    source: 'radius-circle',
                                    layout: {},
                                    paint: {
                                        'fill-color': 'rgba(0, 0, 255, 0.2)',
                                        'fill-opacity': 0.4
                                    }
                                });
                            }
                        }

                        // Create a GeoJSON circle
                        function createGeoJSONCircle(center, radiusInMeters, points = 64) {
                            const coords = {
                                latitude: center[1],
                                longitude: center[0]
                            };

                            const km = radiusInMeters / 1000;
                            const ret = [];
                            const distanceX = km / (111.32 * Math.cos((coords.latitude * Math.PI) / 180));
                            const distanceY = km / 110.574;

                            for (let i = 0; i < points; i++) {
                                const theta = (i / points) * (2 * Math.PI);
                                const x = distanceX * Math.cos(theta);
                                const y = distanceY * Math.sin(theta);

                                const lng = coords.longitude + x;
                                const lat = coords.latitude + y;

                                ret.push([lng, lat]);
                            }

                            ret.push(ret[0]); // Close the circle

                            return {
                                type: 'Feature',
                                geometry: {
                                    type: 'Polygon',
                                    coordinates: [ret]
                                }
                            };
                        }

                        async function refreshVisibleFeatures() {
                            // Query features from the current visible map area
                            let features = map.querySourceFeatures('your-tileset-source', {
                                sourceLayer: 'efuelmap_v1',
                                filter: ['==', ['get', 'tenant'], tenant], // Keep only active locations
                                validate: false
                            });

                            let uniqueFeatures = [];
                            let seenIds = new Set();

                            // Ensure unique features by their ID
                            features.forEach(feature => {
                                const id = feature.properties.id;
                                if (!seenIds.has(id)) {
                                    seenIds.add(id);
                                    uniqueFeatures.push(feature);
                                }
                            });

                            // Apply product filters
                            const isHvo100 = document.getElementById('isHvo100').textContent === 'true';
                            const isHvoBlend = document.getElementById('isHvoBlend').textContent === 'true';

                            let filteredFeatures = uniqueFeatures.filter(feature => {
                                const productTypes = feature.properties.product_types || [];
                                if (isHvo100 && isHvoBlend) {
                                    return productTypes.includes(1) || productTypes.includes(2); // Filter by product types
                                } else if (isHvo100) {
                                    return productTypes.includes(1); // HVO100 only
                                } else if (isHvoBlend) {
                                    return productTypes.includes(2); // HVO Blend only
                                } else {
                                    return true; // No product filter
                                }
                            });

                            return filteredFeatures;
                        }

                        function germanyCenter() {
                            map.flyTo({
                                center: [10.451526, 51.165691],
                                zoom: 5,
                                essential: false,
                            });

                            map.once('moveend', () => {
                                updateMarkersAndTable();
                            });
                        }

                        async function updateMarkersAndTable() {
                            if (activePopup) activePopup.remove();

                            currentCenter = map.getCenter();
                            const minZoom = 5;
                            const maxZoom = 20;
                            lastCenter = currentCenter;

                            // Refresh visible features at the start
                            let filteredFeatures = await refreshVisibleFeatures();

                            const searchBar = document.getElementById('searchBar');
                            const query = searchBar.value.trim().toLowerCase();


                            // Step 1: Search in the tileset (locations and tenant names)
                            if (query.length > 0) {
                                filteredFeatures = filteredFeatures.filter(feature => {
                                    const name = feature.properties.name || "";
                                    const tenantName = feature.properties.tenant || "";
                                    const address = feature.properties.address || "";
                                    return (
                                        name.toLowerCase().includes(query) ||
                                        tenantName.toLowerCase().includes(query) ||
                                        address.toLowerCase().includes(query)
                                    );
                                });
                            }


                            // Step 2 : If no results, search for a city
                            if (filteredFeatures.length === 0) {

                                const coordinates = await getCoordinatesFromCity(query);

                                if (coordinates) {
                                    const radius = parseFloat(document.getElementById('radius').textContent);

                                    await flyToAndPlaceMarker(coordinates, radius);

                                    // Refresh visible features after moving the map
                                    filteredFeatures = await refreshVisibleFeatures();

                                    // Now apply the radius filter to the newly visible features
                                    filteredFeatures = filteredFeatures.filter(feature => {
                                        const [longitude, latitude] = feature.geometry.coordinates;
                                        const distance = distanceRadius({
                                            latitude,
                                            longitude
                                        }, coordinates);
                                        return distance <= radius;
                                    });
                                }
                            }

                            setTimeout(() => {
                                const bounds = map.getBounds();
                                const sw = bounds.getSouthWest();
                                const ne = bounds.getNorthEast();

                                filteredFeatures = filteredFeatures.filter(feature => {
                                    const [longitude, latitude] = feature.geometry.coordinates;
                                    return (
                                        longitude >= sw.lng && longitude <= ne.lng &&
                                        latitude >= sw.lat && latitude <= ne.lat
                                    );
                                });
                            }, 500);

                            // Management of the zoom progress if there are no results in the visible area
                            function progressiveZoomOut() {
                                if (filteredFeatures.length > 0 || map.getZoom() <= minZoom) {
                                    updateMarkers(filteredFeatures);
                                    updateTable(filteredFeatures);
                                    if (filteredFeatures.length === 0) {
                                        const tableBody = document.querySelector("#locationsTable tbody");
                                        tableBody.innerHTML = '';
                                        const tr = document.createElement('tr');
                                        const td = document.createElement('td');
                                        td.textContent = 'No locations found';
                                        td.colSpan = 4;
                                        td.style.textAlign = 'center';
                                        td.style.paddingTop = '20px';
                                        tr.appendChild(td);
                                        tableBody.appendChild(tr);
                                    }
                                    adjustMapView(filteredFeatures);
                                } else {
                                    map.zoomOut({
                                        animate: true
                                    });
                                    setTimeout(() => {
                                        features = map.querySourceFeatures('your-tileset-source', {
                                            sourceLayer: 'efuelmap_v1',
                                            filter: ['==', ['get', 'tenant'], tenant],
                                            validate: false
                                        });

                                        filteredFeatures = features.filter(feature => {
                                            const productTypes = feature.properties.product_types || [];
                                            if (isHvo100 && isHvoBlend) {
                                                return productTypes.includes(1) || productTypes.includes(2);
                                            } else if (isHvo100) {
                                                return productTypes.includes(1);
                                            } else if (isHvoBlend) {
                                                return productTypes.includes(2);
                                            } else {
                                                return true;
                                            }
                                        });

                                        // Search in the tileset (locations and tenant names)
                                        if (query.length > 0) {
                                            filteredFeatures = filteredFeatures.filter(feature => {
                                                const name = feature.properties.name || "";
                                                const tenantName = feature.properties.tenant || "";
                                                const address = feature.properties.address || "";
                                                return (
                                                    name.toLowerCase().includes(query) ||
                                                    tenantName.toLowerCase().includes(query) ||
                                                    address.toLowerCase().includes(query)
                                                );
                                            });
                                        }

                                        progressiveZoomOut();
                                    }, 500);
                                }
                            }

                            if (filteredFeatures.length > 0) {
                                updateMarkers(filteredFeatures);
                                updateTable(filteredFeatures);
                                adjustMapView(filteredFeatures);
                            } else {
                                progressiveZoomOut();
                            }
                        }


                        function updateTable(closestFeatures) {
                            // Update the number of results
                            const resultsCount = document.getElementById('resultsCount');
                            resultsCount.textContent = closestFeatures ? closestFeatures.length : 0;

                            if (!closestFeatures || closestFeatures.length === 0) {
                                const tableBody = document.querySelector("#locationsTable tbody");
                                tableBody.innerHTML = '';
                                const tr = document.createElement('tr');
                                const td = document.createElement('td');
                                td.textContent = 'No locations found';
                                td.colSpan = 4;
                                td.style.textAlign = 'center';
                                td.style.paddingTop = '20px';
                                tr.appendChild(td);
                                tableBody.appendChild(tr);
                                return;
                            }

                            const tableBody = document.querySelector("#locationsTable tbody");
                            tableBody.innerHTML = ''; // Reset the table
                            const template = document.getElementById('locationRowTemplate');

                            closestFeatures.forEach(feature => {
                                const clone = document.importNode(template.content, true);

                                // Get the specific data
                                const name = feature.properties.name || "N/A";
                                const tenant = feature.properties.tenant || "N/A";
                                const opening_start = feature.properties.opening_start || "00:00";
                                const opening_end = feature.properties.opening_end || "23:59";
                                const address = feature.properties.address || "N/A";
                                const productType = feature.properties.product_types || [];
                                let productIds = feature.properties.products;
                                const id = feature.properties.id || "";
                                const serviceType = feature.properties.service_types || [];
                                let serviceIds = feature.properties.services;

                                const product_types = feature.properties.product_types || [];
                                const isHvo100 = product_types.includes(1);
                                const isHvoBlend = product_types.includes(2);
                                const s3BaseUrl = 'https://refuelos-dev.s3.amazonaws.com/images/';

                                const tenantImg = feature.properties.tenant_logo || '';
                                const tenantId = feature.properties.tenant_id || '';
                                const imageUrl = tenantImg ? `/images/${tenantId}/${tenantImg}` : '/assets/img/hvo.png';
                                const tenantLogo = `<img style="background: lightgrey;" class="h-10 w-10 rounded-full ring-2 ring-green location-img" src="${imageUrl}" alt="">`;

                                // Inject the name
                                clone.querySelector('.location-name').textContent = name;
                                clone.querySelector('.location-tenant').textContent = tenant;
                                clone.querySelector('.location-id').textContent = id;
                                const locationLinkElement = clone.querySelector('.location-link');
                                locationLinkElement.innerHTML = tenantLogo;


                                // Check if the location is open
                                const isOpen = isLocationOpen(opening_start, opening_end);

                                // Inject the opening status
                                const statusSvg = clone.querySelector('.location-status');
                                statusSvg.setAttribute('fill', isOpen ? 'rgb(0, 160, 0)' : 'red');

                                // Add the product badges
                                const productsContainer = clone.querySelector('.location-products');

                                if (isHvo100) {
                                    const hvo100Badge = document.createElement('div');
                                    hvo100Badge.className = 'w-full';
                                    hvo100Badge.innerHTML = `
                                                        <button type="button" class="w-full min-mr-4 w-[80px] text-xs cursor-default rounded-full bg-indigo-600 px-2.5 py-1 text-white shadow-sm whitespace-nowrap overflow-hidden text-ellipsis">
                                                            HVO 100
                                                        </button>
                                                    `;
                                    productsContainer.appendChild(hvo100Badge);
                                }

                                if (isHvoBlend) {
                                    const hvoBlendBadge = document.createElement('div');
                                    hvoBlendBadge.className = 'w-full';
                                    hvoBlendBadge.innerHTML = `
                                                        <button type="button" class="w-full min-mr-4 w-[80px] text-xs cursor-default rounded-full bg-indigo-600 px-2.5 py-1 text-white shadow-sm whitespace-nowrap overflow-hidden text-ellipsis">
                                                            HVO Blend
                                                        </button>
                                                    `;
                                    productsContainer.appendChild(hvoBlendBadge);
                                }

                                // Add an event listener for zooming and showing a popup when the line is clicked
                                clone.querySelector('tr').addEventListener('click', function() {
                                    const coordinates = feature.geometry.coordinates;
                                    flyToLocation(coordinates, name, opening_start, opening_end, productType, serviceType, productIds, address)
                                    highlightLocation(feature);
                                    hightLightLocationInTable(id);
                                });

                                // Add an event handler for the "Show Details" button
                                clone.querySelector('.details-button').addEventListener('click', function(event) {
                                    event.stopPropagation(); // Prevent the click event from propagating to the cloned line
                                    const detailsRow = this.closest('tr').nextElementSibling;
                                    const detailsContent = detailsRow.querySelector('.details-content');
                                    const locationInfoSpan = detailsRow.querySelector('.details-location-info');
                                    if (productType.includes(1)) {
                                        productBadge = `<div class="mr-2 text-xs text-center min-w-[80px] rounded-full bg-indigo-600 px-1 py-0.5 text-white shadow-sm whitespace-nowrap overflow-hidden text-ellipsis">
                        HVO 100
                    </div>`;
                                    } else if (productType.includes(2)) {
                                        productBadge = `<div class="mr-2 text-xs text-center min-w-[80px] rounded-full bg-indigo-600 px-1 py-0.5 text-white shadow-sm whitespace-nowrap overflow-hidden text-ellipsis">
                        HVO Blend
                    </div>`;
                                    } else {
                                        productBadge = '';
                                    }

                                    // Table of product names
                                    const productNames = {
                                        1: 'HVO 100',
                                        2: 'KlimaDiesel-90',
                                        3: 'NesteMY',
                                        4: 'Fuelmotion H',
                                        5: 'C.A.R.E Diesel',
                                        6: 'ROTH HVO100 Diesel'
                                    };

                                    // Check if productIds is an array, otherwise try to parse it
                                    if (!Array.isArray(productIds)) {
                                        try {
                                            productIds = JSON.parse(productIds);
                                        } catch (e) {
                                            // If the conversion fails, use an empty array as default
                                            productIds = [];
                                        }
                                    }

                                    // Convert product IDs to names
                                    const productNamesList = productIds
                                        .map(id => productNames[id])
                                        .filter(name => name !== undefined)
                                        .join(', ');


                                    let serviceBadge = '';

                                    if (serviceType.includes(1)) {
                                        serviceBadge += `<div class="image-container ml-2">
                                        <x-svg-icon icon="vacuumer" class="h-6 w-6 text-gray-700" />
                                        <span class="tooltip text-gray-500" style="z-index: 10; transform: translateX(-40%);">Vacuum</span>
                                        </div>`;
                                    }
                                    if (serviceType.includes(2)) {
                                        serviceBadge += `<div class="image-container ml-2">
                                        <x-svg-icon icon="carwash" class="h-6 w-6 text-gray-700" />
                                        <span class="tooltip text-gray-500" style="z-index: 10; transform: translateX(-50%);">Car Wash</span>
                                        </div>`;
                                    }
                                    if (serviceType.includes(3)) {
                                        serviceBadge += `<div class="image-container ml-2">
                                        <x-svg-icon icon="bistro" class="h-6 w-6 text-gray-700" />
                                        <span class="tooltip text-gray-500" style="z-index: 10; transform: translateX(-50%);">Bistro</span>
                                        </div>`;
                                    }


                                    if (serviceBadge !== '') {
                                        serviceBadge = `Services available : ${serviceBadge}`;
                                    }

                                    // Update the details content
                                    locationInfoSpan.innerHTML = `
                                                        <div class="text-sm text-gray-800">
                                                            <div style="display: flex; align-items: center; justify-content: start; margin-bottom: 5px;">
                                                                ${productBadge}
                                                                <div> ${productNamesList}</div>
                                                            </div>
                                                        <div class="mt-4 mb-4 flex items-center space-x-2">
                                                            <x-svg-icon icon="euro" class="h-6 w-6 text-indigo-800" />
                                                            <span class="pr-2">Preis coming soon</span>
                                                            </div>

                                                             <div class="mt-4 mb-4 flex items-center space-x-2">
                                                                 ${serviceBadge}
                                                            </div>
                                                            <!--<div style="margin-bottom: 5px;">Öffnungszeit: ${opening_start} - ${opening_end}</div> -->
                                                           <!-- Icon mit angepasster Größe und Farbe -->
                                                            <div class="mt-4 mb-4 flex items-center space-x-2">
                                                            <x-svg-icon icon="24" class="h-6 w-6 text-green-500" />
                                                            <span class="pr-2">24h geöffnet</span>
                                                            </div>

                                    
                                                            <div style="margin-bottom: 5px;" class="text-gray-500 hover:text-indigo-600 hover:cursor-pointer hover:bg-gray-100" data-toggle="tooltip" data-placement="bottom" title="Copy address">
                                                                <div x-data="{ showMsg: false }">
                                                                    <p style="display: inline; cursor: pointer;" @click="
                                                                        if (navigator.clipboard && navigator.clipboard.writeText) {
                                                                            navigator.clipboard.writeText('${address}').then(() => {
                                                                                showMsg = true;
                                                                                setTimeout(() => showMsg = false, 1000);
                                                                            }).catch(err => console.error('Failed to copy text: ', err));
                                                                        } else {
                                                                            console.error('Clipboard API not supported');
                                                                        }
                                                                    ">
                                                                        <span>Address: ${address}</span>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5" style="display: inline; vertical-align: middle;">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                                                                        </svg>
                                                                    </p>

                                                                    <!-- Message "Copied to clipboard" -->
                                                                    <div x-show="showMsg" @click.away="showMsg = false" style="z-index: 20" class="fixed bottom-3 right-3 max-w-sm overflow-hidden bg-green-100 border border-green-300 rounded">
                                                                        <p class="p-3 flex items-center justify-center text-green-600">Copied to Clipboard</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           <div class="w-full flex flex-row items-start justify-start space-x-2">
                                                                <div class="text-center rounded-md bg-white px-2 py-1 hover:cursor-pointer text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-100 whitespace-nowrap overflow-hidden text-ellipsis">
                                                                    <a href="https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(address)}" target="_blank">Google Maps</a>
                                                                </div>
                                                                <div class="text-center rounded-md bg-white px-2 py-1 hover:cursor-pointer text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-100 whitespace-nowrap overflow-hidden text-ellipsis">
                                                                    <a href="/find/${tenantId}" target="_blank">Details</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    `;

                                    // Toggle the details content
                                    detailsRow.classList.toggle('hidden');
                                });

                                // Add the cloned line to the table
                                tableBody.appendChild(clone);
                            });
                        }


                        // Update markers on the map
                        function updateMarkers(closestFeatures) {


                            // Remove the layer if it already exists
                            if (map.getLayer('locations-layer')) {
                                map.removeLayer('locations-layer');
                                map.removeSource('closest-features');
                            }
                            if (map.getLayer('highlighted-location')) {
                                map.removeLayer('highlighted-location');
                                map.removeSource('highlighted-location');
                            }

                            // Create a new source with the closest 20 features
                            map.addSource('closest-features', {
                                'type': 'geojson',
                                'data': {
                                    'type': 'FeatureCollection',
                                    'features': closestFeatures
                                }
                            });

                            // Add a new layer for these features
                            map.addLayer({
                                'id': 'locations-layer',
                                'type': 'symbol',
                                'source': 'closest-features',
                                'layout': {
                                    'icon-image': [
                                        'case',
                                        ['==', ['get', 'active'], 1], 'blue-location', 'black-location' // If 'active' is 1, use 'blue-location', Otherwise, use 'red-location'
                                    ],
                                    'text-field': ['get', 'name'],
                                    'text-size': 0,
                                    'icon-size': [
                                        'interpolate', ['linear'],
                                        ['zoom'],
                                        0, 0.6,
                                        22, 0.6
                                    ],
                                },
                                'filter': ['==', ['get', 'tenant'], tenant] // Filter to display only the locations that belong to the current tenant
                            });

                        }

                        function adjustMapView(features) {
                            if (features.length === 0) {
                                // No features match the filter
                                return;
                            }

                            if (features.length === 1) {
                                // If only one match is found, zoom to that location
                                const coordinates = features[0].geometry.coordinates;
                                const name = features[0].properties.name;
                                const opening_start = features[0].properties.opening_start || "00:00";
                                const opening_end = features[0].properties.opening_end || "23:59";
                                const productType = features[0].properties.product_types || []; // Changed 'e.features[0]' to 'features[0]'
                                let productIds = features[0].properties.products; // Same here
                                const serviceType = features[0].properties.service_types || [];
                                const id = features[0].properties.id;
                                const address = features[0].properties.address;

                                flyToLocation(coordinates, name, opening_start, opening_end, productType, serviceType ,productIds, address);
                                hightLightLocationInTable(id);
                            } else {
                                // Adjust the map bounds to include all the matches
                                const bounds = getBounds(features);
                                map.fitBounds(bounds, {
                                    padding: 50,
                                    maxZoom: 12 // Limit the zoom to avoid too much zooming
                                });
                            }
                        }

                        function highlightLocation(location) {
                            // Remove the highlighted layer if it already exists
                            if (map.getLayer('highlighted-location')) {
                                map.removeLayer('highlighted-location');
                                map.removeSource('highlighted-location');
                            }

                            // Create a new source with a single location
                            map.addSource('highlighted-location', {
                                'type': 'geojson',
                                'data': {
                                    'type': 'FeatureCollection',
                                    'features': [location] // Ensure that location is a single feature
                                }
                            });

                            // Add a new layer for the highlighted location
                            map.addLayer({
                                'id': 'highlighted-location',
                                'type': 'symbol',
                                'source': 'highlighted-location',
                                'layout': {
                                    'icon-image': 'red-location', // Use the defined icon in your style from mapbox
                                    'icon-size': [
                                        'interpolate', ['linear'],
                                        ['zoom'],
                                        0, 0.6,
                                        22, 0.6
                                    ],
                                    'text-field': ['get', 'name'],
                                    'text-size': 0,
                                    'text-font': ['Open Sans Bold', 'Arial Unicode MS Bold'],
                                },
                                'filter': ['==', ['get', 'active'], 1], // Filter to display only the locations where 'active' is equal to 1
                                'paint': {
                                    'icon-color': '#FF0000' // Change the icon color to red
                                }
                            });
                        }


                        map.on('mouseenter', 'highlighted-location', function(e) {
                            if (activePopup) activePopup.remove(); // Remove the active popup if it exists

                            const coordinates = e.features[0].geometry.coordinates.slice();
                            const name = e.features[0].properties.name;
                            const opening_start = e.features[0].properties.opening_start || "00:00";
                            const opening_end = e.features[0].properties.opening_end || "23:59";
                            const productType = e.features[0].properties.product_types || [];
                            const serviceType = e.features[0].properties.service_types || [];
                            let productIds = e.features[0].properties.products;
                            const address = e.features[0].properties.address;

                            let productBadge = '';

                            if (productType.includes(1)) {
                                productBadge = `<div class="mr-2 text-xs text-center w-[80px] rounded-full bg-indigo-600 px-1 py-0.5 text-white shadow-sm whitespace-nowrap overflow-hidden text-ellipsis">
                                        HVO 100
                                    </div>`;
                            } else if (productType.includes(2)) {
                                productBadge = `<div class="mr-2 text-xs text-center w-[80px]  rounded-full bg-indigo-600 px-1 py-0.5 text-white shadow-sm whitespace-nowrap overflow-hidden text-ellipsis">
                                        HVO Blend
                                    </div>`;
                            }

                            let openHours = '';

                            if (opening_start == '00:00' && opening_end == '23:59' || opening_start == '00:00' && opening_end == '00:00') {
                                openHours = `<div class="mt-1 mb-1 flex items-center space-x-2 justify-center">
                                    <x-svg-icon icon="24" class="h-5 w-5 text-green-500" />
                                    <span class="pr-2">24h geöffnet</span>
                                </div>`;
                            } else {
                                openHours = `Open from ${opening_start} to ${opening_end}`
                            }
                            let serviceBadge = '';

                            if (serviceType.includes(1)) {
                                serviceBadge += `<div class="image-container ml-2">
                                    <x-svg-icon icon="vacuumer" class="h-5 w-5 text-gray-700" />
                                    <span class="tooltip text-gray-500" style="z-index: 10; transform: translateX(-40%);">Vacuum</span>
                                </div>`;
                            }
                            if (serviceType.includes(2)) {
                                serviceBadge += `<div class="image-container ml-2">
                                    <x-svg-icon icon="carwash" class="h-5 w-5 text-gray-700" />
                                    <span class="tooltip text-gray-500" style="z-index: 10; transform: translateX(-50%);">Car Wash</span>
                                </div>`;
                            }
                            if (serviceType.includes(3)) {
                                serviceBadge += `<div class="image-container ml-2">
                                    <x-svg-icon icon="bistro" class="h-5 w-5 text-gray-700" />
                                    <span class="tooltip text-gray-500" style="z-index: 10; transform: translateX(-50%);">Bistro</span>
                                </div>`;
                            }


                            if (serviceBadge !== '') {
                                serviceBadge = `${serviceBadge}`;
                            }

                            const productNames = {
                                1: 'HVO 100',
                                2: 'KlimaDiesel-90',
                                3: 'NesteMY',
                                4: 'Fuelmotion H',
                                5: 'C.A.R.E Diesel',
                                6: 'ROTH HVO100 Diesel'
                            };

                            if (!Array.isArray(productIds)) {
                                try {
                                    productIds = JSON.parse(productIds);
                                } catch (e) {
                                    productIds = [];
                                }
                            }

                            const productNamesList = productIds
                                .map(id => productNames[id])
                                .filter(name => name !== undefined)
                                .join(', ');

                            const encodedAddress = encodeURIComponent(address);

                            const popupContent = `
                    <div style="text-align: center; border-radius: 10px">
                        <div style="font-size: 14px; font-weight: bold; margin-bottom:5px;">${name}</div>
                        <div style="display: flex; align-items: center; justify-content: center;">
                            ${productBadge}
                            <div class="text-sm">${productNamesList}</div>
                        </div>
                        <div style="margin-top: 5px;" class="text-sm">
                            <div class="mt-1 mb-1 flex items-center space-x-2 justify-center">
                                <x-svg-icon icon="euro" class="h-5 w-5 text-indigo-800" />
                                <span class="pr-2">Preis coming soon</span>
                            </div>
                        </div>
                        <div style="margin-top: 5px;" class="text-sm">${openHours}</div>
                        <div style="margin-top: 5px;" class="text-sm">${serviceBadge}</div>                        <div style="margin-top: 5px;" class="text-gray-500 hover:text-indigo-600 hover:cursor-pointer hover:bg-gray-100 text-sm" data-toggle="tooltip" data-placement="bottom" title="Open On Google Maps">
                            <p style="display: inline; cursor: pointer;" @click="window.open('https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(address)}', '_blank')">
                                <span>Google Maps Route</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4" style="display: inline; vertical-align: middle;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg>
                            </p>
                        </div>
                    </div>
                `;

                            activePopup = new mapboxgl.Popup({
                                    closeButton: false,
                                    closeOnClick: false,
                                    offset: [0, -20] // Offset to raise the popup by 20px
                                })
                                .setLngLat(coordinates)
                                .setHTML(popupContent)
                                .addTo(map);

                            activePopup.getElement().addEventListener('mouseenter', () => {
                                mouseOverPopup = true;
                            });

                            activePopup.getElement().addEventListener('mouseleave', () => {
                                mouseOverPopup = false;
                                setTimeout(isPopup, 10)


                            });

                            map.getCanvas().style.cursor = 'pointer';

                            map.on('mouseenter', 'highlighted-location', function() {
                                mouseOverMarker = true;

                            });

                            map.on('mouseleave', 'highlighted-location', function() {
                                mouseOverMarker = false;
                                setTimeout(isPopup, 50)

                            });

                            function isPopup() {
                                if (!mouseOverPopup && !mouseOverMarker && activePopup) {
                                    activePopup.remove();
                                    activePopup = null;
                                    map.getCanvas().style.cursor = '';
                                }
                            }

                        });


                        map.on('mouseenter', 'locations-layer', function(e) {
                            if (activePopup) activePopup.remove(); // Remove the active popup

                            const coordinates = e.features[0].geometry.coordinates.slice();
                            const name = e.features[0].properties.name;
                            const opening_start = e.features[0].properties.opening_start || "00:00";
                            const opening_end = e.features[0].properties.opening_end || "23:59";
                            const productType = e.features[0].properties.product_types || [];
                            const serviceType = e.features[0].properties.service_types || [];
                            let productIds = e.features[0].properties.products;
                            const address = e.features[0].properties.address;

                            // Verificatin of the value of productType to determine the type of badge to display
                            let productBadge = '';
                            if (productType.includes(1)) {
                                productBadge = `<div class="mr-2 text-xs text-center w-[80px] rounded-full bg-indigo-600 px-1 py-0.5 text-white shadow-sm whitespace-nowrap overflow-hidden text-ellipsis">HVO 100</div>`;
                            } else if (productType.includes(2)) {
                                productBadge = `<div class="mr-2 text-xs text-center w-[80px] rounded-full bg-indigo-600 px-1 py-0.5 text-white shadow-sm whitespace-nowrap overflow-hidden text-ellipsis">HVO Blend</div>`;
                            }

                            let openHours = '';

                            if (opening_start == '00:00' && opening_end == '23:59' || opening_start == '00:00' && opening_end == '00:00') {
                                openHours = `<div class="mt-1 mb-1 flex items-center space-x-2 justify-center">
                                    <x-svg-icon icon="24" class="h-5 w-5 text-green-500" />
                                    <span class="pr-2">24h geöffnet</span>
                                </div>`;
                            } else {
                                openHours = `Open from ${opening_start} to ${opening_end}`
                            }

                            let serviceBadge = '';

                            if (serviceType.includes(1)) {
                                serviceBadge += `<div class="image-container ml-2">
                                    <x-svg-icon icon="vacuumer" class="h-5 w-5 text-gray-700" />
                                    <span class="tooltip text-gray-500" style="z-index: 10; transform: translateX(-40%);">Vacuum</span>
                                </div>`;
                            }
                            if (serviceType.includes(2)) {
                                serviceBadge += `<div class="image-container ml-2">
                                    <x-svg-icon icon="carwash" class="h-5 w-5 text-gray-700" />
                                    <span class="tooltip text-gray-500" style="z-index: 10; transform: translateX(-50%);">Car Wash</span>
                                </div>`;
                            }
                            if (serviceType.includes(3)) {
                                serviceBadge += `<div class="image-container ml-2">
                                    <x-svg-icon icon="bistro" class="h-5 w-5 text-gray-700" />
                                    <span class="tooltip text-gray-500" style="z-index: 10; transform: translateX(-50%);">Bistro</span>
                                </div>`;
                            }


                            if (serviceBadge !== '') {
                                serviceBadge = `${serviceBadge}`;
                            }

                            // Product name table
                            const productNames = {
                                1: 'HVO 100',
                                2: 'KlimaDiesel-90',
                                3: 'NesteMY',
                                4: 'Fuelmotion H',
                                5: 'C.A.R.E Diesel',
                                6: 'ROTH HVO100 Diesel'
                            };

                            // Check if productIds is an array, otherwise try to convert it
                            if (!Array.isArray(productIds)) {
                                try {
                                    productIds = JSON.parse(productIds);
                                } catch (e) {
                                    productIds = [];
                                }
                            }

                            // Convert IDs to names
                            const productNamesList = productIds
                                .map(id => productNames[id])
                                .filter(name => name !== undefined)
                                .join(', ');

                            const encodedAddress = encodeURIComponent(address);


                            // Create the HTML content for the popup
                            const popupContent = `
                    <div style="text-align: center; border-radius: 10px">
                        <div style="font-size: 14px; font-weight: bold; margin-bottom:5px;">${name}</div>
                        <div style="display: flex; align-items: center; justify-content: center;">
                            ${productBadge}
                            <div class="text-sm">${productNamesList}</div>
                        </div>
                        <div style="margin-top: 5px;" class="text-sm">
                            <div class="mt-1 mb-1 flex items-center space-x-2 justify-center">
                                <x-svg-icon icon="euro" class="h-5 w-5 text-indigo-800" />
                                <span class="pr-2">Preis coming soon</span>
                            </div>
                        </div>
                        <div style="margin-top: 5px;" class="text-sm">${openHours}</div>
                        <div style="margin-top: 5px;" class="text-sm">${serviceBadge}</div>                        <div style="margin-top: 5px;" class="text-gray-500 hover:text-indigo-600 hover:cursor-pointer hover:bg-gray-100 text-sm" data-toggle="tooltip" data-placement="bottom" title="Open On Google Maps">
                            <p style="display: inline; cursor: pointer;" @click="window.open('https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(address)}', '_blank')">
                                <span>Google Maps Route</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4" style="display: inline; vertical-align: middle;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg>
                            </p>
                        </div>
                    </div>
                `;

                            // Display the popup with the content
                            activePopup = new mapboxgl.Popup({
                                    closeButton: false,
                                    closeOnClick: false,
                                    offset: [0, -20] // Offset from the top
                                })
                                .setLngLat(coordinates)
                                .setHTML(popupContent)
                                .addTo(map);

                            // Keep the popup open when the mouse is over
                            activePopup.getElement().addEventListener('mouseenter', () => {
                                mouseOverPopup = true;
                            });

                            activePopup.getElement().addEventListener('mouseleave', () => {
                                mouseOverPopup = false;
                                setTimeout(isPopup, 10)


                            });

                            map.getCanvas().style.cursor = 'pointer';

                            map.on('mouseenter', 'locations-layer', function() {
                                mouseOverMarker = true;

                            });

                            map.on('mouseleave', 'locations-layer', function() {
                                mouseOverMarker = false;
                                setTimeout(isPopup, 50)

                            });

                            function isPopup() {
                                if (!mouseOverPopup && !mouseOverMarker && activePopup) {
                                    activePopup.remove();
                                    activePopup = null;
                                    map.getCanvas().style.cursor = '';
                                }
                            }
 
                        });


                        // Show a popup and zoom to a specific location
                        function flyToLocation(coordinates, name, opening_start, opening_end, productType, serviceType, productIds, address) {

                            map.flyTo({
                                center: coordinates,
                                zoom: 14
                            });

                            if (activePopup) activePopup.remove();


                            // Check the value of productType to determine the type of badge to display
                            let productBadge = '';

                            if (productType.includes(1)) {
                                productBadge = `<div class="mr-2 text-xs text-center w-[80px] rounded-full bg-indigo-600 px-1 py-0.5 text-white shadow-sm whitespace-nowrap overflow-hidden text-ellipsis">
                                    HVO 100
                                </div>`;
                            } else if (productType.includes(2)) {
                                productBadge = `<div class="mr-2 text-xs text-center w-[80px] rounded-full bg-indigo-600 px-1 py-0.5 text-white shadow-sm whitespace-nowrap overflow-hidden text-ellipsis">
                                    HVO Blend
                                </div>`;
                            }

                            let openHours = '';

                            if (opening_start == '00:00' && opening_end == '23:59' || opening_start == '00:00' && opening_end == '00:00') {
                                openHours = `<div class="mt-1 mb-1 flex items-center space-x-2 justify-center">
                                    <x-svg-icon icon="24" class="h-5 w-5 text-green-500" />
                                    <span class="pr-2">24h geöffnet</span>
                                </div>`;
                            } else {
                                openHours = `Open from ${opening_start} to ${opening_end}`
                            }

                            let serviceBadge = '';

                            if (serviceType.includes(1)) {
                                serviceBadge += `<div class="image-container ml-2">
                                    <x-svg-icon icon="vacuumer" class="h-5 w-5 text-gray-700" />
                                    <span class="tooltip text-gray-500" style="z-index: 10; transform: translateX(-40%);">Vacuum</span>
                                </div>`;
                            }
                            if (serviceType.includes(2)) {
                                serviceBadge += `<div class="image-container ml-2">
                                    <x-svg-icon icon="carwash" class="h-5 w-5 text-gray-700" />
                                    <span class="tooltip text-gray-500" style="z-index: 10; transform: translateX(-50%);">Car Wash</span>
                                </div>`;
                            }
                            if (serviceType.includes(3)) {
                                serviceBadge += `<div class="image-container ml-2">
                                    <x-svg-icon icon="bistro" class="h-5 w-5 text-gray-700" />
                                    <span class="tooltip text-gray-500" style="z-index: 10; transform: translateX(-50%);">Bistro</span>
                                </div>`;
                            }


                            if (serviceBadge !== '') {
                                serviceBadge = `${serviceBadge}`;
                            }

                            // Product name mapping
                            const productNames = {
                                1: 'HVO 100',
                                2: 'KlimaDiesel-90',
                                3: 'NesteMY',
                                4: 'Fuelmotion H',
                                5: 'C.A.R.E Diesel',
                                6: 'ROTH HVO100 Diesel'
                            };

                            // Check if productIds is an array, otherwise try to convert it
                            if (!Array.isArray(productIds)) {
                                try {
                                    productIds = JSON.parse(productIds);
                                } catch (e) {
                                    // If the conversion fails, use an empty array as default
                                    productIds = [];
                                }
                            }

                            // Convert IDs to names
                            const productNamesList = productIds
                                .map(id => productNames[id])
                                .filter(name => name !== undefined)
                                .join(', ');

                            const encodedAddress = encodeURIComponent(address);

                            // Create the HTML content for the popup
                            const popupContent = `
                                         <div style="text-align: center; border-radius: 10px">
                                                 <div style="font-size: 14px; font-weight: bold; margin-bottom:5px;">${name}</div>
                                                <div style="display: flex; align-items: center; justify-content: center;">
                                                    ${productBadge}
                                                    <div class="text-sm">${productNamesList}</div>
                                                </div>
                                                <div style="margin-top: 5px;" class="text-sm">
                                                    <div class="mt-1 mb-1 flex items-center space-x-2 justify-center">
                                                        <x-svg-icon icon="euro" class="h-5 w-5 text-indigo-800" />
                                                        <span class="pr-2">Preis coming soon</span>
                                                    </div>
                                                </div>
                                                <div style="margin-top: 5px;" class="text-sm">${openHours}</div>
                                                <div style="margin-top: 5px;" class="text-sm">${serviceBadge}</div>                                                
                                                <div style="margin-top: 5px;" class="text-gray-500 hover:text-indigo-600 hover:cursor-pointer hover:bg-gray-100 text-sm" data-toggle="tooltip" data-placement="bottom" title="Open On Google Maps">
                                                    <p style="display: inline; cursor: pointer;" @click="window.open('https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(address)}', '_blank')">
                                                        <span>Google Maps Route</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4" style="display: inline; vertical-align: middle;">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                                        </svg>
                                                    </p>
                                                </div>
                                            </div>
                                        `;

                            activePopup = new mapboxgl.Popup({
                                    closeButton: true,
                                    closeOnClick: false,
                                    offset: [0, -20]

                                })
                                .setLngLat(coordinates)
                                .setHTML(popupContent)
                                .addTo(map);
                        }

                        // Hide the popup if the user clicks elsewhere
                        map.on('click', function(e) {
                            if (activePopup) {
                                const features = map.queryRenderedFeatures(e.point, {
                                    layers: ['locations-layer']
                                });

                                if (!features.length) {
                                    activePopup.remove();
                                    activePopup = null;
                                }
                            }
                        });

                        map.on('click', 'locations-layer', function(e) {
                            const clickedFeature = e.features[0]; // Get the clicked feature
                            const coordinates = clickedFeature.geometry.coordinates;
                            const name = clickedFeature.properties.name;
                            const opening_start = e.features[0].properties.opening_start || "00:00";
                            const opening_end = e.features[0].properties.opening_end || "23:59";
                            const productType = e.features[0].properties.product_types || [];
                            const serviceType = e.features[0].properties.service_types || [];
                            let productIds = e.features[0].properties.products;
                            const id = clickedFeature.properties.id;
                            const address = e.features[0].properties.address || '';


                            // Zoom to the location and show a popup
                            flyToLocation(coordinates, name, opening_start, opening_end, productType, serviceType, productIds, address);

                            // Move the table line to the top
                            hightLightLocationInTable(id);
                            highlightLocation(clickedFeature);

                        });


                        const debouncedGermanyCenter = debounce(germanyCenter, 1000);

                        // Listen for input on the search bar
                        document.getElementById('searchBar').addEventListener('input', debouncedGermanyCenter);
                        document.getElementById('searchBar').addEventListener('input', function(e) {
                            if (e.target.value === '') {
                                reset();
                            }
                        });
                        document.getElementById('resetButton').addEventListener('click', function(e) {
                            reset();
                        });
                        document.getElementById('searchAreaButton').addEventListener('click', function(e) {
                            germanyCenter();
                        });

                        function reset() {
                            document.getElementById('searchBar').value = '';

                            map.flyTo({
                                center: [10.451526, 51.165691],
                                zoom: 5,
                                essential: true,
                            });
                            map.once('moveend', () => {
                                germanyCenter();
                            });
                            if (searchMarker) {
                                searchMarker.remove();
                                map.removeLayer('radius-circle-layer');
                                map.removeSource('radius-circle');
                            }
                        }

                        document.addEventListener('filterChanged', () => {
                            germanyCenter();
                        });

                        // Function to calculate the distance between two points
                        function calculateDistance(center, coordinates) {
                            return turf.distance(
                                turf.point([center.lng, center.lat]),
                                turf.point(coordinates)
                            );
                        }

                        // Function to get the bounds (bounds) of a set of features
                        function getBounds(features) {
                            const bounds = new mapboxgl.LngLatBounds();
                            features.forEach(feature => {
                                bounds.extend(feature.geometry.coordinates);
                            });
                            return bounds;
                        }

                        function hightLightLocationInTable(id) {
                            const tableBody = document.querySelector("#locationsTable tbody");
                            const rows = Array.from(tableBody.querySelectorAll('tr'));

                            const targetRow = rows.find(row => {
                                const locationIdElement = row.querySelector('.location-id');
                                if (!locationIdElement) {
                                    return false;
                                }
                                return locationIdElement.textContent.trim() === id;
                            });

                            if (targetRow) {
                                rows.forEach(row => row.classList.remove('highlight'));

                                targetRow.classList.add('highlight');

                                targetRow.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'center',
                                    inline: 'nearest'
                                });
                            }
                        }

                        function isLocationOpen(opening_start, opening_end) {
                            const currentTime = new Date(); // Get the current time
                            const currentHours = currentTime.getHours().toString().padStart(2, '0'); // Current hours
                            const currentMinutes = currentTime.getMinutes().toString().padStart(2, '0'); // Current minutes
                            const currentTimeString = `${currentHours}:${currentMinutes}`;

                            // Handle 24-hour open case
                            if (opening_start === '00:00' && opening_end === '00:00') {
                                return true;
                            }

                            // Convert opening and closing times to comparable strings
                            const startTimeString = opening_start.slice(0, 5); // Get 'HH:MM' part
                            const endTimeString = opening_end.slice(0, 5); // Get 'HH:MM' part

                            // Handle cases where the opening end time is the next day (i.e., closing time is past midnight)
                            if (opening_end < opening_start) {
                                return currentTimeString >= startTimeString || currentTimeString <= endTimeString;
                            }

                            // Normal case (same day)
                            return currentTimeString >= startTimeString && currentTimeString <= endTimeString;
                        }

                    });


                    var TxtRotate = function(el, toRotate, period) {
                        this.toRotate = toRotate;
                        this.el = el;
                        this.loopNum = 0;
                        this.period = parseInt(period, 10) || 2000;
                        this.txt = '';
                        this.tick();
                        this.isDeleting = false;
                    };

                    TxtRotate.prototype.tick = function() {
                        var i = this.loopNum % this.toRotate.length;
                        var fullTxt = this.toRotate[i];

                        if (this.isDeleting) {
                            this.txt = fullTxt.substring(0, this.txt.length - 1);
                        } else {
                            this.txt = fullTxt.substring(0, this.txt.length + 1);
                        }

                        this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

                        var that = this;
                        var delta = 300 - Math.random() * 100;

                        if (this.isDeleting) {
                            delta /= 2;
                        }

                        if (!this.isDeleting && this.txt === fullTxt) {
                            delta = this.period;
                            this.isDeleting = true;
                        } else if (this.isDeleting && this.txt === '') {
                            this.isDeleting = false;
                            this.loopNum++;
                            delta = 500;
                        }

                        setTimeout(function() {
                            that.tick();
                        }, delta);
                    };

                    window.onload = function() {
                        var elements = document.getElementsByClassName('txt-rotate');
                        for (var i = 0; i < elements.length; i++) {
                            var toRotate = elements[i].getAttribute('data-rotate');
                            var period = elements[i].getAttribute('data-period');
                            if (toRotate) {
                                new TxtRotate(elements[i], JSON.parse(toRotate), period);
                            }
                        }
                        // INJECT CSS
                        var css = document.createElement("style");
                        css.type = "text/css";
                        css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
                        document.body.appendChild(css);
                    };

                    const texts = ['Search for a name...', 'Search for a city...', 'Search for a product...', 'Search for a service...', 'Search for a zipcode...'];
                    const input = document.querySelector('#searchBar');
                    const animationWorker = function(input, texts) {
                        this.input = input;
                        this.defaultPlaceholder = this.input.getAttribute('placeholder');
                        this.texts = texts;
                        this.curTextNum = 0;
                        this.curPlaceholder = '';
                        this.blinkCounter = 0;
                        this.animationFrameId = 0;
                        this.animationActive = false;
                        this.input.setAttribute('placeholder', this.curPlaceholder);

                        this.switch = (timeout) => {
                            this.input.classList.add('imitatefocus');
                            setTimeout(
                                () => {
                                    this.input.classList.remove('imitatefocus');
                                    if (this.curTextNum == 0)
                                        this.input.setAttribute('placeholder', this.defaultPlaceholder);
                                    else
                                        this.input.setAttribute('placeholder', this.curPlaceholder);

                                    setTimeout(
                                        () => {
                                            this.input.setAttribute('placeholder', this.curPlaceholder);
                                            if (this.animationActive)
                                                this.animationFrameId = window.requestAnimationFrame(this.animate)
                                        },
                                        timeout);
                                },
                                timeout);
                        }

                        this.animate = () => {
                            if (!this.animationActive) return;
                            let curPlaceholderFullText = this.texts[this.curTextNum];
                            let timeout = 500;
                            if (this.curPlaceholder == curPlaceholderFullText + '|' && this.blinkCounter == 3) {
                                this.blinkCounter = 0;
                                this.curTextNum = (this.curTextNum >= this.texts.length - 1) ? 0 : this.curTextNum + 1;
                                this.curPlaceholder = '|';
                                this.switch(500);
                                return;
                            } else if (this.curPlaceholder == curPlaceholderFullText + '|' && this.blinkCounter < 3) {
                                this.curPlaceholder = curPlaceholderFullText;
                                this.blinkCounter++;
                            } else if (this.curPlaceholder == curPlaceholderFullText && this.blinkCounter < 3) {
                                this.curPlaceholder = this.curPlaceholder + '|';
                            } else {
                                this.curPlaceholder = curPlaceholderFullText
                                    .split('')
                                    .slice(0, this.curPlaceholder.length + 1)
                                    .join('') + '|';
                                timeout = 150;
                            }
                            this.input.setAttribute('placeholder', this.curPlaceholder);
                            setTimeout(
                                () => {
                                    if (this.animationActive) this.animationFrameId = window.requestAnimationFrame(this.animate)
                                },
                                timeout);
                        }

                        this.stop = () => {
                            this.animationActive = false;
                            window.cancelAnimationFrame(this.animationFrameId);
                        }

                        this.start = () => {
                            this.animationActive = true;
                            this.animationFrameId = window.requestAnimationFrame(this.animate);
                            return this;
                        }
                    }

                    let aw = new animationWorker(input, texts).start();
                    input.addEventListener("focus", (e) => aw.stop());
                    input.addEventListener("blur", (e) => {
                        aw = new animationWorker(input, texts);
                        if (e.target.value == '') setTimeout(aw.start, 1000);
                    });
                </script>
                @endscript
            </div>
        </div>
    </div>
</div>