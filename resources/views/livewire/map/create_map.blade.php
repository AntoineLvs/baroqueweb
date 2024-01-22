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
            <div id='map' class="w-full @if($toggleMapValue)  block @else hidden @endif " style='height: 50vh;'></div>

            <button disabled type="button" style='height: 20vh;' class=" @if($toggleMapValue) hidden @endif bg-gray-100 relative block w-full rounded-lg border-2 border-dashed border-gray-300 p-12 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto h-12 w-12 text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
                </svg>

                <span class="mt-2 block text-sm font-semibold text-gray-500">The map should be displayed here</span>
            </button>
        </div>
    </div>
</div>

<!-- Here we show a div with a blank square showing 'The map should be displayed here'. if the user click the button to "ShowOnMap", it will load this script.
this script retrieve the data of lat/lng that are in their respectiv inputs in the formulare. It will then load the map with everything, around this precise location.
We also provide a marker that we can drag and drop at any point. It will automatically update lat/lng inputs that are above. -->
<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiZWxzZW5tZWRpYSIsImEiOiJjbHBiYXozZm0wZ21vMnFwZHE4ZWc5Z2lzIn0.dJGBO1JOfota9KceLDgGJg';
    document.addEventListener('livewire:init', () => {
        Livewire.on('mapToggled', locationData => {
            setTimeout(() => {


                const latInputElement = document.getElementById('lat');
                const lat = parseFloat(latInputElement.value);
                const lngInputElement = document.getElementById('lng');
                const lng = parseFloat(lngInputElement.value);
                let marker;
                const map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/elsenmedia/ckvso4s5p189k14pltjqo1rqo',
                    zoom: 12
                });

                // Ajout du délai avant le chargement de la carte

                map.on('load', function() {
                    map.setCenter([lng, lat]);

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
                    });

                    marker.setDraggable(true);

                    const lngInput = document.getElementById('lng');
                    const latInput = document.getElementById('lat');

                    lngInput.value = lng.toFixed(6);
                    latInput.value = lat.toFixed(6);
                });
            }, 10);
        });
    });
</script>