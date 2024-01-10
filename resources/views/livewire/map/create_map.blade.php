<div>
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <div class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            <h3 class="text-lg font-medium leading-6 text-gray-900"> Precise your longitude and latitude </h3>
            <p class="mt-1 text-sm text-gray-600">
                Drag the marker to the precise place that you want it to be.
            </p>
            <div id="coordinates"></div>
        </div>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="mt-1 sm:mt-0 sm:col-span-2">
                @if($toggleMap)
                <div id='map' class="w-full" style='height: 50vh;' data-lat="{{ Cache::get('lat') }}" data-lng="{{ Cache::get('lng') }}"></div>
                @else
                <button disabled type="button" style='height: 20vh;' class="bg-gray-100 relative block w-full rounded-lg border-2 border-dashed border-gray-300 p-12 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto h-12 w-12 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
                    </svg>

                    <span class="mt-2 block text-sm font-semibold text-gray-500">The map should be displayed here</span>
                </button>
                @endif
            </div>
        </div>
    </div>
    @if($toggleMap)
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHBiYXozZm0wZ21vMnFwZHE4ZWc5Z2lzIn0.dJGBO1JOfota9KceLDgGJg';
        const accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHBiYXozZm0wZ21vMnFwZHE4ZWc5Z2lzIn0.dJGBO1JOfota9KceLDgGJg';

        const mapElement = document.getElementById('map');

        const lat = mapElement.getAttribute('data-lat');
        const lng = mapElement.getAttribute('data-lng');
            console.log('les valeurs sont : ', lng, lat);
        let marker;


        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/elsenmedia/ckvso4s5p189k14pltjqo1rqo',
            center: [lng, lat],
            zoom: 12
        });



        marker = new mapboxgl.Marker()
            .setLngLat([lng, lat])
            .addTo(map);


        // Detect start of the drag
        marker.on('dragstart', () => {});

        // Detect continuous movement of the drag
        marker.on('drag', () => {});

        // Detect end of the drag
        marker.on('dragend', () => {
            const newLngLat = marker.getLngLat();

            lngInput.value = newLngLat.lng.toFixed(6);
            latInput.value = newLngLat.lat.toFixed(6);
            console.log('Nouvelles coordonnées : ', newLngLat);
        });

        marker.setDraggable(true);

        const lngInput = document.getElementById('lng');
        const latInput = document.getElementById('lat');

        lngInput.value = lng.toFixed(6);
        latInput.value = lat.toFixed(6);
    </script>
    @endif

</div>